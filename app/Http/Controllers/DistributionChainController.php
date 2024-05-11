<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChainRequest;
use App\Models\DistributionChain;
use App\Models\Voiture;
use App\Services\DistrubutionChainService;

class DistributionChainController extends Controller
{
    protected $chainService;

    public function __construct(DistrubutionChainService $chainService)
    {
        $this->chainService = $chainService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->chainService->index();
        return view('admin.chaine.index', [
            'chains' => $data['chains'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $data = $this->chainService->create($id);
        return view('admin.chaine.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChainRequest $request)
    {
        $data = $this->chainService->store($request);
        if($data){
            return redirect()->route('chains.index')->with('notify', [['success', 'Chaine de distribution ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(DistributionChain $distributionChain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DistributionChain $chain)
    {
        $data = $this->chainService->edit();
        return view('admin.chaine.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'voitures' => $data['voitures'],
            'chain' => $chain,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChainRequest $request, DistributionChain $chain)
    {
        $result = $this->chainService->update($request, $chain);
        if ($result) {
            return redirect()->route('chains.index')->with('notify', [['success', 'Chaine de distribution modifier avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DistributionChain $chain)
    {
        $result = $this->chainService->destroy($chain);
        if ($result) {
            return redirect()->route('chains.index')->with('notify', [['success', 'Chaine de distribution supprimer avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de suppression']]);
    }

    public function voitureChain(Voiture $voiture)
    {
        return $this->chainService->voitureChain($voiture);
    }
}
