<?php

namespace WebCondom\Http\Controllers\Entidades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Entidades\FuncionarioRequest;
use WebCondom\Models\Diversos\Departamento;
use WebCondom\Models\Diversos\EstadoCivil;
use WebCondom\Models\Diversos\RegimeCasamento;
use WebCondom\Models\Diversos\Setor;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Entidades\Funcionario;
use WebCondom\Traits\UploadArquivos;

class FuncionariosController extends Controller
{
	use UploadArquivos;

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
        $estados_civis = EstadoCivil::all();
        $regimes_casamentos = RegimeCasamento::all();
        $cidades = Cidade::all();
        $setores = Setor::all();
        $departamentos = Departamento::all();
        return view('entidades.funcionarios.formulario', compact(
                'estados_civis', 'regimes_casamentos', 'cidades', 'setores', 'departamentos'
            )
        );
    }

    public function Salvar(FuncionarioRequest $request)
    {
        $funcionario = Funcionario::create($request->all());
		//----------UPLOAD LOGO TIPO----------//
		if($request->hasFile('foto')){
			$caminho = $this->salvar_arquivo($request->file('foto'), 'fotos_funcionarios', md5(now()));
			$funcionario->foto = $caminho;
		}
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
        $funcionario = Funcionario::find($id) ? Funcionario::find($id) : null;

        if ($funcionario) {
            $departamentos = Departamento::all();
            $setores = Setor::all();
            $estados_civis = EstadoCivil::all();
            $regimes_casamentos = RegimeCasamento::all();
            $cidades = Cidade::all();
            return view('entidades.funcionarios.formulario', compact(
                    'estados_civis', 'regimes_casamentos', 'funcionario', 'cidades', 'setores', 'departamentos'
                )
            );
        } else
            return redirect()->route('entidades.funcionarios.formulario', 'migalhas');
    }

    public function Alterar(FuncionarioRequest $request, $id)
    {
        $funcionario = Funcionario::find($id);
        $funcionario->update($request->all());
		if($request->hasFile('foto')){
			//DELETA O LOGO ANTIGO VERIFICAR SE VAI FICAR ASSIM MESMO
			Storage::disk('public')->delete($funcionario->logo);
			$caminho = $this->salvar_arquivo($request->file('foto'), 'fotos_funcionarios', md5(now()));
			$funcionario->foto = $caminho;
		}
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

    public function Excluir($id)
    {
        $funcionario = Funcionario::find($id);
        if($funcionario) {
            Storage::disk('public')->delete($funcionario->foto);
            $funcionario->delete();
            Toast::success('Funcionário excluído com sucesso!', 'Exclusão!');
            return redirect()->route('entidades.funcionarios.listar');
        }
    }
}