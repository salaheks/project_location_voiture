<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuranceRequest;
use App\Models\Assurance;
use App\Models\Voiture;
use App\Services\AssuranceService;

class AssuranceController extends Controller
{
    protected $assuranceService;

    public function __construct(AssuranceService $assuranceService)
    {
        $this->assuranceService = $assuranceService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->assuranceService->index();
        return view('admin.assurance.index', [
            'assurances' => $data['assurances'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $data = $this->assuranceService->create($id);
        return view('admin.assurance.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'assuseurs' => $data['assuseurs'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssuranceRequest $request)
    {
        $data = $this->assuranceService->store($request);
        if ($data) {
            return redirect()->route('assurances.index')->with('notify', [['success', 'assurance ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Assurance $assurance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assurance $assurance)
    {
        $data = $this->assuranceService->edit();
        return view('admin.assurance.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'assurance' => $assurance,
            'assuseurs' => $data['assuseurs'],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssuranceRequest $request, Assurance $assurance)
    {
        $result = $this->assuranceService->update($request, $assurance);
        if ($result) {
            return redirect()->route('assurances.index')->with('notify', [['success', 'Assurance modifier avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assurance $assurance)
    {
        $result = $this->assuranceService->destroy($assurance);
        if ($result) {
            return redirect()->route('assurances.index')->with('notify', [['success', 'Assurance supprimer avec succès']]);
        }
    }

    public function voitureAssurance(Voiture $voiture)
    {
        return $this->assuranceService->voitureAssurance($voiture);
    }
}
