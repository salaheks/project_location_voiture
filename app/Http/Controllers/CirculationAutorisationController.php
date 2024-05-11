<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorisationRequest;
use App\Models\CirculationAutorisation;
use App\Models\Voiture;
use App\Services\AutorisationService;

class CirculationAutorisationController extends Controller
{
    protected $autorisationService;

    public function __construct(AutorisationService $autorisationService)
    {
        $this->autorisationService = $autorisationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->autorisationService->index();
        return view('admin.autorisation.index', [
            'autorisations' => $data['autorisations'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $data = $this->autorisationService->create($id);
        return view('admin.autorisation.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorisationRequest $request)
    {
        $data = $this->autorisationService->store($request);
        if($data){
            return redirect()->route('autorisations.index')->with('notify', [['success', 'autorisation ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(CirculationAutorisation $autorisation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CirculationAutorisation $autorisation)
    {
        $data = $this->autorisationService->edit();
        return view('admin.autorisation.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'autorisation' => $autorisation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorisationRequest $request, CirculationAutorisation $autorisation)
    {
        $result = $this->autorisationService->update($request, $autorisation);
        if ($result) {
            return redirect()->route('autorisations.index')->with('notify', [['success', 'autorisation modifier avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CirculationAutorisation $autorisation)
    {
        $result = $this->autorisationService->destroy($autorisation);
        if ($result) {
            return redirect()->route('autorisations.index')->with('notify', [['success', 'autorisation supprimer avec succès']]);
        }
    }

    public function voitureAutorisation(Voiture $voiture)
    {
        return $this->autorisationService->voitureAutorisation($voiture);
    }
}
