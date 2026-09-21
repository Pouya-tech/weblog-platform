@extends('layouts.master')

@section('content')
    <div class="tag-form-container">

        <!-- هدر: عنوان و دکمه بازگشت -->
        <div class="tag-form-header">
            <div class="page-title">
                <span class="title-accent"></span>
                <h4>ویرایش تگ</h4>
            </div>

            <a href="{{ route('tags.index') }}" class="btn-back">
                <i class="bi bi-arrow-right-short"></i> بازگشت
            </a>
        </div>

        <!-- کارت فرم ویرایش -->
        <div class="tag-form-card">
            <form action="{{ route('tags.update', $tag->id) }}" method="POST" novalidate>
                @csrf
                @method('PUT')

                <!-- فیلد عنوان -->
                <div class="form-group mb-4">
                    <label for="name" class="form-label">
                        عنوان <span class="text-danger">*</span>
                    </label>
                    <input type="text" name="name" id="name"
                        class="form-control-custom @error('name') is-invalid @enderror"
                        placeholder="عنوان تگ را وارد کنید..." value="{{ old('name', $tag->name) }}">
                    @error('name')
                        <span class="form-error">{{ $message }}</span>
                    @enderror
                </div>

                <!-- وضعیت تگ (چک‌باکس توگل/سوئیچ) -->
                <div class="form-group mb-4">
                    <label class="form-label d-block">وضعیت</label>
                    <label class="custom-checkbox">
                        <input type="checkbox" name="is_active" value="1"
                            {{ old('is_active', $tag->is_active ?? true) ? 'checked' : '' }}>
                        <span class="checkmark"></span>
                        <span class="checkbox-text">فعال</span>
                    </label>
                </div>

                <!-- دکمه‌های عملیات -->
                <div class="form-actions">
                    <button type="submit" class="btn-submit">
                        <i class="bi bi-check2"></i> ذخیره تغییرات
                    </button>
                    <button type="reset" class="btn-reset">
                        <i class="bi bi-arrow-counterclockwise"></i> ریست فرم
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection
