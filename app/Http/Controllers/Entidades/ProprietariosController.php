<?php

namespace WebCondom\Http\Controllers\Entidades;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Entidades\ProprietarioRequest;
use WebCondom\Models\Diversos\EstadoCivil;
use WebCondom\Models\Diversos\RegimeCasamento;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Enderecos\Endereco;
use WebCondom\Models\Entidades\Proprietario;

class ProprietariosController extends Controller
{
    public function Listar()
    {
        $proprietarios = Proprietario::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Proprietários', 'url' => '']
        ]);
        return view('entidades.proprietarios.listar', compact('proprietarios', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Proprietários', 'url' => route('entidades.proprietarios.listar')],
            ['titulo' => 'Cadastrar proprietario', 'url' => '']
        ]);
        $estados_civis = EstadoCivil::all();
        $regimes_casamentos = RegimeCasamento::all();
        $cidades = Cidade::all();
        return view('entidades.proprietarios.formulario', compact('estados_civis', 'regimes_casamentos', 'cidades', 'migalhas'));
    }

    public function Salvar(ProprietarioRequest $request)
    {
        $proprietario = Proprietario::create($request->all());
        $entidade = $proprietario->entidade()->create($request->all());
        $enderecoPrincipal = $entidade->endereco_principal()->create([
            'logradouro'    => $request->logradouro,
            'complemento'   => $request->complemento,
            'numero'        => $request->numero,
            'cep'           => $request->cep,
            'bairro'        => $request->bairro,
            'cidade_id'     => $request->cidade_id,
        ]);

        if($request->cep_cobranca != null){
			$enderecoCobranca = $entidade->endereco_cobranca()->create([
				'logradouro'    => $request->logradouro_cobranca,
				'complemento'   => $request->complemento_cobranca,
				'numero'        => $request->numero_cobranca,
				'cep'           => $request->cep_cobranca,
				'bairro'        => $request->bairro_cobranca,
				'cidade_id'     => $request->cidade_id_cobranca,
			]);
			$entidade->endereco_cobranca()->associate($enderecoCobranca);
		}
        $entidade->endereco_principal()->associate($enderecoPrincipal);
        $proprietario->entidade()->associate($entidade);
        $entidade->save();
        $proprietario->save();

		Toast::success('Proprietário incluído com sucesso!', 'Inclusão!');
        return redirect()->route('entidades.proprietarios.listar');
    }

    public function Exibir($id)
    {
        $proprietario = Proprietario::find($id) ? Proprietario::find($id) : null;

        if ($proprietario) {
            $estados_civis = EstadoCivil::all();
            $regimes_casamentos = RegimeCasamento::all();
            $cidades = Cidade::all();
            return view('entidades.proprietarios.formulario', compact('estados_civis', 'regimes_casamentos', 'proprietario', 'cidades', 'migalhas'));
        } else
            return redirect()->route('entidades.proprietarios.formulario', 'migalhas');
    }

    public function Alterar(ProprietarioRequest $request, $id)
    {
        $proprietario = Proprietario::find($id);
        $proprietario->update($request->all());
        $proprietario->entidade()->update($request->all());
        //----ENDEREÇO PRINCIPAL---//
        $proprietario->entidade->endereco_principal()->update($request->all());

		if($request->get('cep_cobranca') != null) {
			$dados_cobranca = [
				'logradouro'    => $request->get('logradouro_cobranca'),
				'numero'        => $request->get('numero_cobranca'),
				'cep'           => $request->get('cep_cobranca'),
				'complemento'	=> $request->get('complemento_cobranca'),
				'bairro'        => $request->get('bairro_cobranca'),
				'cidade_id'     => $request->get('cidade_id_cobranca')
			];
			//----ENDEREÇO COBRANÇA---//
			if ( isset($proprietario->entidade->endereco_cobranca) ) {
				$cobranca = $proprietario->entidade->endereco_cobranca()->update($dados_cobranca);
			} else {
				$cobranca = $proprietario->entidade->endereco_cobranca()->create($dados_cobranca);
			}

			$proprietario->entidade->endereco_cobranca()->associate($cobranca);
			$proprietario->entidade->save();
		}

		Toast::success('Proprietário alterado com sucesso!', 'Alteração!');
        return redirect()->route('entidades.proprietarios.listar');
    }

    public function Excluir($id)
    {
        Proprietario::find($id)->delete();
		Toast::success('Proprietário excluído com sucesso!', 'Exclusão!');
        return redirect()->route('entidades.proprietarios.listar');
    }

    public function GetProprietario($id)
	{
		$proprietario = Proprietario::find($id);
		if ( isset($proprietario->entidade) ) {
			return $proprietario->entidade;
		}
	}
}
