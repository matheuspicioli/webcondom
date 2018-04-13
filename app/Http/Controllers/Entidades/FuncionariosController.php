<?php

namespace WebCondom\Http\Controllers\Entidades;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Entidades\FuncionarioRequest;
use WebCondom\Models\Diversos\Departamento;
use WebCondom\Models\Diversos\EstadoCivil;
use WebCondom\Models\Diversos\RegimeCasamento;
use WebCondom\Models\Diversos\Setor;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Entidades\Funcionario;

class FuncionariosController extends Controller
{
    public function Listar()
    {
        $funcionarios = Funcionario::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Funcionarios', 'url' => '']
        ]);
        return view('entidades.funcionarios.listar', compact('funcionarios', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Funcionarios', 'url' => route('entidades.funcionarios.listar')],
            ['titulo' => 'Cadastrar funcionario', 'url' => '']
        ]);
        $estados_civis = EstadoCivil::all();
        $regimes_casamentos = RegimeCasamento::all();
        $cidades = Cidade::all();
        $setores = Setor::all();
        $departamentos = Departamento::all();
        return view('entidades.funcionarios.criar', compact(
                'estados_civis', 'regimes_casamentos', 'cidades', 'migalhas', 'setores', 'departamentos'
            )
        );
    }

    public function Salvar(FuncionarioRequest $request)
    {
        $funcionario = Funcionario::create($request->all());
        $entidade = $funcionario->entidade()->create($request->all());
        $enderecoPrincipal = $entidade->endereco_principal()->create($request->only(
            'logradouro', 'numero', 'cep', 'complemento', 'bairro', 'cidade_id'
        ));
        $entidade->endereco_principal()->associate($enderecoPrincipal);
        $funcionario->entidade()->associate($entidade);
        $entidade->save();
        $funcionario->save();

		Toast::success('Funcionário incluído com sucesso!','Inclusão!');
        return redirect()->route('entidades.funcionarios.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Funcionário', 'url' => route('entidades.funcionarios.listar')],
            ['titulo' => 'Alterar funcionario', 'url' => '']
        ]);
        $funcionario = Funcionario::find($id) ? Funcionario::find($id) : null;

        if ($funcionario) {
            $departamentos = Departamento::all();
            $setores = Setor::all();
            $estados_civis = EstadoCivil::all();
            $regimes_casamentos = RegimeCasamento::all();
            $cidades = Cidade::all();
            return view('entidades.funcionarios.exibir', compact(
                    'estados_civis', 'regimes_casamentos', 'funcionario', 'cidades', 'migalhas', 'setores', 'departamentos'
                )
            );
        } else
            return redirect()->route('entidades.funcionarios.criar', 'migalhas');
    }

    public function Alterar(FuncionarioRequest $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());
        $funcionario->entidade()->update($request->all());
        //----ENDEREÇO PRINCIPAL---//
        $funcionario->entidade->endereco_principal()->update($request->only(
            'logradouro', 'numero', 'cep', 'complemento', 'bairro', 'cidade_id'
        ));
        //SALVA E SALVA OS RELACIONAMENTOS TAMBÉM
        $funcionario->push();

		Toast::success('Funcionário alterado com sucesso!','Alteração!');
        return redirect()->route('entidades.funcionarios.listar');
    }

    public function Excluir(Request $request, $id)
    {
        Funcionario::find($id)->delete();
		Toast::error('Funcionário excluído com sucesso!','Exclusão!');
        return redirect()->route('entidades.funcionarios.listar');
    }
}