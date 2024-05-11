<?php

namespace App\Http\Controllers;

use App\Http\Requests\PanneRequest;
use App\Models\Panne;
use App\Models\Voiture;
use App\Services\PanneService;

class PanneController extends Controller
{
    protected $panneService;

    public function __construct(PanneService $panneService)
    {
        $this->panneService = $panneService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->panneService->index();
        return view('admin.panne.index', [
            'pannes' => $data['pannes'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $data = $this->panneService->create($id);
        return view('admin.panne.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'clients' => $data['clients'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PanneRequest $request)
    {
        $data = $this->panneService->store($request);
        if($data){
            return redirect()->route('pannes.index')->with('notify', [['success', 'panne ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(panne $panne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(panne $panne)
    {
        $data = $this->panneService->edit();
        return view('admin.panne.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'clients' => $data['clients'],
            'panne' => $panne,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PanneRequest $request, panne $panne)
    {
        $result = $this->panneService->update($request, $panne);
        if ($result) {
            return redirect()->route('pannes.index')->with('notify', [['success', 'panne modifier avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(panne $panne)
    {
        $result = $this->panneService->destroy($panne);
        if ($result) {
            return redirect()->route('pannes.index')->with('notify', [['success', 'panne supprimer avec succès']]);
        }
    }

    public function voiturePanne(Voiture $voiture)
    {
        return $this->panneService->voiturePanne($voiture);
    }
}
