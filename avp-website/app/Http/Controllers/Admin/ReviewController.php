<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    /**
     * Helper check to verify admin credentials
     */
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->role_id < 1) {
            abort(403, 'Unauthorized access.');
        }
        if (Auth::user()->status === 'suspended') {
            abort(403, 'Tài khoản của bạn đã bị khóa.');
        }
    }

    /**
     * List all reviews with filtering and search.
     */
    public function index(Request $request)
    {
        $this->checkAdmin();

        $status = $request->input('status', 'all');
        $search = $request->input('search');

        // Stats counters
        $stats = [
            'all' => DB::table('reviews')->count(),
            'pending' => DB::table('reviews')->where('status', 'pending')->count(),
            'approved' => DB::table('reviews')->where('status', 'approved')->count(),
            'rejected' => DB::table('reviews')->where('status', 'rejected')->count(),
        ];

        // Base query joining product and user
        $query = DB::table('reviews')
            ->join('product', 'reviews.product_id', '=', 'product.id')
            ->leftJoin('user', 'reviews.user_id', '=', 'user.id')
            ->select(
                'reviews.*',
                'product.title as product_title',
                'product.image as product_image',
                'user.name as user_name',
                'user.email as user_email'
            );

        if ($status !== 'all') {
            $query->where('reviews.status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('product.title', 'like', '%' . $search . '%')
                  ->orWhere('user.name', 'like', '%' . $search . '%')
                  ->orWhere('user.email', 'like', '%' . $search . '%')
                  ->orWhere('reviews.body', 'like', '%' . $search . '%');
            });
        }

        $reviews = $query->orderBy('reviews.created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        return view('admin.reviews.index', compact('reviews', 'stats', 'status', 'search'));
    }

    /**
     * Approve a review.
     */
    public function approve($id)
    {
        $this->checkAdmin();

        $review = DB::table('reviews')->where('id', $id)->first();
        if (!$review) {
            abort(404, 'Đánh giá không tồn tại.');
        }

        DB::table('reviews')->where('id', $id)->update([
            'status' => 'approved',
            'admin_note' => null,
            'updated_at' => now(),
        ]);

        $this->recalculateProductRating($review->product_id);

        return redirect()->back()->with('success', 'Đã duyệt đánh giá thành công!');
    }

    /**
     * Reject a review.
     */
    public function reject(Request $request, $id)
    {
        $this->checkAdmin();

        $review = DB::table('reviews')->where('id', $id)->first();
        if (!$review) {
            abort(404, 'Đánh giá không tồn tại.');
        }

        $request->validate([
            'admin_note' => 'nullable|string|max:1000'
        ]);

        DB::table('reviews')->where('id', $id)->update([
            'status' => 'rejected',
            'admin_note' => $request->input('admin_note'),
            'updated_at' => now(),
        ]);

        $this->recalculateProductRating($review->product_id);

        return redirect()->back()->with('success', 'Đã từ chối đánh giá!');
    }

    /**
     * Delete a review.
     */
    public function destroy($id)
    {
        $this->checkAdmin();

        $review = DB::table('reviews')->where('id', $id)->first();
        if (!$review) {
            abort(404, 'Đánh giá không tồn tại.');
        }

        // Delete image if exists
        if ($review->image) {
            $imagePath = public_path('images/reviews/' . $review->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        DB::table('reviews')->where('id', $id)->delete();

        $this->recalculateProductRating($review->product_id);

        return redirect()->back()->with('success', 'Đã xóa đánh giá thành công!');
    }

    /**
     * Recalculate average rating of a product.
     */
    private function recalculateProductRating($productId)
    {
        $avgRating = DB::table('reviews')
            ->where('product_id', $productId)
            ->where('status', 'approved')
            ->avg('rating');

        // Default to 5.00 if there are no approved reviews, or use 0?
        // Actually, the plan says: "If no approved reviews exist, it resets to 0."
        $rating = $avgRating !== null ? round($avgRating, 2) : 0.00;

        DB::table('product')->where('id', $productId)->update([
            'rating' => $rating,
            'updated_at' => now(),
        ]);
    }
}
