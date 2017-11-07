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
        return view('condominios.condominios.listar', compact('condominios'));
    }

    public function Criar()
    {
        $sindicos = Sindico::all();
        $cidades = Cidade::all();
        return view('condominios.condominios.criar', compact('sindicos', 'cidades'));
    }

    public function Salvar(Request $request)
    {
        //dd($request->except('_token'));
        //----ENDEREÇO DO CONDOMINIO---//
        $endereco = new Endereco();
        $endereco->Logradouro = $request->input('Logradouro');
        $endereco->Numero = $request->input('Numero');
        $endereco->CEP = $request->input('CEP');
        $endereco->Complemento = $request->input('Complemento');
        $endereco->Bairro = $request->input('Bairro');
        $endereco->CidadeCOD = $request->input('CidadeCOD');
        $endereco->save();

        //-----CONDOMINIO-----//
        $condominio = new Condominio();
        $condominio->Nome = $request->input('Nome');
        $condominio->Apelido = $request->input('Apelido');
        $condominio->Telefone = $request->input('Telefone');
        $condominio->Celular = $request->input('Celular');
        $condominio->Unidades = $request->input('Unidades');
        $condominio->Multa = $request->input('Multa');
        $condominio->Juros = $request->input('Juros');
        $condominio->TipoJuros = $request->input('TipoJuros');
        $condominio->TemGas = $request->input('TemGas');
        $condominio->ValorGas = $request->input('ValorGas');
        $condominio->SindicoCOD = $request->input('SindicoCOD');
        //Pega o EnderecoID e joga no campo EnderecoCOD
        $condominio->Endereco()->associate($endereco);
        $condominio->save();

        return redirect()->route('condominios.condominios.listar');
    }

    public function Exibir($id)
    {
        $condominio = Condominio::find($id) ? Condominio::find($id) : null;

        if ($condominio) {
            $taxas = $condominio->Taxas;
            $sindicos = Sindico::all();
            $cidades = Cidade::all();
            return view('condominios.condominios.exibir', compact('condominio', 'sindicos', 'cidades', 'taxas'));
        } else
            return redirect()->route('condominios.condominios.criar');
    }

    public function Alterar(Request $request, $id)
    {
        $condominio = Condominio::find($id);
        $taxas = $request->input('Taxas');
        //-----CONDOMINIO-----//
        $condominio->Nome = $request->input('Nome');
        $condominio->Apelido = $request->input('Apelido');
        $condominio->Telefone = $request->input('Telefone');
        $condominio->Celular = $request->input('Celular');
        $condominio->Unidades = $request->input('Unidades');
        $condominio->Multa = $request->input('Multa');
        $condominio->Juros = $request->input('Juros');
        $condominio->TipoJuros = $request->input('TipoJuros');
        $condominio->TemGas = $request->input('TemGas');
        $condominio->ValorGas = $request->input('ValorGas');
        $condominio->SindicoCOD = $request->input('SindicoCOD');
        //----ENDEREÇO DO CONDOMINIO---//
        $condominio->Endereco->Logradouro = $request->input('Logradouro');
        $condominio->Endereco->Numero = $request->input('Numero');
        $condominio->Endereco->CEP = $request->input('CEP');
        $condominio->Endereco->Complemento = $request->input('Complemento');
        $condominio->Endereco->Bairro = $request->input('Bairro');
        $condominio->Endereco->CidadeCOD = $request->input('CidadeCOD');
        //SALVA E SALVA O RELACIONAMENTO TAMBÉM
        $condominio->push();

        return redirect()->route('condominios.condominios.listar');
    }

    public function Excluir($id)
    {
        Condominio::find($id)->delete();
        return redirect()->route('condominios.condominios.listar');
    }
}
