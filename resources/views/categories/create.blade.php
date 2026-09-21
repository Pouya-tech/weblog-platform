@extends('layouts.master')

@section('content')
    <div class="category-form-container">
        <div class="category-card">
            <!-- هدر کارت -->
            <div class="category-card-header">
                <h5 class="category-card-title">
                    <i class="bi bi-folder-plus me-2"></i> ایجاد دسته‌بندی جدید
                </h5>
                <a href="{{ route('categories.index') }}" class="btn-back">
                    <i class="bi bi-arrow-left me-1"></i> بازگشت به لیست
                </a>
            </div>

            <!-- بدنه فرم -->
            <form action="{{ route('categories.store') }}" method="POST" class="category-form">
                @csrf

                <!-- ردیف عنوان و اسلاگ -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="name" class="form-label">عنوان دسته‌بندی <span class="required">*</span></label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" placeholder="مثال: آموزش برنامه‌نویسی"
                            value="{{ old('name') }}">
                        @error('name')
                            <span class="error-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="slug" class="form-label">اسلاگ (نامک یکتا)</label>
                        <input type="text" name="slug" id="slug"
                            class="form-control @error('slug') is-invalid @enderror"
                            placeholder="مثال: programming-tutorials" value="{{ old('slug') }}">
                        @error('slug')
                            <span class="error-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- ردیف چک‌باکس‌ها (وضعیت و ویژه) -->
                <div class="form-switches-group">
                    <label class="custom-checkbox-container">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', false) ? 'checked' : '' }}>
                        <span class="checkbox-label">وضعیت فعال باشد</span>
                    </label>

                    <label class="custom-checkbox-container">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                        <span class="checkbox-label">دسته‌بندی ویژه</span>
                    </label>
                </div>

                <!-- دکمه‌های عملیات -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check-circle me-1"></i> ثبت و ذخیره
                    </button>
                    <button type="reset" class="btn-reset">
                        <i class="bi bi-arrow-counterclockwise me-1"></i> ریست فرم
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
