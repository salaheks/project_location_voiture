<?php

namespace App\Services;

use App\Models\Convoyage;

class ConvoyageService
{
    public function index()
    {
        $convoyages = Convoyage::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Convoyage';
        return ['convoyages' => $convoyages, 'pageTitle' => $pageTitle];
    }

    public function create()
    {
        $pageTitle = 'Ajouter Convoyage';
        return ['pageTitle' => $pageTitle];
    }

    public function store( $request ){
        $validated = $request->validated();
        $validated['company_id'] = auth()->user()->company_id;
        $convoyage = new Convoyage($validated);

        if ($convoyage->save()) {
            return true;
        }

        return false;
    }

    public function edit(){
        $pageTitle = 'Modifier Convoyage';
        return ['pageTitle'=>  $pageTitle];
    }

    public function update($request, $convoyage){
        $validatedData = $request->validated();
        if ($convoyage->update($validatedData)) {
            return true;
        }
        return false;
    }

    public function destroy($convoyage){
        $selectedConvoyage = Convoyage::findOrFail($convoyage->id);
        if ($selectedConvoyage->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
