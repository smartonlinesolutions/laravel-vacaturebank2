<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bedrijf extends Model
{
    /** @use HasFactory<\Database\Factories\BedrijfFactory> */
    use HasFactory;

    protected $table = 'bedrijven';

    protected $fillable = [
        'naam', 'plaats', 'website'
    ];

    public function vacatures()
    {
        return $this->hasMany(Vacature::class);
    }
}
