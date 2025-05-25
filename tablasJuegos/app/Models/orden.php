<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
    protected $table = 'ordenes';
    protected $primaryKey = 'orden_Id';
    protected $fillable = ['usuario_Id', 'total'];

    public function pedidos()
    {
        return $this->hasMany(pedido::class, 'orden_Id');
    }

    public function pago()
    {
        return $this->hasOne(pago::class, 'orden_Id');
    }


   public function usuario() 
   {
       return $this->belongsTo(usuario::class, 'usuario_Id');
   }
}
