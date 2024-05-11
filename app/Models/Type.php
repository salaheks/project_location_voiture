<?php

namespace App\Models; // Updated namespace according to Laravel 10 conventions

use Illuminate\Database\Eloquent\Factories\HasFactory; // Laravel 10 uses class-based factories
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Voiture;

class Type extends Model
{
    use SoftDeletes, HasFactory; // Use HasFactory trait for Laravel 10

    protected $fillable = [
        'company_id', 'marque', 'model', 'transmission', 'carburant', 'prix', 'image'
    ];

    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }
}
