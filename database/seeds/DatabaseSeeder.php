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
        $this->call('EnderecosSeeder');
        $this->call('SindicosSeeder');
        $this->call('CondominiosSeeder');
        $this->call('CondominiosTaxasSeeder');
        $this->call('EstadoCivilSeeder');
        $this->call('RegimeCasamentoSeeder');
    }
}
