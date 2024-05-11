<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voiture extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [
        'id',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function creditPaiements()
    {
        return $this->hasMany(CreditPaiement::class, 'voiture_id');
    }

    public function visiteTechniques()
    {
        return $this->hasMany(visiteTechnique::class);
    }

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    public function assurances()
    {
        return $this->hasMany(Assurance::class);
    }

    public function vignettes()
    {
        return $this->hasMany(Vignettes::class);
    }

    public function vidanges()
    {
        return $this->hasMany(Vidange::class);
    }

    public function autorisations()
    {
        return $this->hasMany(CirculationAutorisation::class);
    }

    public function voitureHistoriques()
    {
        return $this->hasMany(VoitureHistorique::class);
    }
}
