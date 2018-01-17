<?php

namespace WebCondom\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\WebCondom\Repositories\Financeiros\GrupoDeContasRepository::class, \WebCondom\Repositories\Financeiros\GrupoDeContasRepositoryEloquent::class);
        //:end-bindings:
    }
}
