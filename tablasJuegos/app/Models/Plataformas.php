<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plataformas extends Model
{
    protected $fillable = [
        'nombrePlataforma',
    ];
    protected $primaryKey = 'plataformaId';
    protected $table = 'tbl_plataformas';
    
    public function juegos()
    {
        return $this->hasMany(Juegos::class, 'plataformaId');
    }

    
}
