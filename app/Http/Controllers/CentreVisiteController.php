<?php

namespace App\Http\Controllers;

use App\Http\Requests\CentreVisiteRequest;
use App\Models\CentreVisite;
use App\Services\CentreVisiteService;
use Illuminate\Http\Request;

class CentreVisiteController extends Controller
{
    protected $centreVisiteService;

    public function __construct(CentreVisiteService $centreVisiteService)
    {
        $this->centreVisiteService = $centreVisiteService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->centreVisiteService->index();
        return view('admin.centre-visite.index', [
            'centreVisites' => $data['centreVisites'],
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
    public function store(CentreVisiteRequest $request)
    {
        $result = $this->centreVisiteService->store($request);

        if ($result) {
            return redirect()->route('centreVisites.index')->with('notify', [['success', 'Centre Visite ajoutée avec succès']]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(centreVisite $centreVisite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(centreVisite $centreVisite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CentreVisiteRequest $request, CentreVisite $centreVisite)
    {
        $result = $this->centreVisiteService->update($request, $centreVisite);

        if ($result) {
            return redirect()->route('centreVisites.index')->with('notify', [['success', 'Centre Visite ajoutée avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CentreVisite $centreVisite)
    {
        $result = $this->centreVisiteService->destroy($centreVisite);
        if($result){
            return redirect()->route('centreVisites.index')->with('notify', [['success', 'Centre Visite supprimer avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de suppression']]);
    }
}
