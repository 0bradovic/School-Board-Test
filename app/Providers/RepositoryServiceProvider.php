<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Repositories\Student\StudentRepository;
use App\Repositories\Student\EloquentStudent;
use App\Repositories\Mark\MarkRepository;
use App\Repositories\Mark\EloquentMark;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->singleton(StudentRepository::class, EloquentStudent::class);
        $this->app->singleton(MarkRepository::class, EloquentMark::class);
    }
}
