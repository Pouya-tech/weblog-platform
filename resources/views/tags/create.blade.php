    @extends('layouts.master')

    @section('content')
        <div class="tag-form-container">
            <div class="tag-card">
                <!-- هدر کارت -->
                <div class="tag-card-header">
                    <h5 class="tag-card-title">
                        <i class="bi bi-tag me-2"></i> ایجاد تگ جدید
                    </h5>
                    <a href="{{ route('tags.index') }}" class="btn-back">
                        <i class="bi bi-arrow-left me-1"></i> بازگشت به لیست
                    </a>
                </div>

                <!-- بدنه فرم -->
                <form action="{{ route('tags.store') }}" method="POST" class="tag-form">
                    @csrf

                    <!-- ردیف عنوان و اسلاگ -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name" class="form-label">عنوان تگ <span class="required">*</span></label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="مثال: هوش مصنوعی"
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="error-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="slug" class="form-label">اسلاگ (نامک یکتا)</label>
                            <input type="text" name="slug" id="slug"
                                class="form-control @error('slug') is-invalid @enderror"
                                placeholder="مثال: ai-technology" value="{{ old('slug') }}">
                            @error('slug')
                                <span class="error-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- وضعیت -->
                    <div class="form-switches-group">
                        <label class="custom-checkbox-container">
                            <input type="checkbox" name="is_active" value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <span class="checkbox-label">وضعیت فعال باشد</span>
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
