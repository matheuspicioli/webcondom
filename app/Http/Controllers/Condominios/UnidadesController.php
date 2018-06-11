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
        $condominio = $this->condominio->find($idCondominio);
        $unidades   = $this->unidade->where('condominio_id','=',$idCondominio)->get();

        if( $unidades ){
            return view('condominios.unidades.listar', compact('unidades','condominio'));
        }
        Toast::error('Nenhuma condomínio com esse ID foi encontrado!', 'Erro!');
        return view('condominios.unidades.listar',compact('condominio'));
    }

    public function Excluir($id, $idCondominio)
    {
        Unidade::find($id)->delete();
        Toast::success('Unidade excluída com sucesso!','Exclusão!');
        return redirect()->route('condominios.unidades.listar',compact('idCondominio'));
    }

    public function Exibir($id, $idCondominio)
    {
        $unidade        = $this->unidade->find($id) or null;
        $condominio     = $this->condominio->find($idCondominio);
        $proprietarios = $this->proprietario->all();
        $inquilinos     = $this->inquilino->all();
        $tiposimoveis   = $this->tipoimovel->all();

        if ($unidade) {
            return view('condominios.unidades.exibir', compact('unidade','condominio','proprietarios','inquilinos','tiposimoveis'));
        } else {
            $this->unidade->erro('Unidade não encontrada!','Erro!');
        }
    }}
