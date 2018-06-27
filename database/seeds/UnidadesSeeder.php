<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Condominios\Unidade;

class UnidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            [
                'condominio_id'             => '6',
                'bloco'                     => 'A',
                'unidade'                   => '101',
                'tipo_imovel_id'            => '1',
                'garagem'                   => '1',
                'bloquear_acesso'           => 'Nao',
                'proprietario_id'           => '1',
                'area_util'                 => '72',
                'area_total'                => '97',
                'indice'                    => '25',
                'boleto_impresso'           => 'Sim',
                'boleto_impresso_destino'   => 'Portaria',
                'boleto_email'              => 'Sim',
                'boleto_email_destino'      => 'Proprietario',
                'convocacao'                => 'Portaria',
                'convocacao_destino'        => 'Proprietario',
                'correspondencia'           => 'Correios',
                'correspondencia_destino'   => 'Inquilino'
            ],
            [
                'condominio_id'             => '6',
                'bloco'                     => 'C',
                'unidade'                   => '101',
                'tipo_imovel_id'            => '1',
                'bloquear_acesso'           => 'Nao',
                'proprietario_id'           => '5',
                'indice'                    => '25',
                'boleto_impresso'           => 'Sim',
                'boleto_impresso_destino'   => 'Portaria',
                'boleto_email'              => 'Sim',
                'boleto_email_destino'      => 'Proprietario',
                'convocacao'                => 'Portaria',
                'convocacao_destino'        => 'Proprietario',
                'correspondencia'           => 'Correios',
                'correspondencia_destino'   => 'Inquilino'
            ],
            [
                'condominio_id'             => '6',
                'bloco'                     => 'B',
                'unidade'                   => '201',
                'tipo_imovel_id'            => '1',
                'garagem'                   => '2',
                'bloquear_acesso'           => 'Nao',
                'proprietario_id'           => '2',
                'area_util'                 => '72',
                'area_total'                => '97',
                'indice'                    => '25',
                'boleto_impresso'           => 'Nao',
                'boleto_email'              => 'Sim',
                'boleto_email_destino'      => 'Todos',
                'convocacao'                => 'Portaria',
                'convocacao_destino'        => 'Proprietario',
                'correspondencia'           => 'Correios',
                'correspondencia_destino'   => 'Proprietario'
            ],
            [
                'condominio_id'             => '6',
                'bloco'                     => 'B',
                'unidade'                   => '202',
                'tipo_imovel_id'            => '1',
                'garagem'                   => '1',
                'bloquear_acesso'           => 'Nao',
                'proprietario_id'           => '3',
                'indice'                    => '25',
                'boleto_impresso'           => 'Sim',
                'boleto_impresso_destino'   => 'Correios',
                'boleto_email'              => 'Sim',
                'boleto_email_destino'      => 'Proprietario',
                'convocacao'                => 'Portaria',
                'convocacao_destino'        => 'Proprietario',
                'correspondencia'           => 'Correios',
                'correspondencia_destino'   => 'Inquilino'
            ],
            [
                'condominio_id'             => '5',
                'unidade'                   => '12',
                'tipo_imovel_id'            => '2',
                'bloquear_acesso'           => 'Nao',
                'proprietario_id'           => '4',
                'inquilino_id'              => '2',
                'indice'                    => '33',
                'boleto_impresso'           => 'Sim',
                'boleto_impresso_destino'   => 'Portaria',
                'boleto_email'              => 'Sim',
                'boleto_email_destino'      => 'Proprietario',
                'convocacao'                => 'Portaria',
                'convocacao_destino'        => 'Proprietario',
                'correspondencia'           => 'Correios',
                'correspondencia_destino'   => 'Inquilino'
            ]
        ];
        foreach ($dados as $dado) {
            Unidade::create($dado);
        };
    }
}
