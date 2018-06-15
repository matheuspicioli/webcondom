<?php

namespace WebCondom\Http\Controllers\Diversos;

use Illuminate\Http\Request;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Diversos\TipoImovelRequest;
use WebCondom\Models\Diversos\TipoImovel;

class TipoImovelController extends Controller
{
    public function Listar()
    {
        $tiposImoveis = TipoImovel::all();
        return view('diversos.tiposimoveis.listar', compact('tiposImoveis'));
    }

    public function Criar()
    {
        return view('diversos.tiposimoveis.formulario');
    }

    public function Salvar(TipoImovelRequest $request)
    {
        //dd($request->except('_token'));
        TipoImovel::create($request->all());
        Toast::success('Tipo de imóvel incluído com sucesso!','Inclusão!');
        return redirect()->route('diversos.tiposimoveis.listar');
    }

    public function Exibir($id)
    {
        $tipoImovel = TipoImovel::find($id) ? TipoImovel::find($id) : null;

        if($tipoImovel)
            return view('diversos.tiposimoveis.formulario', compact('tipoImovel'));
        else
            return redirect()->route('diversos.tiposimoveis.formulario');
    }

    public function Alterar(TipoImovelRequest $request, $id)
    {
        //dd($request->except(['_token', '_method']));
        $tipoImovel = TipoImovel::find($id);
        $tipoImovel->update($request->all());
		Toast::success('Tipo de imóvel alterado com sucesso!','Alteração!');
        return redirect()->route('diversos.tiposimoveis.listar');
    }

    public function Excluir($id)
    {
        TipoImovel::find($id)->delete();
		Toast::success('Tipo de imóvel excluído com sucesso!','Exclusão!');
        return redirect()->route('diversos.tiposimoveis.listar');
    }
}
