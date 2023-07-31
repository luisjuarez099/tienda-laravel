<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tipoproducto extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey='idtipodeproducto';
    protected $table='tipodeproducto';
    public $timestamps = false;
    protected $fillable =[
        'tipo'
    ];
}
