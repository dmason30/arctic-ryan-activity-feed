<?php

namespace App\Providers;

use App\Models\Activity;
use App\Models\Attachment;
use App\Models\Event;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Model::unguard();

        Relation::enforceMorphMap([
            Activity::class,
            Attachment::class,
            Event::class,
            Photo::class,
            Video::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
