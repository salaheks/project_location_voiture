<?php

namespace App\Services;

use App\Models\Assurance;
use App\Models\Vidange;
use App\Models\Vignettes;

class VoitureService
{
    public function assurances($voiture)
    {
        $pageTitle = 'Assurance de ' . $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->type->transmission . ' ' . $voiture->type->carburant;
        $assurances = Assurance::where('voiture_id', $voiture->id)->get();
        $id = $voiture->id;
        return ['assurances' => $assurances, 'pageTitle' => $pageTitle, 'id' => $id];
    }

    public function vignettes($voiture)
    {
        $pageTitle = 'Vignette de ' . $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->type->transmission . ' ' . $voiture->type->carburant;
        $vignettes = Vignettes::where('voiture_id', $voiture->id)->get();
        $id = $voiture->id;
        return ['vignettes' => $vignettes, 'pageTitle' => $pageTitle, 'id' => $id];
    }

    public function vidanges($voiture)
    {
        $pageTitle = 'vidange de ' . $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->type->transmission . ' ' . $voiture->type->carburant;
        $vidanges = Vidange::where('voiture_id', $voiture->id)->get();
        $id = $voiture->id;
        return ['vidanges' => $vidanges, 'pageTitle' => $pageTitle, 'id' => $id];
    }
}
