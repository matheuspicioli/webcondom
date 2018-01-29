<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Autorizacao\Permissao;
use WebCondom\Models\Autorizacao\Role;
use WebCondom\User;

class AutorizacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'nome'      => 'ADMINISTRADOR',
            'descricao' => 'Permissão pra tudo no sistema'
        ]);
        $permissao = Permissao::create([
            'nome'      => 'autorizacoes',
            'descricao' => 'Permite ver a tela de cadastro de autorizações'
        ]);
        $role->permissoes()->sync($permissao);

        $usuarioMatheus = User::find(1);
        $usuarioMatheus->roles()->sync($role);

        $usuarioRenan   = User::find(2);
        $usuarioRenan->roles()->sync($role);

    }
}
