<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageSection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class PageSectionController extends Controller
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

    public function index($page)
    {
        $this->checkSuperAdmin();

        $sections = PageSection::where('page', $page)->orderBy('sort_order', 'asc')->get();

        return view('admin.pages.index', compact('sections', 'page'));
    }

    public function edit($id)
    {
        $this->checkSuperAdmin();

        $section = PageSection::findOrFail($id);

        return view('admin.pages.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $this->checkSuperAdmin();

        $section = PageSection::findOrFail($id);

        // Dynamic validation and formatting based on section_key
        $content = $section->content;

        if ($section->section_key === 'promo_pc_repair' || $section->section_key === 'promo_photocopy') {
            $request->validate([
                'title' => 'required|string|max:255',
                'title_highlight' => 'required|string|max:255',
                'badge' => 'required|string|max:255',
                'description' => 'required|string',
                'highlights' => 'required|array',
                'image' => 'nullable|image|max:5120',
                'zalo_link' => 'required|string|max:500',
                'service_route' => 'required|string|max:255',
            ]);

            $content['title_highlight'] = $request->input('title_highlight');
            $content['badge'] = $request->input('badge');
            $content['description'] = $request->input('description');
            $content['highlights'] = array_filter($request->input('highlights'));
            $content['zalo_link'] = $request->input('zalo_link');
            $content['service_route'] = $request->input('service_route');

            if ($request->hasFile('image')) {
                // Delete old image if it exists
                if (!empty($content['image_path']) && File::exists(public_path($content['image_path']))) {
                    File::delete(public_path($content['image_path']));
                }
                $image = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('images/banners'), $filename);
                $content['image_path'] = 'images/banners/' . $filename;
            }

            $section->title = $request->input('title');
        } elseif ($section->section_key === 'hero') {
            $request->validate([
                'title' => 'required|string|max:255',
                'title_highlight' => 'required|string|max:255',
                'badge' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            $content['title_highlight'] = $request->input('title_highlight');
            $content['badge'] = $request->input('badge');
            $content['description'] = $request->input('description');

            $section->title = $request->input('title');
        } elseif ($section->section_key === 'brand_story') {
            $request->validate([
                'title' => 'required|string|max:255',
                'badge' => 'required|string|max:255',
                'paragraphs' => 'required|array',
                'feature_titles' => 'required|array',
                'feature_descriptions' => 'required|array',
            ]);

            $content['badge'] = $request->input('badge');
            $content['paragraphs'] = array_filter($request->input('paragraphs'));

            $features = [];
            $titles = $request->input('feature_titles');
            $descs = $request->input('feature_descriptions');
            foreach ($titles as $idx => $t) {
                if (!empty($t)) {
                    $features[] = [
                        'title' => $t,
                        'description' => $descs[$idx] ?? ''
                    ];
                }
            }
            $content['features'] = $features;

            $section->title = $request->input('title');
        } elseif ($section->section_key === 'vision_mission_values') {
            $request->validate([
                'vision_title' => 'required|string',
                'vision_description' => 'required|string',
                'mission_title' => 'required|string',
                'mission_description' => 'required|string',
                'values_title' => 'required|string',
                'values_description' => 'required|string',
            ]);

            $content['vision'] = [
                'title' => $request->input('vision_title'),
                'description' => $request->input('vision_description')
            ];
            $content['mission'] = [
                'title' => $request->input('mission_title'),
                'description' => $request->input('mission_description')
            ];
            $content['values'] = [
                'title' => $request->input('values_title'),
                'description' => $request->input('values_description')
            ];
        } elseif ($section->section_key === 'timeline') {
            $request->validate([
                'title' => 'required|string|max:255',
                'badge' => 'required|string|max:255',
                'milestone_years' => 'required|array',
                'milestone_titles' => 'required|array',
                'milestone_descriptions' => 'required|array',
            ]);

            $content['badge'] = $request->input('badge');

            $milestones = [];
            $years = $request->input('milestone_years');
            $titles = $request->input('milestone_titles');
            $descs = $request->input('milestone_descriptions');
            foreach ($years as $idx => $y) {
                if (!empty($y)) {
                    $milestones[] = [
                        'year' => $y,
                        'title' => $titles[$idx] ?? '',
                        'description' => $descs[$idx] ?? ''
                    ];
                }
            }
            $content['milestones'] = $milestones;

            $section->title = $request->input('title');
        }

        $section->content = $content;
        $section->save();

        // Clear page section cache
        Cache::forget("page_section_{$section->page}_{$section->section_key}");

        return redirect()->route('admin.pages.index', $section->page)->with('success', 'Đã cập nhật phần nội dung thành công.');
    }

    public function toggleActive($id)
    {
        $this->checkSuperAdmin();

        $section = PageSection::findOrFail($id);
        $section->is_active = !$section->is_active;
        $section->save();

        Cache::forget("page_section_{$section->page}_{$section->section_key}");

        return response()->json(['success' => true, 'is_active' => $section->is_active]);
    }
}
