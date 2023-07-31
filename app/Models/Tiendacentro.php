<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tiendacentro extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey='idtiendacentro';
    protected $table='tiendacentros';
    public $timestamps = false;
    protected $fillable =[
        'centro'
    ];
}

