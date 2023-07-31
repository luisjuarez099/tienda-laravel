<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey='idproveedores';

    protected $table='proveedores';
    public $timestamps = false;
    protected $fillable=[
        'razonsocial',
        'rfc',
        'tipopersona',
        'situacionFiscal',
        'activo',
        'calle',
        'numext',
        'numint',
        'cp',
        'colonia',
        'municipio',
        'pais',
        'estado',

    ];
}
