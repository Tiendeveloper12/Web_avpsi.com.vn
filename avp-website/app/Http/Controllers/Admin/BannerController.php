<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    private function checkSuperAdmin()
    {
        if (!Auth::check() || Auth::user()->role_id !== 2) {
            abort(403, 'Bạn không có quyền truy cập chức năng này.');
        }
        if (Auth::user()->status === 'suspended') {
            abort(403, 'Tài khoản của bạn đã bị khóa.');
        }
    }

    public function index()
    {
        $this->checkSuperAdmin();

        $banners = Banner::orderBy('sort_order', 'asc')->get();

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        $this->checkSuperAdmin();

        return view('admin.banners.form', [
            'banner' => new Banner()
        ]);
    }

    public function store(Request $request)
    {
        $this->checkSuperAdmin();

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'badge' => 'nullable|string|max:100',
            'button_text' => 'nullable|string|max:100',
            'link' => 'nullable|string|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'sort_order' => 'integer',
        ]);

        $banner = new Banner($request->only(['title', 'subtitle', 'badge', 'button_text', 'link', 'sort_order']));
        $banner->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/banners'), $filename);
            $banner->image_path = 'images/banners/' . $filename;
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Đã tạo banner mới thành công.');
    }

    public function edit($id)
    {
        $this->checkSuperAdmin();

        $banner = Banner::findOrFail($id);

        return view('admin.banners.form', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $this->checkSuperAdmin();

        $banner = Banner::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'badge' => 'nullable|string|max:100',
            'button_text' => 'nullable|string|max:100',
            'link' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'sort_order' => 'integer',
        ]);

        $banner->fill($request->only(['title', 'subtitle', 'badge', 'button_text', 'link', 'sort_order']));
        $banner->is_active = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($banner->image_path && File::exists(public_path($banner->image_path))) {
                File::delete(public_path($banner->image_path));
            }

            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/banners'), $filename);
            $banner->image_path = 'images/banners/' . $filename;
        }

        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Đã cập nhật banner thành công.');
    }

    public function destroy($id)
    {
        $this->checkSuperAdmin();

        $banner = Banner::findOrFail($id);

        if ($banner->image_path && File::exists(public_path($banner->image_path))) {
            File::delete(public_path($banner->image_path));
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Đã xóa banner thành công.');
    }

    public function toggleActive($id)
    {
        $this->checkSuperAdmin();

        $banner = Banner::findOrFail($id);
        $banner->is_active = !$banner->is_active;
        $banner->save();

        return response()->json(['success' => true, 'is_active' => $banner->is_active]);
    }

    public function reorder(Request $request)
    {
        $this->checkSuperAdmin();

        $order = $request->input('order');
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                Banner::where('id', $id)->update(['sort_order' => $index + 1]);
            }
        }

        return response()->json(['success' => true]);
    }
}
