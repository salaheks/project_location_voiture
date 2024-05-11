<?php

namespace App\Http\Controllers;

use App\Http\Requests\VidangeRequest;
use App\Models\Vidange;
use App\Models\Voiture;
use App\Services\VidangeService;
use Illuminate\Http\Request;

class VidangeController extends Controller
{
    protected $vidangeService;

    public function __construct(VidangeService $vidangeService)
    {
        $this->vidangeService = $vidangeService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->vidangeService->index();
        return view('admin.vidange.index', [
            'vidanges' => $data['vidanges'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $data = $this->vidangeService->create($id);
        return view('admin.vidange.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VidangeRequest $request)
    {
        $data = $this->vidangeService->store($request);
        if($data){
            return redirect()->route('vidanges.index')->with('notify', [['success', 'vidange ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vidange $vidange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vidange $vidange)
    {
        $data = $this->vidangeService->edit();
        return view('admin.vidange.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'vidange' => $vidange,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VidangeRequest $request, Vidange $vidange)
    {
        $result = $this->vidangeService->update($request, $vidange);
        if ($result) {
            return redirect()->route('vidanges.index')->with('notify', [['success', 'Vidange modifier avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vidange $vidange)
    {
        $result = $this->vidangeService->destroy($vidange);
        if ($result) {
            return redirect()->route('vidanges.index')->with('notify', [['success', 'Vidange supprimer avec succès']]);
        }
    }

    public function voitureVidange(Voiture $voiture)
    {
        return $this->vidangeService->voitureVidange($voiture);
    }
}
