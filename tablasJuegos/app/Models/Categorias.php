<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable=[
        'nombre',
    ];
    protected $primaryKey = 'categoriaId';
    protected $table = 'tbl_categorias';

    public function juegos()
    {
        return $this->hasMany(Juegos::class, 'generoId', 'categoriaId');
    }
}
