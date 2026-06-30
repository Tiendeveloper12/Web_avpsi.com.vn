@extends('layouts.app')

@section('title', ($banner->exists ? 'Chỉnh Sửa Banner' : 'Thêm Banner Mới') . ' - Âu Việt Phát')

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
                        <a href="{{ route('admin.banners.index') }}" class="ml-1 text-gray-500 hover:text-primary font-medium md:ml-2">Quản lý banner</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-primary font-medium md:ml-2">{{ $banner->exists ? 'Chỉnh sửa banner' : 'Thêm banner mới' }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl border border-gray-100 shadow-sm">
            <h1 class="text-2xl font-black text-gray-900 uppercase tracking-tight mb-8">
                {{ $banner->exists ? 'Cập nhật thông tin banner' : 'Tạo banner quảng cáo mới' }}
            </h1>

            <form action="{{ $banner->exists ? route('admin.banners.update', $banner->id) : route('admin.banners.store') }}" 
                  method="POST" 
                  enctype="multipart/form-data" 
                  class="space-y-6">
                @csrf
                @if($banner->exists)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="title" class="text-sm font-bold text-gray-700">Tiêu đề banner *</label>
                        <input type="text" id="title" name="title" value="{{ old('title', $banner->title) }}" required 
                               class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                        @error('title') <span class="text-rose-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Subtitle -->
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="subtitle" class="text-sm font-bold text-gray-700">Mô tả phụ</label>
                        <textarea id="subtitle" name="subtitle" rows="3" 
                                  class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">{{ old('subtitle', $banner->subtitle) }}</textarea>
                        @error('subtitle') <span class="text-rose-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Badge -->
                    <div class="flex flex-col gap-2">
                        <label for="badge" class="text-sm font-bold text-gray-700">Nhãn nhỏ (e.g. SẢN PHẨM MỚI)</label>
                        <input type="text" id="badge" name="badge" value="{{ old('badge', $banner->badge) }}" 
                               class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                        @error('badge') <span class="text-rose-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Button Text -->
                    <div class="flex flex-col gap-2">
                        <label for="button_text" class="text-sm font-bold text-gray-700">Chữ trên nút (e.g. Mua ngay)</label>
                        <input type="text" id="button_text" name="button_text" value="{{ old('button_text', $banner->button_text ?: 'Mua ngay') }}" 
                               class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                        @error('button_text') <span class="text-rose-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Link -->
                    <div class="flex flex-col gap-2 md:col-span-2">
                        <label for="link" class="text-sm font-bold text-gray-700">Đường dẫn khi nhấp vào *</label>
                        <input type="text" id="link" name="link" value="{{ old('link', $banner->link ?: '/category/') }}" required 
                               class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                        @error('link') <span class="text-rose-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="flex flex-col gap-2 md:col-span-2" x-data="{ imgPreview: '{{ $banner->image_path ? asset($banner->image_path) : '' }}' }">
                        <label class="text-sm font-bold text-gray-700">Hình ảnh banner * (Kích thước khuyên dùng: 1920x600px)</label>
                        
                        <!-- Upload Box -->
                        <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 flex flex-col items-center justify-center bg-gray-50/50 hover:bg-gray-50 transition-colors relative">
                            <input type="file" name="image" id="image" class="absolute inset-0 opacity-0 cursor-pointer" 
                                   @change="const file = $event.target.files[0]; if (file) { imgPreview = URL.createObjectURL(file); }">
                            
                            <template x-if="imgPreview">
                                <div class="w-full h-48 rounded-xl overflow-hidden shadow-sm border border-gray-100 bg-white">
                                    <img :src="imgPreview" class="w-full h-full object-cover">
                                </div>
                            </template>
                            
                            <template x-if="!imgPreview">
                                <div class="text-center py-4">
                                    <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    <span class="text-sm font-semibold text-primary">Tải ảnh lên hoặc kéo thả vào đây</span>
                                    <p class="text-xs text-gray-400 mt-1">Định dạng JPG, PNG, WEBP tối đa 5MB</p>
                                </div>
                            </template>
                        </div>
                        @error('image') <span class="text-rose-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Sort Order -->
                    <div class="flex flex-col gap-2">
                        <label for="sort_order" class="text-sm font-bold text-gray-700">Thứ tự hiển thị</label>
                        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $banner->sort_order ?: 0) }}" 
                               class="w-full h-12 px-4 rounded-xl border border-gray-200 focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all">
                        @error('sort_order') <span class="text-rose-600 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <!-- Active state checkbox -->
                    <div class="flex items-center gap-3 pt-8">
                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $banner->exists ? $banner->is_active : true) ? 'checked' : '' }}
                               class="w-5 h-5 rounded border-gray-300 text-primary focus:ring-primary">
                        <label for="is_active" class="text-sm font-bold text-gray-700 select-none">Hiển thị công khai banner này</label>
                    </div>
                </div>

                <!-- Form Footer -->
                <div class="flex items-center justify-end gap-4 border-t border-gray-100 pt-6 mt-6">
                    <a href="{{ route('admin.banners.index') }}" class="px-6 py-3 rounded-xl border border-gray-200 text-gray-700 font-bold hover:bg-gray-50 transition-colors">Quay lại</a>
                    <button type="submit" class="bg-primary hover:bg-primary-dark text-white px-8 py-3 rounded-xl font-bold transition-all shadow-md">
                        {{ $banner->exists ? 'Cập nhật' : 'Tạo mới' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
