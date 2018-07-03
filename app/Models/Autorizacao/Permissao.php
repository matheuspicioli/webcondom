<?php

namespace WebCondom\Models\Autorizacao;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    protected $table = 'permissoes';
    protected $fillable = [ 'nome', 'descricao' ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permissao_role');
    }
}
