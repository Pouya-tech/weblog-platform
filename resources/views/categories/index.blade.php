@extends('layouts.master')

@vite('resources/css/dashboard/index.css')

@push('styles')
    @vite('resources/css/dashboard/index.css')
@endpush

@section('content')
<!-- Main Container (Card) -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    
    <!-- Header & Action Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-gray-700">لیست دسته‌بندی‌ها</h2>
        <a href="{{ route('categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg flex items-center gap-2 transition">
            ثبت دسته‌بندی جدید +
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-right border-collapse">
            <thead class="border-b border-gray-200">
                <tr class="text-gray-400 text-sm">
                    <th class="pb-3">ردیف</th>
                    <th class="pb-3">شناسه</th>
                    <th class="pb-3">عنوان</th>
                    <th class="pb-3">وضعیت</th>
                    <th class="pb-3">تاریخ ثبت</th>
                    <th class="pb-3">عملیات</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                {{-- @foreach($categories as $category) --}}
                <tr class="hover:bg-gray-50 transition">
                    <td class="py-4"></td>
                    <td class="py-4"></td>
                    <td class="py-4"></td>
                    <td class="py-4">
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-xs">فعال</span>
                    </td>
                    <td class="py-4 text-gray-500"></td>
                    <td class="py-4 flex gap-2">
                        <a href="" class="p-2 bg-yellow-400 rounded hover:bg-yellow-500 transition">📝</a>
                        <button class="p-2 bg-red-400 rounded hover:bg-red-500 transition">🗑️</button>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
