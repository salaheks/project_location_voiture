<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CirculationAutorisation extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [
        'id',
    ];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
}
