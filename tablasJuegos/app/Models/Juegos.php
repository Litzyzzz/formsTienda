<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juegos extends Model
{
    protected $table = 'tbl_juegos';
    protected $primaryKey = 'juegosId';
    protected $fillable = [
        'titulo',
        'descripcion',
        'precio',
        'cantidad_dispo',
        'imagen',
        'plataformaId',
        'generoId',
        'proveedorId',
    ];
    
        
        
  
    public function plataforma()
    {
        return $this->belongsTo(Plataformas::class, 'plataformaId', 'plataformaId');
    }
    public function genero()
    {
        return $this->belongsTo(Categorias::class, 'generoId', 'categoriaId');
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedorId', 'proveedorId');
    }
}
