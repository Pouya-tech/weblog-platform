<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'پنل مدیریت')</title>

    {{-- بارگذاری استایل‌ها و اسکریپت‌ها در هدر --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
</body>

</html>
