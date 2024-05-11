<?php

namespace App\Services;

use App\Models\Vidange;
use App\Models\Voiture;
use App\Models\VoitureHistorique;

class VidangeService
{
    public function index()
    {
        $vidanges = Vidange::whereHas('voiture', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        })->get();
        $pageTitle = "Vidanges";
        return ['vidanges' => $vidanges, 'pageTitle' => $pageTitle];
    }

    public function create($id)
    {
        if ($id) {
            $voitures = Voiture::findOrFail($id);
        } else {
            $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        }
        $pageTitle = "Ajouter Vidanges";
        return ['pageTitle' => $pageTitle, 'voitures' => $voitures];
    }

    public function store($request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['company_id'] = auth()->user()->company_id;
        $vidange = new Vidange($validated);
        if ($vidange->save()) {
            $data['km'] = $validated['km_debut'];
            $data['date'] = $validated['date_changement'];
            $data['voiture_id'] = $validated['voiture_id'];
            $historique = new VoitureHistorique($data);
            if ($historique->save()) {
                return true;
            }
            return false;
        }
        return false;
    }

    public function edit()
    {
        $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Modifier Vidange';
        return ['pageTitle' =>  $pageTitle, 'voitures' => $voitures];
    }

    public function update($request, $vidange)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        if ($vidange->update($validated)) {
            return true;
        }
        return false;
    }

    public function destroy($vidange)
    {
        if ($vidange->delete()) {
            return true;
        } else {
            return false;
        }
    }
    public function voitureVidange($voiture)
    {
        $lastCarKm = VoitureHistorique::where('voiture_id', $voiture->id)->orderBy('date', 'desc')->first();
        $lastVidange = Vidange::where('voiture_id', $voiture->id)->orderBy('date_changement', 'desc')->first();

        $lastInfos = [
            'lastCarKm' => $lastCarKm,
            'lastVidange' => $lastVidange,
        ];
        if ($lastInfos) {
            return $lastInfos;
        } else {
            return false;
        }
    }
}
