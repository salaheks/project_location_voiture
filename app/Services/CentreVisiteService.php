<?php

namespace App\Services;

use App\Models\CentreVisite;

class CentreVisiteService
{
    public function index(){
        $centreVisites = CentreVisite::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = "Centres Visites";
        return ['centreVisites' => $centreVisites, 'pageTitle' => $pageTitle];
    }

    public function store( $request ){
        $validated = $request->validated();
        $validated['company_id'] = auth()->user()->company_id;
        $centreVisite = new CentreVisite($validated);

        if ($centreVisite->save()) {
            return true;
        }

        return false;
    }

    public function update($request, $centreVisite){
        $validatedData = $request->validated();
        if ($centreVisite->update($validatedData)) {
            return true;
        }
        return false;
    }

    public function destroy($centreVisite){
        $centre = CentreVisite::findOrFail($centreVisite->id);
        if ($centre->delete()) {
            return true;
        }
        return false;
    }
}
