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
        return view('entidades.proprietarios.criar', compact('estados_civis', 'regimes_casamentos', 'cidades', 'migalhas'));
    }

    public function Salvar(ProprietarioRequest $request)
    {
		dd($request->all());
        $proprietario = Proprietario::create($request->all());
        $entidade = $proprietario->entidade()->create($request->all());
        $enderecoPrincipal = $entidade->endereco_principal()->create([
            'logradouro'    => $request->logradouro_principal,
            'complemento'   => $request->complemento_principal,
            'numero'        => $request->numero_principal,
            'cep'           => $request->cep_principal,
            'bairro'        => $request->bairro_principal,
            'cidade_id'     => $request->cidade_id_principal,
        ]);
        $enderecoCobranca = $entidade->endereco_cobranca()->create([
            'logradouro'    => $request->logradouro_cobranca,
            'complemento'   => $request->complemento_cobranca,
            'numero'        => $request->numero_cobranca,
            'cep'           => $request->cep_cobranca,
            'bairro'        => $request->bairro_cobranca,
            'cidade_id'     => $request->cidade_id_cobranca,
        ]);
        $entidade->endereco_principal()->associate($enderecoPrincipal);
        $entidade->endereco_cobranca()->associate($enderecoCobranca);
        $proprietario->entidade()->associate($entidade);
        $entidade->save();
        $proprietario->save();

		Toast::success('Proprietário incluso com sucesso!', 'Inclusão!');
        return redirect()->route('entidades.proprietarios.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Proprietários', 'url' => route('entidades.proprietarios.listar')],
            ['titulo' => 'Alterar proprietario', 'url' => '']
        ]);
        $proprietario = Proprietario::find($id) ? Proprietario::find($id) : null;

        if ($proprietario) {
            $estados_civis = EstadoCivil::all();
            $regimes_casamentos = RegimeCasamento::all();
            $cidades = Cidade::all();
            return view('entidades.proprietarios.exibir', compact('estados_civis', 'regimes_casamentos', 'proprietario', 'cidades', 'migalhas'));
        } else
            return redirect()->route('entidades.proprietarios.criar', 'migalhas');
    }

    public function Alterar(ProprietarioRequest $request, $id)
    {
        $proprietario = Proprietario::find($id);
        $proprietario->update($request->all());
        $proprietario->entidade()->update($request->all());
        //----ENDEREÇO PRINCIPAL---//
        $proprietario->entidade->endereco_principal()->update([
            'logradouro'    => $request->input('logradouro_principal'),
            'numero'        => $request->input('numero_principal'),
            'cep'           => $request->input('cep_principal'),
            'complemento'	=> $request->input('complemento_principal'),
            'bairro'        => $request->input('bairro_principal'),
            'cidade_id'     => $request->input('cidade_id_principal')
        ]);

        //----ENDEREÇO COBRANÇA---//
        $proprietario->entidade->endereco_cobranca()->update([
            'logradouro'    => $request->input('logradouro_cobranca'),
            'numero'        => $request->input('numero_cobranca'),
            'cep'           => $request->input('cep_cobranca'),
			'complemento'	=> $request->input('complemento_cobranca'),
            'bairro'        => $request->input('bairro_cobranca'),
            'cidade_id'     => $request->input('cidade_id_cobranca')
        ]);
        //dd($proprietario->entidade->endereco_cobranca);
        //SALVA E SALVA OS RELACIONAMENTOS TAMBÉM
        $proprietario->push();

		Toast::success('Proprietário alterado com sucesso!', 'Alteração!');
        return redirect()->route('entidades.proprietarios.listar');
    }

    public function Excluir($id)
    {
        Proprietario::find($id)->delete();
		Toast::success('Proprietário excluído com sucesso!', 'Exclusão!');
        return redirect()->route('entidades.proprietarios.listar');
    }
}
