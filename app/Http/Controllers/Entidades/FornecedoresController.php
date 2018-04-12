<?php

namespace WebCondom\Http\Controllers\Entidades;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Entidades\FornecedorRequest;
use WebCondom\Models\Diversos\EstadoCivil;
use WebCondom\Models\Diversos\RegimeCasamento;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Entidades\Fornecedor;

class FornecedoresController extends Controller
{
    public function Listar()
    {
        $fornecedores = Fornecedor::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Fornecedores', 'url' => '']
        ]);
        return view('entidades.fornecedores.listar', compact('fornecedores', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Fornecedores', 'url' => route('entidades.fornecedores.listar')],
            ['titulo' => 'Cadastrar fornecedor', 'url' => '']
        ]);
        $estados_civis = EstadoCivil::all();
        $regimes_casamentos = RegimeCasamento::all();
        $cidades = Cidade::all();
        return view('entidades.fornecedores.criar', compact('estados_civis', 'regimes_casamentos', 'cidades', 'migalhas'));
    }

    public function Salvar(FornecedorRequest $request)
    {
        $fornecedor = Fornecedor::create($request->all());
        $entidade = $fornecedor->entidade()->create($request->all());
        $enderecoPrincipal = $entidade->endereco_principal()->create($request->only(
            'logradouro', 'numero', 'cep', 'complemento', 'bairro', 'cidade_id'
            ));
        $entidade->endereco_principal()->associate($enderecoPrincipal);
        $fornecedor->entidade()->associate($entidade);
        $entidade->save();
        $fornecedor->save();
		Toast::success('Fornecedor incluído com sucesso!','Inclusão!');
        return redirect()->route('entidades.fornecedores.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Fornecedores', 'url' => route('entidades.fornecedores.listar')],
            ['titulo' => 'Alterar fornecedor', 'url' => '']
        ]);
        $fornecedor = Fornecedor::find($id) ? Fornecedor::find($id) : null;

        if ($fornecedor) {
            $estados_civis = EstadoCivil::all();
            $regimes_casamentos = RegimeCasamento::all();
            $cidades = Cidade::all();
            return view('entidades.fornecedores.exibir', compact('estados_civis', 'regimes_casamentos', 'fornecedor', 'cidades', 'migalhas'));
        } else
            return redirect()->route('entidades.fornecedores.criar', 'migalhas');
    }

    public function Alterar(FornecedorRequest $request, $id)
    {
        $fornecedor = Fornecedor::find($id);
        $fornecedor->update($request->all());
        $fornecedor->entidade()->update($request->all());
        //----ENDEREÇO PRINCIPAL---//
        $fornecedor->entidade->endereco_principal()->update($request->only(
            'logradouro', 'numero', 'cep', 'complemento', 'bairro', 'cidade_id'
        ));
        //SALVA E SALVA OS RELACIONAMENTOS TAMBÉM
        $fornecedor->push();

		Toast::success('Fornecedor alterado com sucesso!','Alteração!');
        return redirect()->route('entidades.fornecedores.listar');
    }

    public function Excluir($id)
    {
        Fornecedor::find($id)->delete();
		Toast::success('Fornecedor excluído com sucesso!','Exclusão!');
        return redirect()->route('entidades.fornecedores.listar');
    }
}
