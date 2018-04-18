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
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Inquilinos', 'url' => route('entidades.inquilinos.listar')],
            ['titulo' => 'Cadastrar inquilino', 'url' => '']
        ]);
        $estados_civis = EstadoCivil::all();
        $regimes_casamentos = RegimeCasamento::all();
        $cidades = Cidade::all();
        return view('entidades.inquilinos.criar', compact('estados_civis', 'regimes_casamentos', 'cidades', 'migalhas'));
    }

    public function Salvar(InquilinoRequest $request)
    {
        $inquilino = Inquilino::create($request->all());
        $entidade = $inquilino->entidade()->create($request->all());
        $enderecoPrincipal = $entidade->endereco_principal()->create([
            'logradouro'    => $request->input('logradouro_principal'),
            'numero'        => $request->input('numero_principal'),
            'cep'           => $request->input('cep_principal'),
            'bairro'        => $request->input('bairro_principal'),
            'cidade_id'     => $request->input('cidade_id_principal'),
        ]);
        $enderecoCobranca = $entidade->endereco_cobranca()->create([
            'logradouro'    => $request->input('logradouro_cobranca'),
            'numero'        => $request->input('numero_cobranca'),
            'cep'           => $request->input('cep_cobranca'),
            'bairro'        => $request->input('bairro_cobranca'),
            'cidade_id'     => $request->input('cidade_id_cobranca'),
        ]);
        $entidade->endereco_principal()->associate($enderecoPrincipal);
        $entidade->endereco_cobranca()->associate($enderecoCobranca);
        $inquilino->entidade()->associate($entidade);
        $entidade->save();
        $inquilino->save();

		Toast::success('Inquilino incluído com sucesso!', 'Inclusão!');
        return redirect()->route('entidades.inquilinos.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Inquilinos', 'url' => route('entidades.inquilinos.listar')],
            ['titulo' => 'Alterar inquilino', 'url' => '']
        ]);
        $inquilino = Inquilino::find($id) ? Inquilino::find($id) : null;

        if ($inquilino) {
            $estados_civis = EstadoCivil::all();
            $regimes_casamentos = RegimeCasamento::all();
            $cidades = Cidade::all();
            return view('entidades.inquilinos.exibir', compact('estados_civis', 'regimes_casamentos', 'inquilino', 'cidades', 'migalhas'));
        } else
            return redirect()->route('entidades.inquilinos.criar', 'migalhas');
    }

    public function Alterar(InquilinoRequest $request, $id)
    {
        $inquilino = Inquilino::find($id);
        $inquilino->update($request->all());
        $inquilino->entidade()->update($request->all());
        //----ENDEREÇO PRINCIPAL---//
        $inquilino->entidade->endereco_principal()->update([
            'logradouro'    => $request->input('logradouro_principal'),
            'numero'        => $request->input('numero_principal'),
            'cep'           => $request->input('cep_principal'),
            'bairro'        => $request->input('bairro_principal'),
            'cidade_id'     => $request->input('cidade_id_principal')
        ]);
        //----ENDEREÇO COBRANÇA---//
        $inquilino->entidade->endereco_cobranca()->update([
            'logradouro'    => $request->input('logradouro_cobranca'),
            'numero'        => $request->input('numero_cobranca'),
            'cep'           => $request->input('cep_cobranca'),
            'bairro'        => $request->input('bairro_cobranca'),
            'cidade_id'     => $request->input('cidade_id_cobranca')
        ]);
        //dd($inquilino->entidade->endereco_cobranca);
        //SALVA E SALVA OS RELACIONAMENTOS TAMBÉM
        $inquilino->push();

        Toast::success('Inquilino alterado com sucesso!', 'Alteração!');
        return redirect()->route('entidades.inquilinos.listar');
    }

    public function Excluir(Request $request, $id)
    {
        Inquilino::find($id)->delete();
		Toast::success('Inquilino excluído com sucesso!', 'Exclusão!');
        return redirect()->route('entidades.inquilinos.listar');
    }
}
