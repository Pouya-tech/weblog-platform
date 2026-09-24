@extends('layouts.master')

@section('content')
<div class="post-create-container">

    <!-- کارت اصلی فرم -->
    <div class="post-card">
        
        <!-- هدر کارت: عنوان صفحه و دکمه بازگشت -->
        <div class="post-card-header">
            <div class="page-title">
                <span class="title-accent"></span>
                <h4>ایجاد مقاله جدید</h4>
            </div>

            <a href="{{ route('posts.index') }}" class="btn-back">
                <i class="bi bi-arrow-right"></i> بازگشت
            </a>
        </div>

        <!-- بدنه فرم -->
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="post-form">
            @csrf

            <!-- سطر اول: عنوان، اسلاگ، دسته‌بندی و تصویر -->
            <div class="form-grid-4">
                <div class="form-group">
                    <label for="title">عنوان <span class="text-danger">*</span></label>
                    <input type="text" name="title" id="title" class="form-input @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="عنوان مقاله را وارد کنید...">
                    @error('title')
                        <span class="error-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">اسلاگ (نامک یکتا) <span class="text-danger">*</span></label>
                    <input type="text" name="slug" id="slug" class="form-input @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="slug-name">
                    @error('slug')
                        <span class="error-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="category_id">دسته‌بندی <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                        <option value="" disabled selected>دسته‌بندی را انتخاب کنید</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="error-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">تصویر شاخص</label>
                    <input type="file" name="image" id="image" class="form-file-input @error('image') is-invalid @enderror" accept="image/*">
                    @error('image')
                        <span class="error-feedback">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- سطر دوم: توضیحات / محتوای کامل مقاله -->
            <div class="form-group full-width">
                <label for="body">توضیحات</label>
                <textarea name="body" id="body" rows="6" class="form-textarea @error('body') is-invalid @enderror" placeholder="متن و محتوای مقاله را بنویسید...">{{ old('body') }}</textarea>
                @error('body')
                    <span class="error-feedback">{{ $message }}</span>
                @enderror
            </div>

            <!-- سطر سوم: گزینه‌های وضعیت و ویژه -->
            <div class="switches-row">
                <label class="custom-switch-label">
                    <input type="checkbox" name="is_active" value="1" class="custom-checkbox" {{ old('is_active', true) ? 'checked' : '' }}>
                    <span>وضعیت (فعال / غیرفعال)</span>
                </label>

                <label class="custom-switch-label">
                    <input type="checkbox" name="is_featured" value="1" class="custom-checkbox" {{ old('is_featured') ? 'checked' : '' }}>
                    <span>ویژه</span>
                </label>
            </div>

            <!-- دکمه‌های ثبت و بازنشانی -->
            <div class="form-footer-actions">
                <button type="submit" class="btn-submit">
                    <i class="bi bi-check2-circle"></i> ثبت و ذخیره
                </button>
                <button type="reset" class="btn-reset">
                    <i class="bi bi-arrow-counterclockwise"></i> ریست فرم
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
