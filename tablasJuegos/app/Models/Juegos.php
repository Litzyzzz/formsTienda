<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    // Accesor para la URL de la imagen
    public function getImagenUrlAttribute()
    {
        return $this->imagen ? Storage::url($this->imagen) : asset('images/default-game.png');
    }
    
    // Eliminar imagen al borrar el juego
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($juego) {
            if ($juego->imagen && Storage::disk('public')->exists($juego->imagen)) {
                Storage::disk('public')->delete($juego->imagen);
            }
        });
    }
    
        
        
  
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
