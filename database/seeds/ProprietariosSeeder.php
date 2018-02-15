<?php

use Illuminate\Database\Seeder;
use WebCondom\Models\Entidades\Proprietario;

class ProprietariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidades = WebCondom\Models\Entidades\Entidade::all();
        Proprietario::create([
            'codigo'        => '2253',
            'entidade_id'   => '2']);

        factory(WebCondom\Models\Entidades\Proprietario::class, 5)
            ->create()
            ->each(function ($proprietario) use ($entidades) {
                $entidade = $entidades->random();

                $proprietario->entidade()->associate($entidade);
                $proprietario->save();
            });
    }
}
