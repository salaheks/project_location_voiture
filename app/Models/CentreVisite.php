<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CentreVisite extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [
        'id',
    ];

    public function visiteTechniques()
    {
        return $this->hasMany(visiteTechnique::class);
    }
}
