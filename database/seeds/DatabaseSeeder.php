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
        $this->call('UsuariosSeeder');
        $this->call('EstadosSeeder');
        $this->call('CidadesSeeder');
        $this->call('EnderecosSeeder');
        $this->call('SindicosSeeder');
        $this->call('CondominiosSeeder');
        $this->call('CondominiosTaxasSeeder');
        $this->call('EstadoCivilSeeder');
        $this->call('RegimeCasamentoSeeder');
        $this->call('DepartamentoSeeder');
        $this->call('SetoresSeeder');
        $this->call('EntidadesSeeder');
        $this->call('ProprietariosSeeder');
        $this->call('CategoriasSeeder');
        $this->call('TipoImoveisSeeder');
        $this->call('ImoveisSeeder');
        $this->call('EmpresasSeeder');
        $this->call('FornecedoresSeeder');
        $this->call('FuncionariosSeeder');
        $this->call('BancosSeeder');
    }
}
