<?php

namespace WebCondom\Http\Controllers;

use Illuminate\Http\Request;
use WebCondom\Models\Autorizacao\Permissao;
use WebCondom\Models\Autorizacao\Role;

class DebugController extends Controller
{
    public function debug(Role $role, Permissao $permissao)
    {
        $var = \Auth::user();
        return view('debug.debug', compact('var'));
    }
}
