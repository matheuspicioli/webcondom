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
        $endereco = new Endereco();
        $endereco->logradouro = $request->input('logradouro');
        $endereco->numero = $request->input('numero');
        $endereco->cep = $request->input('cep');
        $endereco->complemento = $request->input('complemento');
        $endereco->bairro = $request->input('bairro');
        $endereco->cidade_id = $request->input('cidade_id');
        $endereco->save();

        //-----CONDOMINIO-----//
        $condominio = new Condominio();
        $condominio->nome = $request->input('nome');
        $condominio->apelido = $request->input('apelido');
        $condominio->telefone = $request->input('telefone');
        $condominio->celular = $request->input('celular');
        $condominio->unidades = $request->input('unidades');
        $condominio->multa = $request->input('multa');
        $condominio->juros = $request->input('juros');
        $condominio->tipo_juros = $request->input('tipo_juros');
        $condominio->tem_gas = $request->input('tem_gas');
        $condominio->valor_gas = $request->input('valor_gas');
        $condominio->sindico_id = $request->input('sindico_id');
        //Pega o EnderecoID e joga no campo EnderecoCOD
        $condominio->Endereco()->associate($endereco);
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
        $condominio = Condominio::find($id);
        $taxas = $request->input('Taxas');
        //-----CONDOMINIO-----//
        $condominio->nome = $request->input('nome');
        $condominio->apelido = $request->input('apelido');
        $condominio->telefone = $request->input('telefone');
        $condominio->celular = $request->input('celular');
        $condominio->unidades = $request->input('unidades');
        $condominio->multa = $request->input('multa');
        $condominio->juros = $request->input('juros');
        $condominio->tipo_juros = $request->input('tipo_juros');
        $condominio->tem_gas = $request->input('tem_gas');
        $condominio->valor_gas = $request->input('valor_gas');
        $condominio->sindico_id = $request->input('sindico_id');
        //----ENDEREÇO DO CONDOMINIO---//
        $condominio->Endereco->logradouro = $request->input('logradouro');
        $condominio->Endereco->numero = $request->input('numero');
        $condominio->Endereco->cep = $request->input('cep');
        $condominio->Endereco->complemento = $request->input('complemento');
        $condominio->Endereco->bairro = $request->input('bairro');
        $condominio->Endereco->cidade_id = $request->input('cidade_id');
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
