<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stocktienda extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =[
        'producto',
        'tiendacentro',
        'cantidad',
        'promocion',
        'mespromocion'
    ];
    protected $table='stocktiendas';
    public $timestamps = false;
    protected $primaryKey='idstocktienda';
}
