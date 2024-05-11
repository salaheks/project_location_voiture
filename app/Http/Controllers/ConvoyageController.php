<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConvoyageRequest;
use App\Models\Convoyage;
use App\Services\ConvoyageService;

class ConvoyageController extends Controller
{
    protected $convoyageService;

    public function __construct(ConvoyageService $convoyageService)
    {
        $this->convoyageService = $convoyageService;
    }

    public function index()
    {
        $data = $this->convoyageService->index();
        return view('admin.convoyage.index', [
            'convoyages' => $data['convoyages'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    public function create()
    {
        $data = $this->convoyageService->create();
        return view('admin.convoyage.addUpdate', [
            'pageTitle' => $data['pageTitle'],
        ]);
    }

    public function store(ConvoyageRequest $request)
    {
        $result = $this->convoyageService->store($request);

        if ($result) {
            return redirect()->route('convoyages.index')->with('notify', [['success', 'convoyage ajoutée avec succès']]);
        }
    }

    public function edit(Convoyage $convoyage)
    {
        $data = $this->convoyageService->edit();
        return view('admin.convoyage.addUpdate', [
            'pageTitle' => $data['pageTitle'],
            'convoyage' => $convoyage,
        ]);

    }

    public function update(ConvoyageRequest $request, Convoyage $convoyage)
    {
        $result = $this->convoyageService->update($request, $convoyage);

        if ($result) {
            return redirect()->route('convoyages.index')->with('notify', [['success', 'Convoyage ajoutée avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de modification']]);
    }

    public function destroy(Convoyage $convoyage)
    {
        $result = $this->convoyageService->destroy($convoyage);
        if($result){
            return redirect()->route('convoyages.index')->with('notify', [['success', 'Convoyage supprimer avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de modification']]);
    }
}
