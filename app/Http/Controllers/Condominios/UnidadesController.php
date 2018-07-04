<?php

namespace WebCondom\Http\Controllers\Condominios;

use DB;
use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\Unidade;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Entidades\Proprietario;
use WebCondom\Models\Entidades\Inquilino;
use WebCondom\Models\Diversos\TipoImovel;
use WebCondom\Http\Requests\Condominios\UnidadeRequest;


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
        $unidades   = $this->unidade->where('condominio_id',$idCondominio)->get();

        if( $unidades ){
            return view('condominios.unidades.listar', compact('unidades','condominio'));
        }
        Toast::error('Nenhum condomínio com esse ID foi encontrado!', 'Erro!');
        return view('condominios.condominios.listar',compact('condominio'));
    }

	public function Criar($idCondominio)
	{
		$condominio     = $this->condominio->find($idCondominio);
		$proprietarios  = $this->proprietario->all();
		$inquilinos     = $this->inquilino->all();
		$tiposimoveis   = $this->tipoimovel->all();

		return view('condominios.unidades.formulario', compact('condominio','proprietarios','inquilinos','tiposimoveis'));
	}

	public function Salvar(UnidadeRequest $request, $idCondominio)
	{
		$unidade = $this->unidade->create( $request->all() );

		if ( isset($unidade) ) {
			Toast::success('Unidade incluída com sucesso!', 'Inclusão!');
			return redirect()->route('condominios.unidades.listar', ['idCondominio' => $idCondominio]);
		} else {
			Toast::error('Ocorreu um erro ao criar a unidade!','Erro!');
			return redirect()->route('condominios.unidades.listar', ['idCondominio' => $idCondominio]);
		}
	}

    public function Exibir($id, $idCondominio)
    {
        $unidade        = $this->unidade->find($id);
        $condominio     = $this->condominio->find($idCondominio);
        $proprietarios  = $this->proprietario->all();
        $inquilinos     = $this->inquilino->all();
        $tiposimoveis   = $this->tipoimovel->all();

        if ( isset($unidade) ) {
            return view('condominios.unidades.formulario', compact('unidade','condominio','proprietarios','inquilinos','tiposimoveis'));
        }
        Toast::error('Nenhuma unidade encontrada!','Erro!');
        return view('condominios.unidades.listar',compact('id','condominio'));
    }

    public function Alterar(UnidadeRequest $request, $id, $idCondominio)
    {
        $unidade = $this->unidade->find($id);

        if( isset($unidade) ){
            $unidade->update( $request->all() );
            Toast::success('Unidade alterado com sucesso!','Alteração!');
            return redirect()->route('condominios.unidades.listar',compact('idCondominio'));
        }
		Toast::error('Unidade não encontrada!','Erro!');
    }

	public function Excluir($id, $idCondominio)
	{
		$this->unidade->find($id)->delete();
		Toast::success('Unidade excluída com sucesso!','Exclusão!');
		return redirect()->route('condominios.unidades.listar',compact('idCondominio'));
	}
}
