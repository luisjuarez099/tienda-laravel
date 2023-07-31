<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Catalogo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='catalogoproductos';
    protected $primaryKey='catalogoproducto';
    public $timestamps = false;//uodated_at y created_at

    protected $fillable=[
        'nombre',
        'descripcion',
        'costo',
        'precio',
        'proveedor',
        'tipoProducto',
    ];

    //conexion de llave foranea proveedor que esta asociada en categoriaproductos

}
