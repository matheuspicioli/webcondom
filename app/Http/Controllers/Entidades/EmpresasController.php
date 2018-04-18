<?php

namespace WebCondom\Http\Controllers\Entidades;

use Illuminate\Support\Facades\Storage;
use Toast;
use WebCondom\Http\Controllers\Controller;
use WebCondom\Http\Requests\Entidades\EmpresaRequest;
use WebCondom\Models\Enderecos\Cidade;
use WebCondom\Models\Entidades\Empresa;
use WebCondom\Traits\UploadArquivos;

class EmpresasController extends Controller
{
    use UploadArquivos;
    
    public function Listar()
    {
        $empresas = Empresa::all();
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Empresas', 'url' => '']
        ]);
        return view('entidades.empresas.listar', compact('empresas', 'migalhas'));
    }

    public function Criar()
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Empresas', 'url' => route('entidades.empresas.listar')],
            ['titulo' => 'Cadastrar empresa', 'url' => '']
        ]);
        $cidades = Cidade::all();
        return view('entidades.empresas.criar', compact('cidades', 'migalhas'));
    }

    public function Salvar(EmpresaRequest $request)
    {
        $empresa = Empresa::create($request->all());
        //----------UPLOAD LOGO TIPO----------//
        if($request->hasFile('logo_imagem')){
            $caminho = $this->salvar_arquivo($request->file('logo_imagem'), 'logos_empresas', md5(now()));
            $empresa->logo = $caminho;
        }
        //----------ENTIDADE----------//
        $entidade = $empresa->entidade()->create($request->all());
        $endereco = $entidade->endereco_principal()->create($request->only(
            'logradouro', 'numero','cep','bairro','cidade_id'
        ));

        $entidade->endereco_principal()->associate($endereco);
        $empresa->entidade()->associate($entidade);
        $entidade->save();
        $empresa->save();

		Toast::success('Empresa incluída com sucesso!', 'Inclusão!');
        return redirect()->route('entidades.empresas.listar');
    }

    public function Exibir($id)
    {
        $migalhas = json_encode([
            ['titulo' => 'Home', 'url' => route('home')],
            ['titulo' => 'Empresas', 'url' => route('entidades.empresas.listar')],
            ['titulo' => 'Alterar empresa', 'url' => '']
        ]);
        $empresa = Empresa::find($id) ? Empresa::find($id) : null;

        if ($empresa) {
            $cidades = Cidade::all();
            return view('entidades.empresas.exibir', compact('empresa', 'cidades', 'migalhas'));
        } else
            return redirect()->route('entidades.empresas.criar', 'migalhas');
    }

    public function Alterar(EmpresaRequest $request, $id)
    {
        $empresa = Empresa::find($id);
        $empresa->update($request->all());
        if($request->hasFile('logo_imagem')){
            //DELETA O LOGO ANTIGO VERIFICAR SE VAI FICAR ASSIM MESMO
            Storage::disk('public')->delete($empresa->logo);
            $caminho = $this->salvar_arquivo($request->file('logo_imagem'), 'logos_empresas', md5(now()));
            $empresa->logo = $caminho;
        }
        $empresa->entidade()->update($request->all());
        //----ENDEREÇO PRINCIPAL---//
        $empresa->entidade->endereco_principal()->update($request->all());
        $empresa->push();

		Toast::success('Empresa alterada com sucesso!', 'Alteração!');
        return redirect()->route('entidades.empresas.listar');
    }

    public function Excluir($id)
    {
        $empresa = Empresa::find($id);
        if($empresa){
			Storage::disk('public')->delete($empresa->foto);
			$empresa->delete();
			Toast::success('Empresa excluída com sucesso!', 'Exclusão!');
			return redirect()->route('entidades.empresas.listar');
		}
		Toast::error('Erro ao encontrar empresa!', 'Erro!');
		return redirect()->route('entidades.empresas.listar');
    }
}
