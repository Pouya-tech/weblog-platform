@extends('layouts.master')

@section('content')
    <div class="category-list-container">

        <!-- هدر صفحه: عنوان + دکمه ثبت -->
        <div class="category-list-header">
            <div class="page-title">
                <span class="title-accent"></span>
                <h4>لیست تگ ها</h4>
            </div>

            <a href="{{ route('tags.create') }}" class="btn-add-category">
                <i class="bi bi-plus-lg"></i> ثبت تگ جدید
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
                        <th>اسلاگ(نامک یکتا)</th>
                        <th>وضعیت</th>
                        <th>تاریخ ثبت</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @forelse ($categories as $category) --}}
                    @forelse ($tags as $tag)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td class="category-name">{{ $tag->slug }}</td>
                            <td>
                                @if ($tag->is_active)
                                    <span class="px-2 py-1 bg-green-100 text-green-600 rounded-lg text-sm">فعال</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-600 rounded-lg text-sm">غیر فعال</span>
                                @endif
                            </td>
                            <td class="py-4 text-gray-500">{{ verta($tag->created_at)->format('Y/m/d') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('tags.edit', $tag) }}" class="btn-action btn-edit" title="ویرایش">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>
                                <form action="{{ route('tags.destroy', $tag) }}" method="POST"
                                    onclick="return confirm('آیا از حذف این تگ مطمئن هستید؟')" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn-action btn-delete" title="حذف">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-red-500">
                                هیچ تگی یافت نشد
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- صفحه‌بندی -->
        <div class="category-pagination">

        </div>
        <!-- صفحه‌بندی -->
        <div class="category-pagination mt-4">
            {{ $tags->links() }}
        </div>
    </div>
@endsection
