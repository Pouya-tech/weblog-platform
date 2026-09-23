@extends('layouts.master')

@section('content')
<div class="article-list-container">

    <!-- هدر: عنوان صفحه و دکمه افزودن -->
    <div class="article-list-header">
        <div class="page-title">
            <span class="title-accent"></span>
            <h4>جستجوی پیشرفته</h4>
        </div>

        <a href="{{ route('articles.create') }}" class="btn-primary-action">
            <i class="bi bi-plus-lg"></i> ثبت مقاله جدید
        </a>
    </div>

    <!-- بخش جستجوی پیشرفته -->
    <div class="filter-card">
        <form action="{{ route('articles.index') }}" method="GET" class="filter-form">
            <div class="filter-grid">
                <!-- فیلتر عنوان -->
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" name="title" id="title" class="form-input" placeholder="عنوان مقاله را وارد کنید..." value="{{ request('title') }}">
                </div>

                <!-- فیلتر دسته‌بندی -->
                <div class="form-group">
                    <label for="category_id">دسته‌بندی</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="">انتخاب کنید</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- فیلتر از تاریخ -->
                <div class="form-group">
                    <label for="from_date">از تاریخ</label>
                    <input type="date" name="from_date" id="from_date" class="form-input" value="{{ request('from_date') }}">
                </div>

                <!-- فیلتر تا تاریخ -->
                <div class="form-group">
                    <label for="to_date">تا تاریخ</label>
                    <input type="date" name="to_date" id="to_date" class="form-input" value="{{ request('to_date') }}">
                </div>
            </div>

            <!-- دکمه‌های جستجو و ریست -->
            <div class="filter-actions">
                <button type="submit" class="btn-filter btn-search">
                    <i class="bi bi-search"></i> جستجو
                </button>
                <a href="{{ route('articles.index') }}" class="btn-filter btn-reset">
                    <i class="bi bi-arrow-counterclockwise"></i> ریست
                </a>
            </div>
        </form>
    </div>

    <!-- عنوان بخش لیست -->
    <div class="section-subtitle">
        <span class="title-accent"></span>
        <h4>لیست مقالات</h4>
    </div>

    <!-- کارت جدول مقالات -->
    <div class="article-table-card">
        <div class="table-responsive">
            <table class="article-table">
                <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">شناسه</th>
                        <th class="text-center">تصویر</th>
                        <th>دسته‌بندی</th>
                        <th>عنوان</th>
                        <th class="text-center">وضعیت</th>
                        <th class="text-center">ویژه</th>
                        <th class="text-center">تاریخ ثبت</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td class="text-center row-number">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center item-id">
                                {{ $article->id }}
                            </td>
                            <td class="text-center">
                                <div class="article-thumb-wrapper">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-thumb">
                                    @else
                                        <div class="article-thumb-placeholder">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="item-category">
                                {{ $article->category->name ?? 'بدون دسته‌بندی' }}
                            </td>
                            <td class="item-title font-bold">
                                {{ $article->title }}
                            </td>
                            <td class="text-center">
                                @if($article->is_active)
                                    <span class="badge-status badge-success">فعال</span>
                                @else
                                    <span class="badge-status badge-danger">غیر فعال</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($article->is_featured)
                                    <span class="badge-status badge-warning">ویژه</span>
                                @else
                                    <span class="badge-status badge-secondary">غیر ویژه</span>
                                @endif
                            </td>
                            <td class="text-center item-date">
                                {{ function_exists('verta') ? verta($article->created_at)->format('Y/m/d - H:i') : $article->created_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="text-center">
                                <div class="action-buttons">
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn-action btn-edit" title="ویرایش">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>

                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('آیا از حذف این مقاله مطمئن هستید؟')">
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
                            <td colspan="9" class="empty-table-state">
                                <i class="bi bi-file-earmark-x"></i>
                                <p>هیچ مقاله‌ای یافت نشد.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($articles, 'links'))
            <div class="article-pagination">
                {{ $articles->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
