<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Growlogs\Growlog;
use App\Models\Growlogs\GrowlogDay;
use App\Models\Growlogs\GrowlogStage;
use App\Observers\GrowlogObserver;
use App\Observers\GrowlogDayObserver;
use App\Observers\GrowlogStageObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Growlog::observe(GrowlogObserver::class);
        GrowlogDay::observe(GrowlogDayObserver::class);
        GrowlogStage::observe(GrowlogStageObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
