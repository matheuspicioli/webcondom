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
            'nome'                  => 'METROPOLITAN ADM.CONDOMINIOS LTDA.',
            'rg_ie'                 => 'ISENTO',
            'fantasia'              => 'METROPOLITAN ADM.CONDOMINIOS',
            'inscricao_municipal'   => '5.567-3',
            'tipo'                  => '2',
            'endereco_principal_id' => '2',
            'ramo_atividade'        => 'ADM.CONDOMINIOS',
            'data_abertura'         => '1994-05-28',
            'telefone_principal'    => '1732112500',
            'telefone_comercial'    => '17 32112500',
            'celular_1'             => '17987654321',
            'celular_2'             => '17991111111',
            'site'                  => 'www.metropolitanadm.com.br',
            'email'                 => 'contato@metropolitanadm.com.br']);

        Entidade::create([
            'cpf_cnpj'              => '11122233344',
            'nome'                  => 'JOAO CARLOS DA SILVA',
            'apelido'               => 'JC',
            'rg_ie'                 => '20300400-5',
            'tipo'                  => '1',
            'nome_mae'              => 'jOSEFA DA SILVA',
            'estado_civil_id'       => 2,
            'regime_casamento_id'   => 2,
            'profissao'             => 'ADVOGADO',
            'data_nascimento'       => '1960-02-02',
            'nacionalidade'         => 'Brasileiro(a)',
            'empresa'               => 'ADVOCACIA INTEGRADA',
            'dependentes'           => '2',
            'inss'                  => '123456789-00-1',
            'endereco_principal_id' => 3,
            'telefone_principal'    => '1732323030',
            'telefone_comercial'    => '1730033003',
            'celular_1'             => '17991919191',
            'celular_2'             => '',
            'email'                 => 'jc@hotmail.com',
            'endereco_cobranca_id'  => 4]);

        Entidade::create([
            'cpf_cnpj'              => '10222333000155',
            'nome'                  => 'ELEVADORES ATLAS S/A',
            'rg_ie'                 => '647.123.456.110',
            'fantasia'              => 'ELEVADORES ATLAS',
            'inscricao_municipal'   => '',
            'tipo'                  => '2',
            'endereco_principal_id' => '4',
            'ramo_atividade'        => 'ELEVADORES',
            'data_abertura'         => '1935-10-31',
            'telefone_principal'    => '170800151617',
            'telefone_comercial'    => '17 33040408',
            'celular_1'             => '17811178877',
            'celular_2'             => '',
            'site'                  => 'atlas.com.br',
            'email'                 => 'contato@atlas.com.br']);

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
