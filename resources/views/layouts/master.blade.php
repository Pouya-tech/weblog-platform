<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'پنل مدیریت')</title>

    {{-- بارگذاری استایل‌ها و اسکریپت‌ها در هدر --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Persian Datepicker CSS -->
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">

</head>

<body class="bg-gray-50">
    <div class="flex min-h-screen">
        {{-- سایدبار --}}
        @unless (request()->routeIs('login', 'signup', 'password.*'))
            @include('partials.sidebar')
        @endunless
        {{-- محتوای اصلی فقط همین یک بار باید صدا زده بشه --}}
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>
    </div>
    <!-- ۱. کتابخانه‌های پایه JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>

    <!-- ۲. فعال‌سازی عمومی تقویم در تمام پنل -->
    <script>
        $(document).ready(function() {
            $('.persian-date-picker').persianDatepicker({
                format: 'YYYY/MM/DD',
                autoClose: true,
                initialValue: false
            });
        });
    </script>

    <!-- ۳. اسکریپت‌های اختصاصی هر صفحه (در صورت نیاز صفحات داخلی) -->
    @stack('scripts')
</body>

</html>
