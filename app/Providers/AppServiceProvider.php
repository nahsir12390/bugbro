<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

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
        // Share the other users' posts count with all views
        View::composer('*', function ($view) {
            $count = 0;

            if (Auth::check()) {
                $count = Post::where('user_id', '!=', Auth::id())->count();
            }

            $view->with('otherUsersPostCount', $count);
        });
    }
}
