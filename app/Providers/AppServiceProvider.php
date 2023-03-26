<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Application\Core\Repository\CoreRpository;
use App\Application\Registration\Repository\RegistrationRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CoreRpository::class,RegistrationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
