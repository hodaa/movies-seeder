<?php

namespace Hoda\Movies;

use Hoda\Movies\Commands\FetchCategories;
use Hoda\Movies\Commands\FetchMovies;
use Illuminate\Support\ServiceProvider;

class MoviesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Hoda\Movies\Controllers\MovieController');
        $this->app->make('Hoda\Movies\Repositories\MovieRepository');
        $this->mergeConfigFrom(__DIR__ . '/../config/movie.php', 'movie');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->commands([
            FetchMovies::class,
            FetchCategories::class
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';

    }
}
