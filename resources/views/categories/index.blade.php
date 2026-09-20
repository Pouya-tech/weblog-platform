@extends('layouts.master')

@section('content')
    <!-- Main Container (Card) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">

        <!-- Header & Action Button -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold text-gray-700">لیست دسته‌بندی‌ها</h2>
            <a href="{{ route('categories.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg flex items-center gap-2 transition">
                ثبت دسته‌بندی جدید +
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">

            <table class="w-full text-right border-collapse">
                <thead class="border-b border-gray-200">
                    <tr class="text-gray-400 text-sm">
                        <th class="pb-3">ردیف</th>
                        <th class="pb-3">عنوان</th>
                        <th class="pb-3">اسلاگ(نامک یکتا)</th>
                        <th class="pb-3">وضعیت</th>
                        <th class="pb-3">ویژه</th>
                        <th class="pb-3">تاریخ ثبت</th>
                        <th class="pb-3">عملیات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($categories as $category)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="py-4">{{ $loop->iteration }}</td>
                            <td class="py-4">{{ $category->name }}</td>
                            <td class="py-4">{{ $category->slug }}</td>
                            <td class="py-4">
                                @if ($category->is_active)
                                    <span class="px-2 py-1 bg-green-100 text-green-600 rounded-lg text-sm">فعال</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-600 rounded-lg text-sm">غیر فعال</span>
                                @endif
                            </td>
                            <td class="py-4">
                                @if ($category->is_featured)
                                    <span class="px-2 py-1 bg-green-100 text-green-600 rounded-lg text-sm">فعال</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-600 rounded-lg text-sm">غیر فعال</span>
                                @endif
                            </td>
                            <td class="py-4 text-gray-500">{{ verta($category->created_at)->format('Y/m/d') }}</td>
                            <td class="py-4 flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}"
                                    class="p-2 bg-yellow-400 rounded hover:bg-yellow-500 transition">📝</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    onsubmit="return confirm('آیا از حذف این دسته بندی مطمئن هستید؟')">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="p-2 bg-red-400 rounded hover:bg-red-500 transition">🗑️
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-8 text-center text-red-500">
                                هیچ دسته بندی یافت نشد
                            </td>
                        </tr>
                    @endforelse
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
