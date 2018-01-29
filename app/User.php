<?php

namespace WebCondom;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use WebCondom\Models\Autorizacao\Permissao;
use WebCondom\Models\Autorizacao\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('WebCondom\Models\Autorizacao\Role');
    }

    public function temPermissao(Permissao $permissao)
    {
        return $this->temAlgumaRole($permissao->roles);
    }

    public function temAlgumaRole($roles)
    {
        if( is_array($roles) or is_object($roles) )
        {
            foreach($roles as $role)
            {
                //dd($this->roles->contains('nome'))
                return $this->roles->contains('nome', $role->nome);
            }
        }

        return $this->roles->contains('nome', $roles);
    }
}
