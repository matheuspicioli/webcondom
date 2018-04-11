<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Condominios\CondominioRequest;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\CondominioTaxa;
use WebCondom\Models\Condominios\Sindico;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Enderecos\Endereco;

class CondominiosController extends Controller
{
	private $condominio;
	private $endereco;

	public function __construct(Condominio $condominio, Endereco $endereco)
	{
		$this->condominio = $condominio;
		$this->endereco = $endereco;
	}

	public function Listar()
    {
        $condominios = Condominio::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Condominios', 'url' => '']
        ]);
        return view('condominios.condominios.listar', compact('condominios', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Condominios', 'url' => route('condominios.condominios.listar')],
            ['titulo' => 'Cadastrar condomínio', 'url' => '']
        ]);
        $sindicos = Sindico::all();
        $cidades = Cidade::all();
        return view('condominios.condominios.criar', compact('sindicos', 'cidades', 'migalhas'));
    }

    public function Salvar(CondominioRequest $request)
    {
        //----ENDEREÇO DO CONDOMINIO---//
        $endereco 	= $this->endereco->create($request->all());
        $condominio = $this->condominio->create($request->all());
        $condominio->endereco()->associate($endereco);
        $condominio->save();
        $request->session()->flash('sucesso', 'Condomínio criado com sucesso!');
        return redirect()->route('condominios.condominios.listar');
    }

    public function Exibir($id)
    {
        $condominio = Condominio::find($id) ? Condominio::find($id) : null;

        if ($condominio) {
            $taxas = $condominio->taxas;
            $sindicos = Sindico::all();
            $cidades = Cidade::all();
            return view('condominios.condominios.exibir', compact('condominio', 'sindicos', 'cidades', 'taxas', 'migalhas'));
        } else
            return redirect()->route('condominios.condominios.criar', 'migalhas');
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
        $request->session()->flash('info', 'Condomínio alterado com sucesso!');
        return redirect()->route('condominios.condominios.listar');
    }

    public function Excluir(Request $request, $id)
    {
        $this->condominio->find($id)->delete();
        $request->session()->flash('warning', 'Condomínio deletado com sucesso!');
        return redirect()->route('condominios.condominios.listar');
    }
}
