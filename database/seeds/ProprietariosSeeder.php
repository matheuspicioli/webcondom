<?php

use Illuminate\Database\Seeder;

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
        factory(WebCondom\Models\Entidades\Proprietario::class, 2)
            ->create()
            ->each(function ($proprietario) use ($entidades) {
                $entidade = $entidades->random();

                $proprietario->entidade()->associate($entidade);
                $proprietario->save();
            });
    }
}
