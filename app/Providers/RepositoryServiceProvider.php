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
        $this->app->bind(\WebCondom\Repositories\Financeiros\PlanoDeContasRepository::class, \WebCondom\Repositories\Financeiros\PlanoDeContasRepositoryEloquent::class);
        $this->app->bind(\WebCondom\Repositories\Financeiros\ContasCorrenteRepository::class, \WebCondom\Repositories\Financeiros\ContasCorrenteRepositoryEloquent::class);
        $this->app->bind(\WebCondom\Repositories\Financeiros\BancosRepository::class, \WebCondom\Repositories\Financeiros\BancosRepositoryEloquent::class);
        $this->app->bind(\WebCondom\Repositories\Condominios\CondominiosRepository::class, \WebCondom\Repositories\Condominios\CondominiosRepositoryEloquent::class);
        //:end-bindings:
    }
}
