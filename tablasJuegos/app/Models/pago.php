<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pago extends Model
{
    use HasFactory;
    protected $table = 'pagos';
    protected $primaryKey = 'pago_Id';
    protected $fillable = [
        'orden_Id',
        'monto',
        'tarjeta_ultimos'
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class, 'orden_Id');
    }
}
