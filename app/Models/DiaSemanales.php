<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaSemanales extends Model
{
     protected $table = 'dia_semanales';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nb_dia_semanales'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'create_at',
    ];
}
