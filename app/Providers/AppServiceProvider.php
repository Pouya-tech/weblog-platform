<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Morilog\Jalali\Jalalian;

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
        Builder::macro('whereShamsDate', function ($column, $operator, $shamsDate) {
            /** @var Builder $this */ // 
            if (empty($shamsDate)) {
                return $this;
            }
            try {
                // Transform Persian & Arabic numbers to English
                $cleanDate = str_replace(
                    ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩'],
                    ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
                    $shamsDate
                );
                // Transform the Christian to Solar calender
                $miladDate = Jalalian::fromFormat('Y/m/d', $cleanDate)->toCarbon()->toDateString();
                return $this->whereDate($column, $operator, $miladDate);
            } catch (\Exception $e) {
                return $this;
            }
        });






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
