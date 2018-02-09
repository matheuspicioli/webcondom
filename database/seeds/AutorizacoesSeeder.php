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
        $usuarioMatheus = User::find(1);
        $usuarioMatheus->roles()->sync($role);

        $usuarioRenan   = User::find(2);
        $usuarioRenan->roles()->sync($role);

        $role = Role::create([
            'nome'      => 'GERENCIA',
            'descricao' => 'Controle de acessos e permissoes.'
        ]);

        $usuarioRenan   = User::find(3);
        $usuarioRenan->roles()->sync($role);

        $permissao = [
            [
                'nome'      => 'listar_condominio',
                'descricao' => 'Habilita menu de acesso.'
            ],
            [
                'nome'      => 'exibir_condominio',
                'descricao' => 'Permite exibir dados de condomínio.'
            ],
            [
                'nome'      => 'editar_condominio',
                'descricao' => 'Permite editar condomínio.'
            ],
            [
                'nome'      => 'deletar_condominio',
                'descricao' => 'Permite excluir registro de condomínio.'
            ],
            [
                'nome'      => 'incluir_condominio',
                'descricao' => 'Permite incluir registro de condomínio.'
            ]
        ];
        foreach ($permissao as $permissoes) {
            Permissao::create($permissoes);
        };
        $permissao_role = WebCondom\Models\Autorizacao\Permissao::all();
        foreach ($permissao_role as $permissao_roles) {
            DB::table('permissao_role')->insert([
                'permissao_id' => $permissao_roles->id,
                'role_id' => '2',
            ]);
        };
    }
}
