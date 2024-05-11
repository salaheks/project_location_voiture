<?php

namespace App\Services;

use App\Models\CirculationAutorisation;
use App\Models\Voiture;

class AutorisationService
{
    public function index()
    {
        $autorisations = CirculationAutorisation::whereHas('voiture', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        })->get();
        $pageTitle = "Autorisations de circulation";
        return ['autorisations' => $autorisations, 'pageTitle' => $pageTitle];
    }

    public function create($id)
    {
        if ($id) {
            $voitures = Voiture::findOrFail($id);
        } else {
            $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        }
        $pageTitle = "Ajouter autorisations";
        return ['pageTitle' => $pageTitle, 'voitures' => $voitures];
    }

    public function store($request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['company_id'] = auth()->user()->company_id;
        $autorisation = new CirculationAutorisation($validated);
        if ($autorisation->save()) {
            return true;
        }
        return false;
    }

    public function edit()
    {
        $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Modifier autorisation';
        return ['pageTitle'=>  $pageTitle, 'voitures' => $voitures];
    }

    public function update($request, $autorisation)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        if ($autorisation->update($validated)) {
            return true;
        }
        return false;
    }

    public function destroy($autorisation)
    {
        if($autorisation->delete()) {
            return true;
        }
        else{
            return false;
        }
    }

    public function voitureAutorisation($voiture)
    {
        $lastAutorisation = CirculationAutorisation::where('voiture_id', $voiture->id)->orderBy('date_fin', 'desc')->first();
        if ($lastAutorisation) {
            return $lastAutorisation;
        }else{
            return false;
        }
    }
}
