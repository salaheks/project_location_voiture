<?php

namespace App\Http\Controllers;

use App\Http\Requests\VignetteRequest;
use App\Models\Vignettes;
use App\Models\Voiture;
use App\Services\VignetteService;

class VignettesController extends Controller
{
    protected $vignetteService;

    public function __construct(VignetteService $vignetteService)
    {
        $this->vignetteService = $vignetteService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->vignetteService->index();
        return view('admin.vignette.index', [
            'vignettes' => $data['vignettes'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $data = $this->vignetteService->create($id);
        return view('admin.vignette.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VignetteRequest $request)
    {
        $data = $this->vignetteService->store($request);
        if($data){
            return redirect()->route('vignettes.index')->with('notify', [['success', 'vignette ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vignettes $vignettes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vignettes $vignette)
    {
        $data = $this->vignetteService->edit();
        return view('admin.vignette.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'vignette' => $vignette,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VignetteRequest $request, Vignettes $vignette)
    {
        $result = $this->vignetteService->update($request, $vignette);
        if ($result) {
            return redirect()->route('vignettes.index')->with('notify', [['success', 'Vignette modifier avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vignettes $vignette)
    {
        $result = $this->vignetteService->destroy($vignette);
        if ($result) {
            return redirect()->route('vignettes.index')->with('notify', [['success', 'Vignette supprimer avec succès']]);
        }
    }

    public function voitureVignette(Voiture $voiture)
    {
        return $this->vignetteService->voitureVignette($voiture);
    }
}
