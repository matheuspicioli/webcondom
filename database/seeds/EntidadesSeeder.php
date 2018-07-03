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
            'tipo'                  => 'CNPJ',
            'endereco_principal_id' => '2',
            'ramo_atividade'        => 'ADM.CONDOMINIOS',
            'data_abertura'         => '1994-05-28',
            'telefone_principal'    => '1732112500',
            'telefone_comercial'    => '1732112500',
            'celular_1'             => '17987654321',
            'celular_2'             => '17991111111',
            'endereco_cobranca_id'  => 1,
            'site'                  => 'www.metropolitanadm.com.br',
            'email'                 => 'contato@metropolitanadm.com.br']);



        Entidade::create([
            'cpf_cnpj'              => '11122233344',
            'nome'                  => 'JOAO CARLOS DA SILVA',
            'apelido'               => 'JC',
            'rg_ie'                 => '203004005',
            'tipo'                  => 'CPF',
            'nome_mae'              => 'JOSEFA DA SILVA',
            'estado_civil_id'       => 2,
            'regime_casamento_id'   => 2,
            'profissao'             => 'ADVOGADO',
            'data_nascimento'       => '1960-02-02',
            'nacionalidade'         => 'Brasileiro(a)',
            'empresa'               => 'ADVOCACIA INTEGRADA',
            'dependentes'           => '2',
            'inss'                  => '123456789001',
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
            'apelido'               => 'ATLAS',
            'rg_ie'                 => '647.123.456.110',
            'fantasia'              => 'ELEVADORES ATLAS',
            'inscricao_municipal'   => '',
            'tipo'                  => 'CNPJ',
            'endereco_principal_id' => '9',
            'ramo_atividade'        => 'ELEVADORES',
            'data_abertura'         => '1935-10-31',
            'telefone_principal'    => '170800151617',
            'telefone_comercial'    => '1733040408',
            'celular_1'             => '17811178877',
            'celular_2'             => '',
            'site'                  => 'atlas.com.br',
            'email'                 => 'contato@atlas.com.br']);

        Entidade::create([
            'cpf_cnpj'              => '53206819000176',
            'nome'                  => 'FAZ TUDO SERVICOS LTDA.',
            'apelido'               => 'FAZ TUDO',
            'rg_ie'                 => '647.123.456.110',
            'fantasia'              => 'FAZ TUDO SERVICOS',
            'inscricao_municipal'   => '',
            'tipo'                  => 'CNPJ',
            'endereco_principal_id' => '5',
            'ramo_atividade'        => 'ELEVADORES',
            'data_abertura'         => '1935-10-31',
            'telefone_principal'    => '170800151617',
            'telefone_comercial'    => '1733040408',
            'celular_1'             => '17811178877',
            'celular_2'             => '',
            'site'                  => 'atlas.com.br',
            'email'                 => 'contato@atlas.com.br']);

        Entidade::create([
            'cpf_cnpj'              => '88100200011',
            'nome'                  => 'VANESSA RIBEIRO',
            'apelido'               => 'VANESSA',
            'rg_ie'                 => '20.300.888-5',
            'tipo'                  => 'CPF',
            'nome_mae'              => 'MAE DA VANESSA',
            'estado_civil_id'       => 2,
            'regime_casamento_id'   => 1,
            'profissao'             => 'SECRETARIA',
            'data_nascimento'       => '1980-08-02',
            'nacionalidade'         => 'BRASILEIRA',
            'empresa'               => 'METROPOLITAN ADM',
            'dependentes'           => '0',
            'inss'                  => '123456555-00-5',
            'endereco_principal_id' => 6,
            'telefone_principal'    => '1732323030',
            'telefone_comercial'    => '1732112500',
            'celular_1'             => '17981334455',
            'celular_2'             => '',
            'email'                 => 'processamento@metropolitanadm.com.br',
            'endereco_cobranca_id'  => 5]);
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
