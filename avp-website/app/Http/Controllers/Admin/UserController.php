<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Helper check to verify super admin credentials
     */
    private function checkSuperAdmin()
    {
        if (!Auth::check() || Auth::user()->role_id !== 2) {
            abort(403, 'Chỉ Quản trị viên cấp cao mới có quyền thực hiện hành động này.');
        }
        if (Auth::user()->status === 'suspended') {
            abort(403, 'Tài khoản của bạn đã bị khóa.');
        }
    }

    /**
     * Display a listing of the users.
     */
    public function index(Request $request)
    {
        $this->checkSuperAdmin();

        $search = $request->input('search');
        $role = $request->input('role');
        $status = $request->input('status');

        // Stats counters
        $stats = [
            'total' => DB::table('user')->count(),
            'super_admin' => DB::table('user')->where('role_id', 2)->count(),
            'admin' => DB::table('user')->where('role_id', 1)->count(),
            'customer' => DB::table('user')->where('role_id', 0)->count(),
            'suspended' => DB::table('user')->where('status', 'suspended')->count(),
        ];

        $query = DB::table('user');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('email', 'like', '%' . $search . '%')
                  ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

        if ($role !== null && $role !== '') {
            $query->where('role_id', $role);
        }

        if ($status) {
            $query->where('status', $status);
        }

        $users = $query->orderBy('created_at', 'desc')
            ->paginate(15)
            ->withQueryString();

        // Get recent order count for each user in this page to display
        $userIds = collect($users->items())->pluck('id')->toArray();
        $orderCounts = [];
        if (!empty($userIds)) {
            $orderCounts = DB::table('orders')
                ->select('user_id', DB::raw('count(*) as count'))
                ->whereIn('user_id', $userIds)
                ->groupBy('user_id')
                ->pluck('count', 'user_id')
                ->toArray();
        }

        return view('admin.users.index', compact('users', 'stats', 'orderCounts', 'search', 'role', 'status'));
    }

    /**
     * Update user's role.
     */
    public function updateRole(Request $request, $id)
    {
        $this->checkSuperAdmin();

        $user = DB::table('user')->where('id', $id)->first();
        if (!$user) {
            abort(404, 'Thành viên không tồn tại.');
        }

        if ($user->id === Auth::id()) {
            return redirect()->back()->withErrors(['error' => 'Bạn không thể tự thay đổi vai trò của chính mình.']);
        }

        $request->validate([
            'role_id' => 'required|integer|in:0,1,2'
        ]);

        DB::table('user')->where('id', $id)->update([
            'role_id' => $request->input('role_id'),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Đã cập nhật vai trò thành viên thành công!');
    }

    /**
     * Toggle user status (active/suspended).
     */
    public function toggleStatus($id)
    {
        $this->checkSuperAdmin();

        $user = DB::table('user')->where('id', $id)->first();
        if (!$user) {
            abort(404, 'Thành viên không tồn tại.');
        }

        if ($user->id === Auth::id()) {
            return redirect()->back()->withErrors(['error' => 'Bạn không thể tự khóa tài khoản của chính mình.']);
        }

        $newStatus = $user->status === 'suspended' ? 'active' : 'suspended';

        DB::table('user')->where('id', $id)->update([
            'status' => $newStatus,
            'updated_at' => now()
        ]);

        $message = $newStatus === 'suspended' ? 'Đã khóa tài khoản thành viên!' : 'Đã mở khóa tài khoản thành viên!';
        return redirect()->back()->with('success', $message);
    }

    /**
     * Reset user password.
     */
    public function resetPassword(Request $request, $id)
    {
        $this->checkSuperAdmin();

        $user = DB::table('user')->where('id', $id)->first();
        if (!$user) {
            abort(404, 'Thành viên không tồn tại.');
        }

        $request->validate([
            'password' => 'required|string|min:6|confirmed'
        ], [
            'password.required' => 'Vui lòng nhập mật khẩu mới.',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu mới không khớp.'
        ]);

        DB::table('user')->where('id', $id)->update([
            'password' => Hash::make($request->input('password')),
            'updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Đã đặt lại mật khẩu mới cho thành viên thành công!');
    }

    /**
     * Delete user account.
     */
    public function destroy($id)
    {
        $this->checkSuperAdmin();

        $user = DB::table('user')->where('id', $id)->first();
        if (!$user) {
            abort(404, 'Thành viên không tồn tại.');
        }

        if ($user->id === Auth::id()) {
            return redirect()->back()->withErrors(['error' => 'Bạn không thể tự xóa tài khoản của chính mình.']);
        }

        DB::table('user')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Đã xóa vĩnh viễn tài khoản thành viên thành công!');
    }
}
