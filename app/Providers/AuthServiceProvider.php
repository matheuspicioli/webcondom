<?php

namespace WebCondom\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use WebCondom\Models\Autorizacao\Permissao;
use WebCondom\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
//    protected $policies = [
//        'WebCondom\Model' => 'WebCondom\Policies\ModelPolicy',
//    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        if (!App::runningInConsole()) {
            $permissoes = Permissao::with('roles')->get();

            foreach ($permissoes as $permissao) {
                Gate::define($permissao->nome, function ($user) use ($permissao) {
                    return $user->temPermissao($permissao);
                });
            }

            Gate::before(function ($user, $permissao) {
                if ($user->temAlgumaRole('ADMINISTRADOR'))
                    return true;

//                return false;
            });
        }
    }
}
