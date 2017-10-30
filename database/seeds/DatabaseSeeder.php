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
        $this->call('seed_estado_table');
        $this->call('seed_cidade_table');
        $this->call('seed_endereco_table');
    }
}
