<?php

namespace WebCondom\Models\Autorizacao;

use Illuminate\Database\Eloquent\Model;
use WebCondom\User;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = [ 'nome', 'descricao' ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }
}
