<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-categories', function ($user) {
            return in_array($user->role, ['admin', 'owner']);
        });

        Gate::define('manage-tags', function ($user) {
            return in_array($user->role, ['admin', 'owner']);
        });

        Gate::define('manage-posts', function (User $user) {
            return in_array($user->role, ['admin', 'owner']); // یا هر شرطی که برای نقش‌ها داری
        });
    }
}
