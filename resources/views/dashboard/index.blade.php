@extends('layouts.master')

@vite('resources/css/dashboard/index.css')

@push('styles')
    @vite('resources/css/dashboard/index.css')
@endpush

@section('content')
    <div class="dashboard-wrapper rounded-2xl">
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

            <div class="stat-grid">
                @if (auth()->user()->isWriter())
                    {{-- کارت‌های مخصوص نویسنده --}}
                    <div class="stat-card">
                        <div>
                            <span class="stat-label">تعداد بلاگ‌های تایید شده</span>
                            <h3 class="stat-value">۲۴</h3>
                        </div>
                        <div class="stat-icon stat-icon-blue">📊</div>
                    </div>

                    <div class="stat-card">
                        <div>
                            <span class="stat-label">پیش‌نویس‌ها / در انتظار تایید</span>
                            <h3 class="stat-value">۵</h3>
                        </div>
                        <div class="stat-icon stat-icon-amber">⏳</div>
                    </div>
                @elseif(auth()->user()->hasElevatedAccess())
                    {{-- کارت‌های مخصوص مدیر/مالک --}}
                    <div class="stat-card">
                        <div>
                            <span class="stat-label">کل مقالات منتشر شده</span>
                            <h3 class="stat-value">۱۲۸</h3>
                        </div>
                        <div class="stat-icon stat-icon-blue">🌐</div>
                    </div>

                    <div class="stat-card">
                        <div>
                            <span class="stat-label">مقالات در انتظار تایید مدیر</span>
                            <h3 class="stat-value">۸</h3>
                        </div>
                        <div class="stat-icon stat-icon-rose">🔔</div>
                    </div>
                @endif

                {{-- کارت سوم: مشترک برای همه --}}
                <div class="stat-card">
                    <div class="flex flex-col items-start gap-1">
                        <span class="stat-label text-sm text-gray-500">سطح کاربر:</span>
                        <span class="text-2xl font-bold text-gray-800">{{ auth()->user()->role_lable }}</span>
                    </div>
                    <div class="stat-icon stat-icon-emerald">👤</div>
                </div>
            </div>


            {{-- Main Table / Content Area --}}
            <div class="dashboard-panel">
                <div class="panel-header">
                    <h2 class="panel-title">بلاگ های اخیر</h2>
                    <a href="#" class="panel-link">مشاهده همه</a>
                </div>

                <div class="table-container">
                    <table class="dashboard-table">
                        <thead class="table-head">
                            <tr>
                                <th>عنوان</th>
                                <th>تاریخ</th>
                                <th>وضعیت</th>
                                <th class="text-left">عملیات </th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            <tr class="table-row">
                                <td class="table-cel">
                                    @if (auth()->user()->isWriter())
                                        <a href="#" class="table-btn-action btn btn-warning">ویرایش پیش‌نویس</a>
                                    @elseif(auth()->user()->hasElevatedAccess())
                                        <button class="table-btn-action text-emerald-600">تایید و انتشار</button>
                                        <button class="table-btn-action text-rose-600">رد</button>
                                    @endif
                                </td>

                                <td class="table-cell">امروز، ۱۴:۲۰</td>
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
