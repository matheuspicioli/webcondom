<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Condominios\CondominioRequest;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\Sindico;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Enderecos\Endereco;

class CondominiosController extends Controller
{
	private $condominio;
	private $endereco;
	private $sindico;
	private $cidade;

	public function __construct(Condominio $condominio, Endereco $endereco, Sindico $sindico, Cidade $cidade)
	{
		$this->condominio 	= $condominio;
		$this->endereco 	= $endereco;
		$this->sindico 		= $sindico;
		$this->cidade 		= $cidade;
	}

	public function Listar()
    {
        $condominios = $this->condominio->all();
        return view('condominios.condominios.listar', compact('condominios'));
    }

    public function Criar()
    {
        $sindicos = $this->sindico->all();
        $cidades = $this->cidade->all();
        return view('condominios.condominios.criar', compact('sindicos', 'cidades'));
    }

    public function Salvar(CondominioRequest $request)
    {
        //----ENDEREÇO DO CONDOMINIO---//
        $endereco 	= $this->endereco->create($request->all());
        $condominio = $this->condominio->create($request->all());
        $condominio->endereco()->associate($endereco);
        $condominio->save();
		Toast::success('Condomínio incluído com sucesso!', 'Inclusão!');
        return redirect()->route('condominios.condominios.listar');
    }

    public function Exibir($id)
    {
        $condominio = $this->condominio->find($id) ? $this->condominio->find($id) : null;

        if ($condominio) {
            $taxas 		= $condominio->taxas;
            $sindicos 	= $this->sindico->all();
            $cidades 	= $this->cidade->all();
            return view('condominios.condominios.exibir', compact('condominio', 'sindicos', 'cidades', 'taxas'));
        } else
            return redirect()->route('condominios.condominios.criar');
    }

    public function Alterar(CondominioRequest $request, $id)
    {
        //----CONDOMINIO----//
        $condominio 		= $this->condominio->find($id);
        $condominio->update($request->all());
        //----ENDEREÇO DO CONDOMINIO---//
		$condominio->endereco()->update($request->all());
        //SALVA O RELACIONAMENTO TAMBÉM
        $condominio->push();
		Toast::success('Condomínio alterado com sucesso!', 'Alteração!');
        return redirect()->route('condominios.condominios.listar')
			->with('success', 'Condominio alterado com sucesso!');
    }

    public function Excluir($id)
    {
        $this->condominio->find($id)->delete();
		Toast::error('Condomínio excluído!', 'Exclusão!');
        return redirect()->route('condominios.condominios.listar');
    }
}
