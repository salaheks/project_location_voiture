<?php

namespace App\Services;

use App\Models\Assurance;
use App\Models\Assureur;
use App\Models\Voiture;

class AssuranceService
{
    public function index()
    {
        $assurances = Assurance::whereHas('voiture', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        })->get();
        $pageTitle = "Assurances";
        return ['assurances' => $assurances, 'pageTitle' => $pageTitle];
    }

    public function create($id)
    {
        $pageTitle = 'Ajouter Assurance';
        if ($id) {
            $voitures = Voiture::findOrFail($id);
        } else {
            $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
            $assuseurs = Assureur::where('company_id', auth()->user()->company_id)->get();
        }
        return compact('pageTitle', 'voitures','assuseurs');
    }

    public function store($request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['company_id'] = auth()->user()->company_id;
        $assurance = new Assurance($validated);
        if ($assurance->save()) {
            return true;
        }
        return false;
    }

    public function edit()
    {
        $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Modifier Assurance';
        $assuseurs = Assureur::where('company_id', auth()->user()->company_id)->get();
        return ['pageTitle' =>  $pageTitle, 'voitures' => $voitures, 'assuseurs' => $assuseurs];
    }

    public function update($request, $assurance)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        if ($assurance->update($validated)) {
            return true;
        }
        return false;
    }

    public function destroy($assurance)
    {
        if ($assurance->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function voitureAssurance($voiture)
    {
        $lastAssurance = Assurance::where('voiture_id', $voiture->id)->orderBy('date_fin', 'desc')->first();
        if ($lastAssurance) {
            return $lastAssurance;
        }else{
            return false;
        }
    }
}
