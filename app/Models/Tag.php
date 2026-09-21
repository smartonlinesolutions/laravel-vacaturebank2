<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['naam'];

    public function vacatures()
    {
        return $this->belongsToMany(Vacature::class);
    }
}
