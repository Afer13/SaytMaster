<?php

namespace App\Providers;

use App\Services\SettingService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        view()->share('setting',SettingService::getSetting());
        Blade::directive('active', function ($expression) {
            return "<?php echo Str::startsWith(request()->path(), $expression) ? 'active' : ''; ?>";
        });
    }
}
