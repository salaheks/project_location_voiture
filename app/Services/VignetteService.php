<?php

namespace App\Services;

use App\Models\Vignettes;
use App\Models\Voiture;

class VignetteService
{
    public function index()
    {
        $vignettes = Vignettes::whereHas('voiture', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        })->get();
        $pageTitle = "Vignettes";
        return ['vignettes' => $vignettes, 'pageTitle' => $pageTitle];
    }

    public function create($id)
    {
        if ($id) {
            $voitures = Voiture::findOrFail($id);
        } else {
            $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        }
        $pageTitle = "Ajouter Vignette";
        return ['pageTitle' => $pageTitle, 'voitures' => $voitures];
    }

    public function store($request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['company_id'] = auth()->user()->company_id;
        $vignette = new Vignettes($validated);
        if ($vignette->save()) {
            return true;
        }
        return false;
    }

    public function edit(){
        $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Modifier Vignette';
        return ['pageTitle'=>  $pageTitle, 'voitures' => $voitures];
    }

    public function update($request, $vignette){
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        if ($vignette->update($validated)) {
            return true;
        }
        return false;
    }

    public function destroy($vignette){
        if($vignette->delete()) {
            return true;
        }
        else{
            return false;
        }
    }

    public function voitureVignette($voiture)
    {
        $lastVignette = Vignettes::where('voiture_id', $voiture->id)->orderBy('date_paiement', 'desc')->first();
        if ($lastVignette) {
            return $lastVignette;
        }else{
            return false;
        }
    }
}
