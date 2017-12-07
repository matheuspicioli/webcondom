<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Entidades\Fornecedor;

class FornecedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fornecedor::Create([
           'tipo_fornecedor'    => '1',
           'codigo'             => '1',
           'entidade_id'        => '3'
        ]);
        Fornecedor::Create([
            'tipo_fornecedor'    => '2',
            'codigo'             => '1',
            'entidade_id'        => '4'
        ]);
        Fornecedor::Create([
            'tipo_fornecedor'    => '1',
            'codigo'             => '1',
            'entidade_id'        => '5'
        ]);
    }
}
