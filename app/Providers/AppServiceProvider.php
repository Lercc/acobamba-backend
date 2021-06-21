<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Archivation;
use App\Observers\ArchivationObserver;
use App\Models\Derivation;
use App\Observers\DerivationObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Derivation::observe(DerivationObserver::class);
        Archivation::observe(ArchivationObserver::class);
    }
}
