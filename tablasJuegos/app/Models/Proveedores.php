<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $fillable = [
        'nombre',
        'direcciom',
        'telefono',
        'correo',
        
    ];
    protected $primaryKey = 'proveedorId';
    protected $table = 'tbl_proveedores';

    public function juegos()
    {
        return $this->hasMany(Juegos::class, 'proveedorId');
    }

    
}
