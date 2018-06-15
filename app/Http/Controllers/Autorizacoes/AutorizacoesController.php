<?php
/**
 * Created by PhpStorm.
 * User: matheus
 * Date: 24/01/18
 * Time: 20:10
 */

namespace WebCondom\Http\Controllers\Autorizacoes;

use Illuminate\Http\Request;
use WebCondom\Models\Autorizacao\Permissao;
use WebCondom\Models\Autorizacao\Role;
use WebCondom\Http\Controllers\Controller;
use WebCondom\User;

class AutorizacoesController extends Controller
{
    public function listar()
    {
        $roles          = Role::all();
        $permissoes     = Permissao::all();
        $usuarios       = User::all();
        return view('autorizacoes.criar', compact('roles', 'permissoes', 'usuarios'));
    }

    public function salvar_permissao(Request $request)
    {
        Permissao::create($request->all());
        return redirect()->route('autorizacoes.listar');
    }

    public function salvar_role(Request $request)
    {
        Role::create($request->all());
        return redirect()->route('autorizacoes.listar');
    }

    public function salvar_role_permissao_associar(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->permissoes()->attach($request->permissoes);
        $role->save();
        return redirect()->route('autorizacoes.listar');
    }

    public function salvar_role_usuario_associar(Request $request)
    {
        $usuario = User::find($request->user_id);
        $usuario->roles()->attach($request->perfis);
        $usuario->save();
        return redirect()->route('autorizacoes.listar');
    }
}