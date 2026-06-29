<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ReviewController extends Controller
{
    /**
     * Store a newly created review in storage.
     */
    public function store(Request $request, $productId)
    {
        $product = DB::table('product')->where('id', $productId)->first();
        if (!$product) {
            abort(404, 'Sản phẩm không tồn tại.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'nullable|string|max:255',
            'body' => 'required|string|min:5|max:1000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ], [
            'rating.required' => 'Vui lòng chọn số sao đánh giá.',
            'rating.integer' => 'Đánh giá không hợp lệ.',
            'rating.min' => 'Đánh giá tối thiểu là 1 sao.',
            'rating.max' => 'Đánh giá tối đa là 5 sao.',
            'body.required' => 'Vui lòng nhập nội dung đánh giá.',
            'body.min' => 'Nội dung đánh giá phải có ít nhất 5 ký tự.',
            'body.max' => 'Nội dung đánh giá không được vượt quá 1000 ký tự.',
            'image.image' => 'File tải lên phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng: jpeg, png, jpg, gif, svg, webp.',
            'image.max' => 'Kích thước hình ảnh tối đa là 2MB.',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            
            // Ensure directory exists
            $path = public_path('images/reviews');
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0755, true, true);
            }
            
            $image->move($path, $imageName);
        }

        DB::table('reviews')->insert([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'rating' => $request->input('rating'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $imageName,
            'status' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Đánh giá của bạn đã được gửi và đang chờ quản trị viên duyệt!');
    }
}
