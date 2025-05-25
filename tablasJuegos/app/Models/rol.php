<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'rol_Id';


    protected $fillable = [
        'nombrerol',
    ];

    public function usuarios()
    {
        return $this->hasMany(usuario::class, 'usuario_Id');
    }
}
