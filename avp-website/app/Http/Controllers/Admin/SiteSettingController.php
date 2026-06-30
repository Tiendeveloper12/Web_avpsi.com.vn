<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Auth;

class SiteSettingController extends Controller
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

        $settings = SiteSetting::orderBy('sort_order', 'asc')->get()->groupBy('group');

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $this->checkSuperAdmin();

        $data = $request->except(['_token', '_method']);

        foreach ($data as $key => $value) {
            SiteSetting::where('key', $key)->update(['value' => $value]);
        }

        // Force reload the settings cache by writing to it/flushing
        \Illuminate\Support\Facades\Cache::forget('site_settings_all');

        return redirect()->route('admin.settings.index')->with('success', 'Đã cập nhật các cấu hình hệ thống thành công.');
    }
}
