<?php

namespace App\Providers;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(
            \Laravel\Fortify\Contracts\LoginResponse::class,
            \App\Http\Responses\LoginResponse::class
        );
    }

    /**
     * Bootstrap any application services.
     */
 public function boot(): void
{
    if (Schema::hasTable('services')) {

        $services = Service::where('status', 'active')
                    ->orderBy('name')
                    ->get();

        View::share('services', $services);
    }
}
}
