<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Entidades\Funcionario;

class FuncionariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Funcionario::create([
            'codigo'          => '0',
            'setor_id'        => '1',
            'departamento_id' => '1',
            'entidade_id'     => '4']);

        Funcionario::create([
            'codigo'          => '0',
            'setor_id'        => '2',
            'departamento_id' => '2',
            'entidade_id'   => '9']);

    }
}
