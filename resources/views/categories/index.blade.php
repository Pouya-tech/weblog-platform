@extends('layouts.master')

@section('content')
<div class="category-list-container">

    <!-- هدر: عنوان صفحه و دکمه افزودن -->
    <div class="category-list-header">
        <div class="page-title">
            <span class="title-accent"></span>
            <h4>لیست دسته‌بندی‌ها</h4>
        </div>

        <a href="{{ route('categories.create') }}" class="btn-primary-action">
            <i class="bi bi-plus-lg"></i> ثبت دسته‌بندی جدید
        </a>
    </div>

    <!-- کارت جدول -->
    <div class="category-table-card">
        <div class="table-responsive">
            <table class="category-table">
                <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th>عنوان</th>
                        <th>اسلاگ (نامک یکتا)</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-center">ویژه</th>
                        <th class="text-center">تاریخ ثبت</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td class="text-center row-number">
                                {{ $loop->iteration }}
                            </td>
                            <td class="item-title font-bold">
                                {{ $category->name }}
                            </td>
                            <td class="item-slug">
                                <code>{{ $category->slug }}</code>
                            </td>
                            <td class="text-center">
                                @if($category->is_active)
                                    <span class="badge-status badge-success">فعال</span>
                                @else
                                    <span class="badge-status badge-danger">غیر فعال</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($category->is_featured)
                                    <span class="badge-status badge-success">فعال</span>
                                @else
                                    <span class="badge-status badge-danger">غیر فعال</span>
                                @endif
                            </td>
                            <td class="text-center item-date">
                                {{ function_exists('verta') ? verta($category->created_at)->format('Y/m/d') : $category->created_at->format('Y-m-d') }}
                            </td>
                            <td class="text-center">
                                <div class="action-buttons">
                                    <!-- دکمه ویرایش -->
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn-action btn-edit" title="ویرایش">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <!-- دکمه حذف -->
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این دسته‌بندی مطمئن هستید؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete" title="حذف">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty-table-state">
                                <i class="bi bi-folder-x"></i>
                                <p>هیچ دسته‌بندی‌ای یافت نشد.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- صفحه‌بندی (Pagination) در صورت نیاز -->
        @if(method_exists($categories, 'links'))
            <div class="category-pagination">
                {{ $categories->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
