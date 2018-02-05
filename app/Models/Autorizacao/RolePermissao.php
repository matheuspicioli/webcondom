<?php

namespace WebCondom\Models\Autorizacao;

use Illuminate\Database\Eloquent\Model;

class RolePermissao extends Model
{
    protected $table = 'permissao_role';
    protected $fillable = [ 'permissao_id', 'role_id' ];

    public function roles()
    {
        return $this->hasMany(Role::class);
    }

    public function permissoes()
    {
        return $this->hasMany(Permissao::class);
    }
}
