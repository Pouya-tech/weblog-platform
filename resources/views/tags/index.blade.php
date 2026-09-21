@extends('layouts.master')

@section('content')
    <div class="category-list-container">

        <!-- هدر صفحه: عنوان + دکمه ثبت -->
        <div class="category-list-header">
            <div class="page-title">
                <span class="title-accent"></span>
                <h4>لیست تگ ها</h4>
            </div>

            <a href="{{ route('categories.create') }}" class="btn-add-category">
                <i class="bi bi-plus-lg"></i> ثبت جدید
            </a>
        </div>

        <!-- نمایش پیام موفقیت (Flash Message) -->
        @if (session('success'))
            <div class="alert-success-message">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- کارت جدول -->
        <div class="category-table-card">
            <table class="category-table">
                <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th>وضعیت</th>
                        <th>تاریخ ثبت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($categories as $category) --}}
                    <tr>
                        <td></td>
                        <td></td>
                        <td class="category-name"></td>
                        <td>
                            <span class="status-badge ">

                            </span>
                        </td>
                        <td></td>
                        <td>
                            <div class="action-buttons">
                                <a href="" class="btn-action btn-edit" title="ویرایش">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="حذف"
                                        onclick="return confirm('آیا از حذف این دسته‌بندی مطمئن هستید؟')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    {{-- @empty
                        <tr>
                            <td colspan="6" class="empty-state">
                                <i class="bi bi-inbox"></i>
                                <p>هیچ دسته‌بندی‌ای ثبت نشده است.</p>
                            </td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </table>
        </div>

        <!-- صفحه‌بندی -->
        <div class="category-pagination">
            
        </div>

    </div>
@endsection
