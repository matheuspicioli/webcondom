<?php

namespace WebCondom\Http\Controllers\Condominios;

use Illuminate\Http\Request;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Models\Condominios\Condominio;
use WebCondom\Models\Condominios\Imovel;
use WebCondom\Models\Diversos\Categoria;
use WebCondom\Models\Diversos\TipoImovel;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Enderecos\Endereco;

class ImoveisController extends Controller
{
    public function Listar()
    {
        $imoveis = Imovel::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Imóveis', 'url' => '']
        ]);
        return view('condominios.imoveis.listar', compact('imoveis', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Imóveis', 'url' => route('condominios.imoveis.listar')],
            ['titulo' => 'Cadastrar imóvel', 'url' => '']
        ]);
        $tiposImoveis = TipoImovel::all();
        $categorias = Categoria::all();
        $condominios = Condominio::all();
        $cidades = Cidade::all();
        return view('condominios.imoveis.criar', compact('tiposImoveis','categorias','condominios','cidades','migalhas'));
    }

    public function Salvar(Request $request)
    {
        //----ENDEREÇO DO IMÓVEL---//
        $endereco = new Endereco($request->only(
            'logradouro', 'numero','cep','bairro','cidade_id'
        ));
        $endereco->save();

        $imovel = Imovel::create($request->all());
        $imovel->endereco()->associate($endereco);
        $imovel->save();

        $request->session()->flash('sucesso', 'Imóvel criado com sucesso!');
        return redirect()->route('condominios.imoveis.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Imóveis', 'url' => route('condominios.imoveis.listar')],
            ['titulo' => 'Alterar imóvel', 'url' => '']
        ]);
        $imovel = Imovel::find($id) ? Imovel::find($id) : null;

        if ($imovel) {
            $tiposImoveis = TipoImovel::all();
            $categorias = Categoria::all();
            $condominios = Condominio::all();
            $cidades = Cidade::all();
            return view('condominios.imoveis.exibir', compact('condominios','tiposImoveis','categorias','imovel','cidades','migalhas'));
        } else
            return redirect()->route('condominios.imoveis.criar', 'migalhas');
    }

    public function Alterar(Request $request, $id)
    {
        $imovel = Imovel::find($id);
        $imovel->update($request->all());
        //----ENDEREÇO DO IMÓVEL---//
        $imovel->endereco()->update($request->all());
        //SALVA E SALVA O RELACIONAMENTO TAMBÉM
        $imovel->push();
        $request->session()->flash('info', 'Imóvel alterado com sucesso!');
        return redirect()->route('condominios.imoveis.listar');
    }

    public function Excluir(Request $request, $id)
    {
        Imovel::find($id)->delete();
        $request->session()->flash('warning', 'Imóvel deletado com sucesso!');
        return redirect()->route('condominios.imoveis.listar');
    }
}
