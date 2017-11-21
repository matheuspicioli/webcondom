<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\CondominioTaxa;
use WebCondom\Models\Condominios\Sindico;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Enderecos\Endereco;

class CondominiosController extends Controller
{
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

    public function Salvar(Request $request)
    {
        //----ENDEREÇO DO CONDOMINIO---//
        $endereco = new Endereco($request->only(
            'logradouro', 'numero','cep','bairro','cidade_id'
        ));
        $endereco->save();

        $condominio = Condominio::create($request->all());
        $condominio->endereco()->associate($endereco);
        $condominio->save();

        return redirect()->route('condominios.condominios.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Condominios', 'url' => route('condominios.condominios.listar')],
            ['titulo' => 'Alterar condomínio', 'url' => '']
        ]);
        $condominio = Condominio::find($id) ? Condominio::find($id) : null;

        if ($condominio) {
            $taxas = $condominio->taxas;
            $sindicos = Sindico::all();
            $cidades = Cidade::all();
            return view('condominios.condominios.exibir', compact('condominio', 'sindicos', 'cidades', 'taxas', 'migalhas'));
        } else
            return redirect()->route('condominios.condominios.criar', 'migalhas');
    }

    public function Alterar(Request $request, $id)
    {
        //----CONDOMINIO----//
        $condominio = Condominio::find($id);
        $condominio->update($request->all());
        //----ENDEREÇO DO CONDOMINIO---//
          $condominio->endereco()->update($request->all());
        //SALVA E SALVA O RELACIONAMENTO TAMBÉM
        $condominio->push();

        return redirect()->route('condominios.condominios.exibir', ['id' => $id]);
    }

    public function Excluir($id)
    {
        Condominio::find($id)->delete();
        return redirect()->route('condominios.condominios.listar');
    }
}
