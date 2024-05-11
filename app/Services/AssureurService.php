<?php

namespace App\Services;

use App\Models\Assureur;

class AssureurService
{
    public function index(){
        $assureurs = Assureur::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = "Assureurs";
        return ['assureurs' => $assureurs, 'pageTitle' => $pageTitle];
    }

    public function store( $request ){
        $validated = $request->validated();
        $validated['company_id'] = auth()->user()->company_id;
        $assureur = new Assureur($validated);

        if ($assureur->save()) {
            return true;
        }
        return false;
    }

    public function update($request, $assureur){
        $validatedData = $request->validated();
        if ($assureur->update($validatedData)) {
            return true;
        }
        return false;
    }

    public function destroy($assureur){
        $selectedAssureur = Assureur::findOrFail($assureur->id);
        if ($selectedAssureur->delete()) {
            return true;
        }
        return false;
    }
}
