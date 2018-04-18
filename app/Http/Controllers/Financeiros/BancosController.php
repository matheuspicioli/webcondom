<?php

namespace WebCondom\Http\Controllers\Financeiros;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Financeiros\BancoRequest;
use WebCondom\Models\Financeiros\Banco;
use WebCondom\Traits\UploadArquivos;

class BancosController extends Controller
{
	use UploadArquivos;

    public function Listar()
    {
        $bancos = Banco::all();
        return view('financeiros.bancos.listar', compact('bancos'));
    }

    public function Criar()
    {
        return view('financeiros.bancos.criar');
    }

    public function Salvar(BancoRequest $request)
    {
        $banco = Banco::create($request->all());
		//----------UPLOAD LOGO TIPO----------//
		if($request->hasFile('foto')){
			$caminho = $this->salvar_arquivo($request->file('foto'), 'fotos_bancos', md5(now()));
			$banco->foto = $caminho;
			$banco->save();
		}
		Toast::success('Banco incluso com sucesso!','Inclusão!');
        return redirect()->route('financeiros.bancos.listar');
    }

    public function Exibir($id)
    {
        $banco = Banco::find($id) ? Banco::find($id) : null;

        if ($banco) {
            return view('financeiros.bancos.exibir', compact('banco'));
        } else
            return redirect()->route('financeiros.bancos.criar');
    }

    public function Alterar(BancoRequest $request, $id)
    {
        $banco = Banco::find($id);
        if($banco){
            $banco->update($request->all());
			if($request->hasFile('foto')){
				//DELETA O LOGO ANTIGO VERIFICAR SE VAI FICAR ASSIM MESMO
				Storage::disk('public')->delete($banco->foto);
				$caminho = $this->salvar_arquivo($request->file('foto'), 'fotos_bancos', md5(now()));
				$banco->foto = $caminho;
				$banco->save();
			}
			Toast::success('Banco alterado com sucesso!','Alteração!');
            return redirect()->route('financeiros.bancos.listar');
        }
        return redirect()->route('financeiros.bancos.listar');
    }

    public function Excluir($id)
    {
        $banco = Banco::find($id);
        if($banco){
			Storage::disk('public')->delete($banco->foto);
            $banco->delete();
            Toast::success('Banco excluído com sucesso!','Exclusão!');
            return redirect()->route('financeiros.bancos.listar');
        }
    }
}