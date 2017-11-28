<?php

use Illuminate\Database\Seeder;

class EntidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enderecosPrincipal  = WebCondom\Models\Enderecos\Endereco::all();
        $enderecosCobranca   = WebCondom\Models\Enderecos\Endereco::all();

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
