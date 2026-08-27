<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacature extends Model
{
    /** @use HasFactory<\Database\Factories\VacatureFactory> */
    use HasFactory;

    protected $fillable = [ 
        'titel', 'bedrijf', 'plaats', 'omschrijving', 'salaris', 'fulltime'
    ];
}
