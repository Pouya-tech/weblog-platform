<nav id="sidebar" class="bg-dark text-white p-3" style="min-width: 250px; min-height: 100vh;">
    <div class="sidebar-header mb-4">
        <h4 class="text-center">پنل مدیریت</h4>
    </div>

    <ul class="nav flex-column">
        <!-- داشبورد -->
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
                class="nav-link text-white {{ request()->is('/') ? 'bg-danger' : 'hover-bg-secondary' }}">
                <i class="bi bi-house-door me-2"></i> داشبورد
            </a>
        </li>

        <!-- دسته‌بندی‌ها (فرض می‌کنیم نام مسیرش categories.index است) -->
        <li class="nav-item mb-2">
            <a href="#categories"
                class="nav-link text-white {{ request()->routeIs('categories.*') ? 'bg-danger' : 'hover-bg-secondary' }}">
                <i class="bi bi-list-ul me-2"></i> دسته‌بندی‌ها
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#tags"
                class="nav-link text-white {{ request()->routeIs('tags.*') ? 'bg-danger' : 'hover-bg-secondary' }}">
                <i class="bi bi-list-ul me-2"></i> تگ ها
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="#posts"
                class="nav-link text-white {{ request()->routeIs('posts.*') ? 'bg-danger' : 'hover-bg-secondary' }}">
                <i class="bi bi-list-ul me-2"></i>مقالات
            </a>
        </li>
    </ul>
</nav>

<style>
    .hover-bg-secondary:hover {
        background-color: #747a80;
        border-radius: 5px;
    }

    .bg-danger {
        background-color: #dc3545 !important;
        border-radius: 5px;
    }

    /* رنگ قرمز بوت‌استرپ */
    #sidebar {
        direction: rtl;
        text-align: right;
    }

    .nav-link {
        display: flex;
        align-items: center;
        transition: 0.3s;
    }
</style>
