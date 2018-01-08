<?php

use Illuminate\Database\Seeder;
use WebCondom\User;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email'     => 'mpicioli@gmail.com',
            'password'  => bcrypt('matheus1998'),
            'name'      => 'Matheus Augusto Picioli'
        ]);

        User::create([
            'email'     => 'renan@emporiumdigital.net',
            'password'  => bcrypt('123456'),
            'name'      => 'Renan Sanfelice'
        ]);
    }
}
