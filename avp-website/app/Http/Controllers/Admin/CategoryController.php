<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Check if user is admin.
     */
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->email !== 'Admin1@gmail.com') {
            abort(403, 'Unauthorized access.');
        }
    }

    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $this->checkAdmin();
        $categories = CategoryService::getAll();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created category.
     */
    public function store(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:10',
        ]);

        $categories = CategoryService::getAll();
        $title = $request->input('title');
        $slug = Str::slug($title);
        $tag = Str::slug($title);

        // Check if slug already exists
        foreach ($categories as $cat) {
            if ($cat['slug'] === $slug) {
                return redirect()->back()->withErrors(['title' => 'Danh mục này đã tồn tại (trùng Slug).']);
            }
        }

        $categories[] = [
            'title' => $title,
            'slug' => $slug,
            'icon' => $request->input('icon'),
            'tag' => $tag,
            'subcategories' => []
        ];

        CategoryService::save($categories);

        return redirect()->route('admin.categories.index')->with('success', 'Đã thêm danh mục "' . $title . '" thành công!');
    }

    /**
     * Update the specified category.
     */
    public function update(Request $request, $slug)
    {
        $this->checkAdmin();
        $request->validate([
            'title' => 'required|string|max:255',
            'icon' => 'required|string|max:10',
        ]);

        $categories = CategoryService::getAll();
        $found = false;
        $newTitle = $request->input('title');
        $newSlug = Str::slug($newTitle);

        foreach ($categories as $index => $cat) {
            if ($cat['slug'] === $slug) {
                // If renaming title and slug conflicts with another category
                if ($slug !== $newSlug) {
                    foreach ($categories as $otherIndex => $otherCat) {
                        if ($otherIndex !== $index && $otherCat['slug'] === $newSlug) {
                            return redirect()->back()->withErrors(['title' => 'Tên danh mục mới bị trùng lặp với danh mục khác.']);
                        }
                    }
                }
                
                $categories[$index]['title'] = $newTitle;
                $categories[$index]['slug'] = $newSlug;
                $categories[$index]['icon'] = $request->input('icon');
                $categories[$index]['tag'] = $newSlug; // Keep tag matching slug
                $found = true;
                break;
            }
        }

        if (!$found) {
            abort(404, 'Danh mục không tồn tại.');
        }

        CategoryService::save($categories);

        return redirect()->route('admin.categories.index')->with('success', 'Đã cập nhật danh mục thành công!');
    }

    /**
     * Reorder categories.
     */
    public function reorder(Request $request)
    {
        $this->checkAdmin();
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'string'
        ]);

        $order = $request->input('order');
        $categories = CategoryService::getAll();
        $reordered = [];

        // Build new array based on the requested order
        foreach ($order as $slug) {
            foreach ($categories as $cat) {
                if ($cat['slug'] === $slug) {
                    $reordered[] = $cat;
                    break;
                }
            }
        }

        // Add any missing categories just in case
        foreach ($categories as $cat) {
            if (!in_array($cat['slug'], $order)) {
                $reordered[] = $cat;
            }
        }

        CategoryService::save($reordered);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified category.
     */
    public function destroy($slug)
    {
        $this->checkAdmin();
        $categories = CategoryService::getAll();
        $filtered = array_filter($categories, function($cat) use ($slug) {
            return $cat['slug'] !== $slug;
        });

        if (count($categories) === count($filtered)) {
            abort(404, 'Danh mục không tồn tại.');
        }

        CategoryService::save($filtered);

        return redirect()->route('admin.categories.index')->with('success', 'Đã xóa danh mục thành công!');
    }

    /**
     * Store a subcategory (tag) inside a category.
     */
    public function storeSubcategory(Request $request, $slug)
    {
        $this->checkAdmin();
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        $categories = CategoryService::getAll();
        $found = false;
        $name = $request->input('name');
        $subSlug = 'sub-' . Str::slug($name);

        foreach ($categories as $index => $cat) {
            if ($cat['slug'] === $slug) {
                // Check duplicate subcategory slug
                foreach ($cat['subcategories'] as $sub) {
                    $existingSlug = is_array($sub) ? $sub['slug'] : 'sub-' . Str::slug($sub);
                    if ($existingSlug === $subSlug) {
                        return redirect()->back()->withErrors(['name' => 'Phân loại phụ này đã tồn tại trong danh mục.']);
                    }
                }

                $subData = [
                    'name' => $name,
                    'slug' => $subSlug
                ];
                if ($request->filled('url')) {
                    $subData['url'] = $request->input('url');
                }

                $categories[$index]['subcategories'][] = $subData;
                $found = true;
                break;
            }
        }

        if (!$found) {
            abort(404, 'Danh mục không tồn tại.');
        }

        CategoryService::save($categories);

        return redirect()->route('admin.categories.index')->with('success', 'Đã thêm phân loại phụ "' . $name . '" thành công!');
    }

    /**
     * Update a subcategory.
     */
    public function updateSubcategory(Request $request, $slug, $subSlug)
    {
        $this->checkAdmin();
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
        ]);

        $categories = CategoryService::getAll();
        $found = false;
        $newName = $request->input('name');
        $newSubSlug = 'sub-' . Str::slug($newName);

        foreach ($categories as $index => $cat) {
            if ($cat['slug'] === $slug) {
                foreach ($cat['subcategories'] as $subIndex => $sub) {
                    $currentSubSlug = is_array($sub) ? $sub['slug'] : 'sub-' . Str::slug($sub);
                    if ($currentSubSlug === $subSlug) {
                        $subData = [
                            'name' => $newName,
                            'slug' => $newSubSlug
                        ];
                        if ($request->filled('url')) {
                            $subData['url'] = $request->input('url');
                        }
                        $categories[$index]['subcategories'][$subIndex] = $subData;
                        $found = true;
                        break 2;
                    }
                }
            }
        }

        if (!$found) {
            abort(404, 'Không tìm thấy phân loại phụ.');
        }

        CategoryService::save($categories);

        return redirect()->route('admin.categories.index')->with('success', 'Đã cập nhật phân loại phụ thành công!');
    }

    /**
     * Delete a subcategory.
     */
    public function destroySubcategory($slug, $subSlug)
    {
        $this->checkAdmin();
        $categories = CategoryService::getAll();
        $found = false;

        foreach ($categories as $index => $cat) {
            if ($cat['slug'] === $slug) {
                $filteredSubs = array_filter($cat['subcategories'], function($sub) use ($subSlug) {
                    $currentSubSlug = is_array($sub) ? $sub['slug'] : 'sub-' . Str::slug($sub);
                    return $currentSubSlug !== $subSlug;
                });

                if (count($cat['subcategories']) !== count($filteredSubs)) {
                    $categories[$index]['subcategories'] = array_values($filteredSubs);
                    $found = true;
                    break;
                }
            }
        }

        if (!$found) {
            abort(404, 'Không tìm thấy phân loại phụ.');
        }

        CategoryService::save($categories);

        return redirect()->route('admin.categories.index')->with('success', 'Đã xóa phân loại phụ thành công!');
    }
}
