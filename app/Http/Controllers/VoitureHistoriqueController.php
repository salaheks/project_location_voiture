<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarHistoryRequest;
use App\Models\VoitureHistorique;
use App\Services\VoitureHistoriqueService;
use Illuminate\Http\Request;

class VoitureHistoriqueController extends Controller
{
    protected $voitureHistoriqueService;

    public function __construct(VoitureHistoriqueService $voitureHistoriqueService)
    {
        $this->voitureHistoriqueService = $voitureHistoriqueService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarHistoryRequest $request)
    {
        $data = $this->voitureHistoriqueService->store($request);
        if($data){
            return redirect()->route('voiture.historiques', $request->voiture_id)->with('notify', [['success', 'ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', "echec d'ajout"]]);
    }

    /**
     * Display the specified resource.
     */
    public function show(VoitureHistorique $voitureHistorique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoitureHistorique $voitureHistorique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarHistoryRequest $request, VoitureHistorique $historique)
    {
        $result = $this->voitureHistoriqueService->update($request, $historique);
        if ($result) {
            return redirect()->route('voiture.historiques', $request->voiture_id)->with('notify', [['success', 'Modifier avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoitureHistorique $historique)
    {
        $result = $this->voitureHistoriqueService->destroy($historique);
        if ($result) {
            return redirect()->route('voiture.historiques', $historique->voiture_id)->with('notify', [['success', 'Supprimer avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de suppression']]);
    }
}
