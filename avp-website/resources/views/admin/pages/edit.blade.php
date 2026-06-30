@extends('layouts.app')

@section('title', 'Tùy Chỉnh Phần Nội Dung - Âu Việt Phát')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container-custom">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-500 hover:text-primary transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Trang chủ
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('admin.pages.index', $section->page) }}" class="ml-1 text-gray-500 hover:text-primary font-medium md:ml-2">Tùy chỉnh trang {{ $section->page === 'home' ? 'Trang chủ' : 'Giới thiệu' }}</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-primary font-medium md:ml-2">Chỉnh sửa nội dung</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl mx-auto bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
            <h1 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-8">
                Tùy chỉnh phần: {{ $section->title ?: $section->section_key }}
            </h1>

            <form action="{{ route('admin.pages.update', $section->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- 1. EDIT FORM FOR PROMO BANNERS -->
                @if($section->section_key === 'promo_pc_repair' || $section->section_key === 'promo_photocopy')
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="title" class="text-sm font-bold text-gray-700">Tiêu đề chính *</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $section->title) }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="title_highlight" class="text-sm font-bold text-gray-700">Tiêu đề nổi bật (màu vàng) *</label>
                                <input type="text" id="title_highlight" name="title_highlight" value="{{ old('title_highlight', $section->content['title_highlight'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="badge" class="text-sm font-bold text-gray-700">Nhãn Badge *</label>
                                <input type="text" id="badge" name="badge" value="{{ old('badge', $section->content['badge'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="service_route" class="text-sm font-bold text-gray-700">Tên Route trang dịch vụ *</label>
                                <input type="text" id="service_route" name="service_route" value="{{ old('service_route', $section->content['service_route'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2 md:col-span-2">
                                <label for="zalo_link" class="text-sm font-bold text-gray-700">Link Chat Zalo *</label>
                                <input type="text" id="zalo_link" name="zalo_link" value="{{ old('zalo_link', $section->content['zalo_link'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2 md:col-span-2">
                                <label for="description" class="text-sm font-bold text-gray-700">Mô tả chi tiết *</label>
                                <textarea id="description" name="description" rows="4" required 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('description', $section->content['description'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Dynamic Highlights List using Alpine.js -->
                        <div class="flex flex-col gap-2" x-data="{ items: {{ json_encode($section->content['highlights'] ?? []) }} }">
                            <label class="text-sm font-bold text-gray-700">Danh sách đặc điểm nổi bật (Highlights)</label>
                            <div class="space-y-3">
                                <template x-for="(item, index) in items" :key="index">
                                    <div class="flex gap-3">
                                        <input type="text" name="highlights[]" :value="item" 
                                               class="flex-grow h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                                        <button type="button" @click="items.splice(index, 1)" class="px-4 text-rose-600 border border-rose-200 rounded-xl hover:bg-rose-50 transition-colors">Xóa</button>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="items.push('')" class="mt-2 w-fit px-4 py-2 border border-dashed border-primary text-primary font-bold rounded-xl hover:bg-primary/5 transition-colors">
                                + Thêm đặc điểm
                            </button>
                        </div>

                        <!-- Image File Upload -->
                        <div class="flex flex-col gap-2" x-data="{ imgPreview: '{{ !empty($section->content['image_path']) ? asset($section->content['image_path']) : '' }}' }">
                            <label class="text-sm font-bold text-gray-700">Ảnh minh họa (bên phải banner)</label>
                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 flex flex-col items-center justify-center bg-gray-50/50 relative">
                                <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer" 
                                       @change="const file = $event.target.files[0]; if (file) { imgPreview = URL.createObjectURL(file); }">
                                <template x-if="imgPreview">
                                    <div class="w-full h-40 rounded-xl overflow-hidden shadow-sm border border-gray-100 bg-white">
                                        <img :src="imgPreview" class="w-full h-full object-cover">
                                    </div>
                                </template>
                                <template x-if="!imgPreview">
                                    <div class="text-center py-2">
                                        <span class="text-sm font-semibold text-primary">Tải ảnh mới lên</span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                <!-- 2. EDIT FORM FOR ABOUT HERO -->
                @elseif($section->section_key === 'hero')
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="title" class="text-sm font-bold text-gray-700">Tiêu đề chính *</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $section->title) }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="title_highlight" class="text-sm font-bold text-gray-700">Tiêu đề nổi bật (màu vàng) *</label>
                                <input type="text" id="title_highlight" name="title_highlight" value="{{ old('title_highlight', $section->content['title_highlight'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2 md:col-span-2">
                                <label for="badge" class="text-sm font-bold text-gray-700">Nhãn Badge *</label>
                                <input type="text" id="badge" name="badge" value="{{ old('badge', $section->content['badge'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2 md:col-span-2">
                                <label for="description" class="text-sm font-bold text-gray-700">Đoạn mô tả giới thiệu ngắn *</label>
                                <textarea id="description" name="description" rows="4" required 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('description', $section->content['description'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                <!-- 3. EDIT FORM FOR BRAND STORY -->
                @elseif($section->section_key === 'brand_story')
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="title" class="text-sm font-bold text-gray-700">Tiêu đề *</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $section->title) }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="badge" class="text-sm font-bold text-gray-700">Nhãn Badge *</label>
                                <input type="text" id="badge" name="badge" value="{{ old('badge', $section->content['badge'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Dynamic Paragraphs -->
                        <div class="flex flex-col gap-2" x-data="{ paragraphs: {{ json_encode($section->content['paragraphs'] ?? []) }} }">
                            <label class="text-sm font-bold text-gray-700">Các đoạn văn bản câu chuyện thương hiệu</label>
                            <div class="space-y-3">
                                <template x-for="(p, index) in paragraphs" :key="index">
                                    <div class="flex gap-3 items-start">
                                        <textarea name="paragraphs[]" rows="3" class="flex-grow px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all" x-text="p"></textarea>
                                        <button type="button" @click="paragraphs.splice(index, 1)" class="px-4 py-2 text-rose-600 border border-rose-200 rounded-xl hover:bg-rose-50 transition-colors shrink-0">Xóa</button>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="paragraphs.push('')" class="mt-2 w-fit px-4 py-2 border border-dashed border-primary text-primary font-bold rounded-xl hover:bg-primary/5 transition-colors">
                                + Thêm đoạn văn
                            </button>
                        </div>

                        <!-- Highlights & Values -->
                        <div class="flex flex-col gap-4" x-data="{ features: {{ json_encode($section->content['features'] ?? []) }} }">
                            <label class="text-sm font-bold text-gray-700">Các điểm vượt trội (Bên phải câu chuyện thương hiệu)</label>
                            <div class="space-y-4">
                                <template x-for="(f, index) in features" :key="index">
                                    <div class="p-4 bg-gray-50 rounded-xl space-y-3 border border-gray-100">
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs font-bold text-gray-400">Đặc điểm nổi bật #<span x-text="index+1"></span></span>
                                            <button type="button" @click="features.splice(index, 1)" class="text-xs text-rose-600 font-bold hover:underline">Xóa</button>
                                        </div>
                                        <div class="grid grid-cols-1 gap-3">
                                            <input type="text" name="feature_titles[]" :value="f.title" placeholder="Tiêu đề điểm nổi bật..." 
                                                   class="w-full h-10 px-3 rounded-lg border border-gray-200 outline-none focus:border-primary">
                                            <textarea name="feature_descriptions[]" rows="2" placeholder="Mô tả ngắn..." 
                                                      class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary" x-text="f.description"></textarea>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="features.push({title: '', description: ''})" class="mt-2 w-fit px-4 py-2 border border-dashed border-primary text-primary font-bold rounded-xl hover:bg-primary/5 transition-colors">
                                + Thêm điểm nổi bật
                            </button>
                        </div>
                    </div>

                <!-- 4. EDIT FORM FOR VISION MISSION VALUES -->
                @elseif($section->section_key === 'vision_mission_values')
                    <div class="space-y-6">
                        <!-- Vision -->
                        <div class="p-6 bg-gray-50/50 rounded-2xl border border-gray-100 space-y-4">
                            <h3 class="font-bold text-gray-900 border-b pb-2">Tầm Nhìn</h3>
                            <div class="flex flex-col gap-2">
                                <label for="vision_title" class="text-sm font-bold text-gray-700">Tiêu đề tầm nhìn</label>
                                <input type="text" id="vision_title" name="vision_title" value="{{ old('vision_title', $section->content['vision']['title'] ?? 'Tầm Nhìn') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="vision_description" class="text-sm font-bold text-gray-700">Mô tả tầm nhìn</label>
                                <textarea id="vision_description" name="vision_description" rows="3" required 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('vision_description', $section->content['vision']['description'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Mission -->
                        <div class="p-6 bg-gray-50/50 rounded-2xl border border-gray-100 space-y-4">
                            <h3 class="font-bold text-gray-900 border-b pb-2">Sứ Mệnh</h3>
                            <div class="flex flex-col gap-2">
                                <label for="mission_title" class="text-sm font-bold text-gray-700">Tiêu đề sứ mệnh</label>
                                <input type="text" id="mission_title" name="mission_title" value="{{ old('mission_title', $section->content['mission']['title'] ?? 'Sứ Mệnh') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="mission_description" class="text-sm font-bold text-gray-700">Mô tả sứ mệnh</label>
                                <textarea id="mission_description" name="mission_description" rows="3" required 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('mission_description', $section->content['mission']['description'] ?? '') }}</textarea>
                            </div>
                        </div>

                        <!-- Values -->
                        <div class="p-6 bg-gray-50/50 rounded-2xl border border-gray-100 space-y-4">
                            <h3 class="font-bold text-gray-900 border-b pb-2">Giá Trị Cốt Lõi</h3>
                            <div class="flex flex-col gap-2">
                                <label for="values_title" class="text-sm font-bold text-gray-700">Tiêu đề giá trị cốt lõi</label>
                                <input type="text" id="values_title" name="values_title" value="{{ old('values_title', $section->content['values']['title'] ?? 'Giá Trị Cốt Lõi') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="values_description" class="text-sm font-bold text-gray-700">Nội dung các giá trị cốt lõi (Mỗi dòng một mục hoặc ghi nội dung tự do)</label>
                                <textarea id="values_description" name="values_description" rows="4" required 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">{{ old('values_description', $section->content['values']['description'] ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>

                <!-- 5. EDIT FORM FOR TIMELINE -->
                @elseif($section->section_key === 'timeline')
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex flex-col gap-2">
                                <label for="title" class="text-sm font-bold text-gray-700">Tiêu đề chính *</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $section->title) }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                            <div class="flex flex-col gap-2">
                                <label for="badge" class="text-sm font-bold text-gray-700">Nhãn Badge *</label>
                                <input type="text" id="badge" name="badge" value="{{ old('badge', $section->content['badge'] ?? '') }}" required 
                                       class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary outline-none transition-all">
                            </div>
                        </div>

                        <!-- Dynamic Timeline Milestones using Alpine.js -->
                        <div class="flex flex-col gap-4" x-data="{ milestones: {{ json_encode($section->content['milestones'] ?? []) }} }">
                            <label class="text-sm font-bold text-gray-700">Các cột mốc lịch sử phát triển</label>
                            <div class="space-y-4">
                                <template x-for="(m, index) in milestones" :key="index">
                                    <div class="p-4 bg-gray-50 rounded-xl space-y-3 border border-gray-100">
                                        <div class="flex justify-between items-center">
                                            <span class="text-xs font-bold text-gray-400">Cột mốc lịch sử #<span x-text="index+1"></span></span>
                                            <button type="button" @click="milestones.splice(index, 1)" class="text-xs text-rose-600 font-bold hover:underline">Xóa</button>
                                        </div>
                                        <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                                            <div class="md:col-span-1">
                                                <input type="text" name="milestone_years[]" :value="m.year" placeholder="Năm (e.g. 2016)..." required 
                                                       class="w-full h-10 px-3 rounded-lg border border-gray-200 outline-none focus:border-primary">
                                            </div>
                                            <div class="md:col-span-3">
                                                <input type="text" name="milestone_titles[]" :value="m.title" placeholder="Tiêu đề cột mốc..." required 
                                                       class="w-full h-10 px-3 rounded-lg border border-gray-200 outline-none focus:border-primary">
                                            </div>
                                            <div class="md:col-span-4">
                                                <textarea name="milestone_descriptions[]" rows="2" placeholder="Mô tả sự kiện cột mốc..." required 
                                                          class="w-full px-3 py-2 rounded-lg border border-gray-200 outline-none focus:border-primary" x-text="m.description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <button type="button" @click="milestones.push({year: '', title: '', description: ''})" class="mt-2 w-fit px-4 py-2 border border-dashed border-primary text-primary font-bold rounded-xl hover:bg-primary/5 transition-colors">
                                + Thêm cột mốc mới
                            </button>
                        </div>
                    </div>
                @endif

                <!-- Form Action Buttons -->
                <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6 mt-6">
                    <a href="{{ route('admin.pages.index', $section->page) }}" class="px-6 py-3 rounded-xl border border-gray-200 text-gray-700 font-bold hover:bg-gray-50 transition-colors">Quay lại</a>
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-bold transition-all shadow-md">
                        Lưu thay đổi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
