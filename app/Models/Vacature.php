<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacature extends Model
{
    /** @use HasFactory<\Database\Factories\VacatureFactory> */
    use HasFactory;

    protected $fillable = [ 
        'titel', 'omschrijving', 'salaris', 'fulltime', 'bedrijf_id', 'user_id'
    ];
    
    public function bedrijf() {
        return $this->belongsTo(Bedrijf::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
