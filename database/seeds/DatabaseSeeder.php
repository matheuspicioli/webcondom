<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('EstadosSeeder');
        $this->call('CidadesSeeder');
        $this->call('CondominiosTaxasSeeder');
        $this->call('SindicosSeeder');
    }
}
