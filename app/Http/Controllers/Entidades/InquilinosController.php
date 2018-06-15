<?php

namespace WebCondom\Http\Controllers\Entidades;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Entidades\InquilinoRequest;
use WebCondom\Models\Diversos\EstadoCivil;
use WebCondom\Models\Diversos\RegimeCasamento;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Entidades\Inquilino;

class InquilinosController extends Controller
{
    public function Listar()
    {
        $inquilinos = Inquilino::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Inquilinos', 'url' => '']
        ]);
        return view('entidades.inquilinos.listar', compact('inquilinos', 'migalhas'));
    }

    public function Criar()
    {
        $estados_civis = EstadoCivil::all();
        $regimes_casamentos = RegimeCasamento::all();
        $cidades = Cidade::all();
        return view('entidades.inquilinos.formulario', compact('estados_civis', 'regimes_casamentos', 'cidades'));
    }

    public function Salvar(InquilinoRequest $request)
    {
        $inquilino = Inquilino::create($request->all());
        $entidade = $inquilino->entidade()->create($request->all());
        $enderecoPrincipal = $entidade->endereco_principal()->create($request->all());

		if($request->cep_cobranca != null){
			$enderecoCobranca = $entidade->endereco_cobranca()->create([
                'logradouro'    => $request->get('logradouro_cobranca'),
                'complemento'   => $request->get('complemento_cobranca'),
                'numero'        => $request->get('numero_cobranca'),
                'cep'           => $request->get('cep_cobranca'),
                'bairro'        => $request->get('bairro_cobranca'),
                'cidade_id'     => $request->get('cidade_id_cobranca'),
			]);
			$entidade->endereco_cobranca()->associate($enderecoCobranca);
		}
        $entidade->endereco_principal()->associate($enderecoPrincipal);
        $inquilino->entidade()->associate($entidade);
        $entidade->save();
        $inquilino->save();

		Toast::success('Inquilino incluído com sucesso!', 'Inclusão!');
        return redirect()->route('entidades.inquilinos.listar');
    }

    public function Exibir($id)
    {
        $inquilino = Inquilino::find($id) ? Inquilino::find($id) : null;

        if ($inquilino) {
            $estados_civis = EstadoCivil::all();
            $regimes_casamentos = RegimeCasamento::all();
            $cidades = Cidade::all();
            return view('entidades.inquilinos.formulario', compact('estados_civis', 'regimes_casamentos', 'inquilino', 'cidades'));
        } else
            return redirect()->route('entidades.inquilinos.formulario');
    }

    public function Alterar(InquilinoRequest $request, $id)
    {
        $inquilino = Inquilino::find($id);
        $inquilino->update($request->all());
        $inquilino->entidade()->update($request->all());
        //----ENDEREÇO PRINCIPAL---//
        $inquilino->entidade->endereco_principal()->update($request->all());

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
			if ( isset($inquilino->entidade->endereco_cobranca) ) {
				$cobranca = $inquilino->entidade->endereco_cobranca()->update($dados_cobranca);
			} else {
				$cobranca = $inquilino->entidade->endereco_cobranca()->create($dados_cobranca);
			}

			$inquilino->entidade->endereco_cobranca()->associate($cobranca);
			$inquilino->entidade->save();
		}

        Toast::success('Inquilino alterado com sucesso!', 'Alteração!');
        return redirect()->route('entidades.inquilinos.listar');
    }

    public function Excluir($id)
    {
        Inquilino::find($id)->delete();
		Toast::success('Inquilino excluído com sucesso!', 'Exclusão!');
        return redirect()->route('entidades.inquilinos.listar');
    }
}
