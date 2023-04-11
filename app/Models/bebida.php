<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bebida extends Model
{
    use HasFactory;

    protected $table = 'bebidas';
    protected $fillable = ['Nombre','Sabor', 'Cantidad',"Calorico","Sabor"];
    protected $casts = [
        'nombre'    =>  'string',
        'Sabor'    =>  'string',
        'Cantidad'  =>  'integer',
        'Calorico'  =>  'decimal:2',
        'Precio'    =>  'decimal:2',
    ];
}
