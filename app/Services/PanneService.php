<?php

namespace App\Services;

use App\Models\Client;
use App\Models\Panne;
use App\Models\Voiture;

class PanneService
{
    public function index()
    {
        $pannes = Panne::whereHas('voiture', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        })->get();
        $pageTitle = "Pannes";
        return ['pannes' => $pannes, 'pageTitle' => $pageTitle];
    }

    public function create($id)
    {
        if ($id) {
            $voitures = Voiture::findOrFail($id);
        } else {
            $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        }
        $pageTitle = "Ajouter Panne";
        $clients = Client::where('company_id', auth()->user()->company_id)->get();
        return ['pageTitle' => $pageTitle, 'voitures' => $voitures, 'clients' => $clients];
    }

    public function store($request)
    {
        // dd($request);
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['company_id'] = auth()->user()->company_id;
        $panne = new Panne($validated);
        if ($panne->save()) {
            return true;
        }
        return false;
    }

    public function edit()
    {
        $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        $clients = Client::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Modifier panne';
        return ['pageTitle'=>  $pageTitle, 'voitures' => $voitures, 'clients' => $clients];
    }

    public function update($request, $panne)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        if ($panne->update($validated)) {
            return true;
        }
        return false;
    }

    public function destroy($panne)
    {
        if($panne->delete()) {
            return true;
        }
        else{
            return false;
        }
    }

    public function voiturePanne($voiture)
    {
        $lastPanne = Panne::where('voiture_id', $voiture->id)->orderBy('date_fin', 'desc')->first();
        if ($lastPanne) {
            return $lastPanne;
        }else{
            return false;
        }
    }
}
