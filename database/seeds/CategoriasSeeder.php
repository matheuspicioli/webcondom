<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \WebCondom\Models\Diversos\Categoria::create(['descricao' => 'CATEGORIA1']);
        \WebCondom\Models\Diversos\Categoria::create(['descricao' => 'CATEGORIA2']);
        \WebCondom\Models\Diversos\Categoria::create(['descricao' => 'CATEGORIA3']);
    }
}
