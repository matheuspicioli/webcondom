<?php

use Illuminate\Database\Seeder;

class ImoveisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $enderecos = \WebCondom\Models\Enderecos\Endereco::all();
        $tiposImoveis = \WebCondom\Models\Diversos\TipoImovel::all();
        $categorias = \WebCondom\Models\Diversos\Categoria::all();
        $condominios = \WebCondom\Models\Condominios\Condominio::all();
        factory(\WebCondom\Models\Condominios\Imovel::class, 5)
            ->create()
            ->each(function ($imovel) use ($enderecos, $tiposImoveis, $categorias, $condominios) {
                $endereco = $enderecos->random();
                $tipoImovel = $tiposImoveis->random();
                $categoria = $categorias->random();
                $condominio = $condominios->random();

                $imovel->endereco()->associate($endereco);
                $imovel->tipo_imovel()->associate($tipoImovel);
                $imovel->categoria()->associate($categoria);
                $imovel->condominio()->associate($condominio);
                $imovel->save();
            });
    }
}
