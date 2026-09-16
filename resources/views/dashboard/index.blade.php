@extends('layouts.master')

@vite('resources/css/dashboard/index.css')

@push('styles')
    @vite('resources/css/dashboard/index.css')
@endpush

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-container">

            {{-- Top Bar / Header --}}
            <div class="dashboard-header">
                <div>
                    <h1 class="dashboard-title">
                        خوش آمدید، {{ auth()->user()->full_name ?? 'کاربر گرامی' }}
                        👋
                    </h1>
                    <p class="dashboard-subtitle">
                        پنل مدیریت و داشبورد کاربری شما
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <x-logout-button class="dashboard-btn-logout" />
                </div>
            </div>

            {{-- Stat Cards --}}
            <div class="stat-grid">
                {{-- Card 1 --}}
                <div class="stat-card">
                    <div>
                        <span class="stat-label">سفارش‌ها / تسک‌ها</span>
                        <h3 class="stat-value">۲۴</h3>
                        <span class="stat-trend">↑ ۱۲٪ نسبت به ماه قبل</span>
                    </div>
                    <div class="stat-icon stat-icon-blue">
                        📊
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="stat-card">
                    <div>
                        <span class="stat-label">پیام‌های جدید</span>
                        <h3 class="stat-value">۵</h3>
                        <span class="stat-muted">پاسخ داده نشده</span>
                    </div>
                    <div class="stat-icon stat-icon-amber">
                        💬
                    </div>
                </div>
                {{-- Card 3 --}}
                <div class="stat-card">
                    <!-- بلاک متنی (ستون عمودی) -->
                    <div class="flex flex-col items-start gap-1">
                        <span class="stat-label text-sm text-gray-500">سطح کاربر:</span>
                        <span class="text-2xl font-bold text-gray-800"> {{ auth()->user()->role_lable }}</span>
                    </div>

                    <!-- آیکون سمت چپ -->
                    <div class="stat-icon stat-icon-emerald">
                        <!-- SVG / آیکون -->
                        👤
                    </div>
                </div>

            </div>

            {{-- Main Table / Content Area --}}
            <div class="dashboard-panel">
                <div class="panel-header">
                    <h2 class="panel-title">فعالیت‌های اخیر</h2>
                    <a href="#" class="panel-link">مشاهده همه</a>
                </div>

                <div class="table-container">
                    <table class="dashboard-table">
                        <thead class="table-head">
                            <tr>
                                <th>عنوان</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th class="text-left">عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            <tr class="table-row">
                                <td class="table-cell-bold">بروزرسانی پروفایل</td>
                                <td class="table-cell">امروز، ۱۴:۲۰</td>
                                <td class="table-cell">
                                    <span class="badge-success">موفق</span>
                                </td>
                                <td class="table-cell text-left">
                                    <button class="table-btn-action">جزئیات</button>
                                </td>
                            </tr>
                            <tr class="table-row">
                                <td class="table-cell-bold">تغییر رمز عبور</td>
                                <td class="table-cell">دیروز، ۱۰:۱۵</td>
                                <td class="table-cell">
                                    <span class="badge-success">موفق</span>
                                </td>
                                <td class="table-cell text-left">
                                    <button class="table-btn-action">جزئیات</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
