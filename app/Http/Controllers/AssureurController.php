<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssureurRequest;
use App\Models\Assureur;
use App\Services\AssureurService;
use Illuminate\Http\Request;

class AssureurController extends Controller
{
    protected $assureurService;

    public function __construct(AssureurService $assureurService)
    {
        $this->assureurService = $assureurService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->assureurService->index();
        return view('admin.assureur.index', [
            'assureurs' => $data['assureurs'],
            'pageTitle' => $data['pageTitle']
        ]);
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
    public function store(AssureurRequest $request)
    {
        $result = $this->assureurService->store($request);

        if ($result) {
            return redirect()->route('assureurs.index')->with('notify', [['success', 'Assureur ajoutée avec succès']]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Assureur $assureur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assureur $assureur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssureurRequest $request, Assureur $assureur)
    {
        $result = $this->assureurService->update($request, $assureur);

        if ($result) {
            return redirect()->route('assureurs.index')->with('notify', [['success', 'Assureur Modifier avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assureur $assureur)
    {
        $result = $this->assureurService->destroy($assureur);
        if($result){
            return redirect()->route('assureurs.index')->with('notify', [['success', 'Assureur supprimer avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de suppression']]);
    }
}
