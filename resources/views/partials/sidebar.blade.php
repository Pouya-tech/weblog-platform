<nav id="sidebar" class="bg-dark text-white p-3" style="min-width: 250px; min-height: 100vh;">
    <div class="sidebar-header mb-4">
        <h4 class="text-center">پنل مدیریت</h4>
    </div>

    <ul class="nav flex-column">
        <!-- داشبورد -->
        <li class="nav-item mb-2">
            <a href="{{ route('dashboard') }}"
                class="nav-link text-white {{ request()->routeIs('dashboard') ? 'bg-danger' : 'hover-bg-secondary' }}">
                <i class="bi bi-house-door me-2"></i> داشبورد
            </a>
        </li>

        <!-- دسته‌بندی‌ها -->
        @can('manage-categories')
            <li class="nav-item mb-2">
                <a href="{{ route('categories.index') }}"
                    class="nav-link text-white {{ request()->routeIs('categories.*') ? 'bg-danger' : 'hover-bg-secondary' }}">
                    <i class="bi bi-collection me-2"></i> دسته‌بندی‌ها
                </a>
            </li>
        @endcan
        <!-- تگ ها -->
        <li class="nav-item mb-2">
            <a href="{{ route('tags.index') }}"
                class="nav-link text-white {{ request()->routeIs('tags.*') ? 'bg-danger' : 'hover-bg-secondary' }}">
                <i class="bi bi-tags me-2"></i> تگ ها
            </a>
        </li>

        <!-- مقالات -->
        <li class="nav-item mb-2">
            <a href="{{route('posts.index')}}"
                class="nav-link text-white {{ request()->routeIs('posts.*') ? 'bg-danger' : 'hover-bg-secondary' }}">
                <i class="bi bi-file-earmark-text me-2"></i> مقالات
            </a>
        </li>
    </ul>

</nav>
