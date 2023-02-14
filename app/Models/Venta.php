<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['id_codigosocio', 'id_producto','fecha_acuerdo','fecha_contacto','comentario','usuario_id'];
}
