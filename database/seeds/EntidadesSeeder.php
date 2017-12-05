<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Entidades\Entidade;

class EntidadesSeeder extends Seeder
{
     public function run()
    {
        $enderecosPrincipal  = WebCondom\Models\Enderecos\Endereco::all();
        $enderecosCobranca   = WebCondom\Models\Enderecos\Endereco::all();

        Entidade::create([
            'cpf_cnpj'              => '68261965000171',
            'nome'                  => 'METROPOLITAN ADM.CONDOMINOS LTDA.',
            'rg_ie'                 => 'ISENTO',
            'fantasia'              => 'METROPOLITAN ADM.CONDOMINIOS',
            'inscricao_municipal'   => '5.567-3',
            'tipo'                  => '2',
            'endereco_principal_id' => '2',
            'ramo_atividade'        => 'ADM.CONDOMINIOS',
            'data_abertura'         => '1994-05-28',
            'endereco_principal_id' => 2,
            'telefone_principal'    => '1732112500',
            'telefone_comercial'    => '17 32112500',
            'celular_1'             => '17987654321',
            'celular_2'             => '17991111111',
            'site'                  => 'www.metropolitanadm.com.br',
            'email'                 => 'contato@metropolitanadm.com.br']);

        factory(WebCondom\Models\Entidades\Entidade::class, 5)
            ->create()
            ->each(function($entidade) use ($enderecosPrincipal, $enderecosCobranca) {
                $enderecoPrincipal = $enderecosPrincipal->random();
                $enderecoCobranca = $enderecosCobranca->random();
                $entidade->endereco_principal()->associate($enderecoPrincipal);
                $entidade->endereco_cobranca()->associate($enderecoCobranca);
                $entidade->save();
            });
    }
}
