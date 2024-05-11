<?php

namespace App\Http\Controllers;

use App\Http\Requests\VisiteTechniqueRequest;
use App\Models\CentreVisite;
use App\Models\visiteTechnique;
use App\Models\Voiture;

class VisiteTechniqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visiteTechniques = visiteTechnique::whereHas('voiture', function ($query) {
            $query->where('company_id', auth()->user()->company_id);
        })->get();
        $pageTitle = 'Visite techniques';
        return view('admin.visite-techniques.index', compact('visiteTechniques', 'pageTitle'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(?Voiture $voiture = null)
    {
        $pageTitle = 'Ajouter Visite Technique';
        $centresVisite = CentreVisite::where('company_id', auth()->user()->company_id)->get();
        $voitures = null;
        $data = compact('pageTitle', 'voiture', 'centresVisite');
        if ($voiture) {
            $car = Voiture::findOrFail($voiture->id);
            $data['voiture'] = $car;
        }
        else{
            $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
            $data['voitures'] = $voitures;
        }
        return view('admin.visite-techniques.add', $data);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(VisiteTechniqueRequest $request, ?Voiture $voiture = null)
    {
        $validatedData = $request->validated();
        if($voiture || $request->voiture_id){
            $validatedData['voiture_id'] = $voiture->id ?? $request->voiture_id;
        }

        $visiteTechnique = VisiteTechnique::create($validatedData);
        if($visiteTechnique){
            $routeParameters = $voiture ? [$voiture->id] : null;
            $route = $voiture ? 'voiture.visitetechniques' : 'visitetechnique.index';
            return redirect()->route($route, $routeParameters)->with('notify', [['success', 'Visite Technique ajoutée avec succès']]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(visiteTechnique $visiteTechnique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $visiteTechnique = visiteTechnique::findOrFail($id);
        $pageTitle = 'Modifier Visite Technique';
        $centresVisite = centreVisite::where('company_id', auth()->user()->company_id)->get();
        $voitureId = $visiteTechnique->voiture_id;
        return view('admin.visite-techniques.edit', compact('visiteTechnique','pageTitle','id','centresVisite','voitureId'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VisiteTechniqueRequest $request,$id)
    {
        $validatedData = $request->validated();
        $visiteTechnique = visiteTechnique::findOrFail($id);
        $voitureId = $visiteTechnique->voiture_id;
        if($visiteTechnique->update($validatedData)){
            return redirect()->route('voiture.visitetechniques',$voitureId)->with('notify', [['success', 'Visite Technique modifier avec succès']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $visiteTechnique = visiteTechnique::findOrFail($id);
        if($visiteTechnique->delete()){
            return redirect()->route('visitetechnique.index')->with('notify', [['success', 'Visite Technique supprimée avec succès']]);
        }
    }

    public function voitureVisiteTechnique(Voiture $voiture)
    {
        $lastVisiteTechnique = visiteTechnique::where('voiture_id', $voiture->id)->orderBy('date_controle', 'desc')->first();
        if($lastVisiteTechnique){
            return $lastVisiteTechnique;
        }
        else{
            return false;
        }
    }
}
