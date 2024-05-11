<?php

namespace App\Services;

use App\Models\DistributionChain;
use App\Models\Voiture;
use App\Models\VoitureHistorique;

class DistrubutionChainService
{
    public function index()
    {
        $chains = DistributionChain::whereHas('voiture', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        })->get();
        $pageTitle = "Chaine distributions";
        return ['chains' => $chains, 'pageTitle' => $pageTitle];
    }

    public function create($id)
    {
        if ($id) {
            $voitures = Voiture::findOrFail($id);
        } else {
            $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        }
        $pageTitle = "Ajouter chaine distributions";
        return ['pageTitle' => $pageTitle, 'voitures' => $voitures];
    }

    public function store($request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['company_id'] = auth()->user()->company_id;
        $chain = new DistributionChain($validated);
        if ($chain->save()) {
            $data['km'] = $validated['km_initial'];
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
        return ['pageTitle'=>  $pageTitle, 'voitures' => $voitures];
    }

    public function update($request, $chain)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        if ($chain->update($validated)) {
            return true;
        }
        return false;
    }

    public function destroy($chain)
    {
        if($chain->delete()) {
            return true;
        }
        else{
            return false;
        }
    }

    public function voitureChain($voiture)
    {
        $lastCarKm = VoitureHistorique::where('voiture_id', $voiture->id)->orderBy('date', 'desc')->first();
        $lastChain = DistributionChain::where('voiture_id', $voiture->id)->orderBy('date_changement', 'desc')->first();

        $lastInfos = [
            'lastCarKm' => $lastCarKm,
            'lastChain' => $lastChain,
        ];
        if ($lastInfos) {
            return $lastInfos;
        } else {
            return false;
        }
    }
}
