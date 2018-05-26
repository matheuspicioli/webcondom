<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\Unidade;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Entidades\Proprietario;
use WebCondom\Models\Entidades\Inquilino;
use WebCondom\Models\Diversos\TipoImovel;


class UnidadesController extends Controller
{
    private $unidade;
    private $proprietario;
    private $inquilino;
    private $tipoimovel;
    private $condominio;

    public function __construct(Unidade $unidade, Proprietario $proprietario, Inquilino $inquilino, tipoimovel $tipoimovel, Condominio $condominio)
    {
        $this->unidade  	= $unidade;
        $this->proprietario = $proprietario;
        $this->inquilino 	= $inquilino;
        $this->tipoimovel 	= $tipoimovel;
        $this->condominio 	= $condominio;
    }

    public function Listar($idCondominio)
    {
        if( $condominio = $this->condominio->find($idCondominio) ){
            $unidades = $condominio->unidades;

            return view('condominios.unidades.listar', compact('unidades','idCondominio'));
        }
        Toast::error('Nenhuma condomínio com esse ID foi encontrado!', 'Erro!');
        return view('condominio.unidades.listar',compact('idCondominio'));
    }

}
