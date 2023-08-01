<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $fillable=[
        'usuarios',
        'password'
    ];
    protected $table ='usuarios';
    protected $primaryKey='id';
    public $timestamps = false;


}
