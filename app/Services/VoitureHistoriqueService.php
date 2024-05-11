<?php

namespace App\Services;

use App\Models\VoitureHistorique;

class VoitureHistoriqueService
{
    public function store($request)
    {
        $validated = $request->validated();
        $historique = new VoitureHistorique($validated);
        if ($historique->save()) {
            return true;
        }
        return false;
    }

    public function update($request, $historique)
    {
        $validated = $request->validated();
        if ($historique->update($validated)) {
            return true;
        }
        return false;
    }

    public function destroy($historique){
        if($historique->delete()) {
            return true;
        }
        else{
            return false;
        }
    }
}
