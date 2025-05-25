<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable; 

class usuario extends Authenticatable
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_Id';   


    protected $fillable = [
        'nombre',
        'email',
        'password',
        'rol_Id',
    ];

    public function rol()
{
    return $this->belongsTo(rol::class, 'rol_Id'); 
}

    public function ordenes() 
    {
        return $this->hasMany(orden::class, 'usuario_Id');
    }
}
