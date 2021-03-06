<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Entidades\Empresa;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empresa::Create([
            'creci'         => 'J.5.567-3',
            'logo'          => 'logos_empresas/logo_metrop.jpg',
            'email_nfe'     => 'nfe@metropolitanadm.com.br',
            'entidade_id'   => '1']);
    }
}
