<?php

namespace App\Http\Controllers;

use App\Http\Requests\OptionRequest;
use App\Models\OptionSupplimentaire;
use App\Services\OptionsService;

class OptionSupplimentaireController extends Controller
{
    protected $optionsService;

    public function __construct(OptionsService $optionsService)
    {
        $this->optionsService = $optionsService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = $this->optionsService->getOptions();

        return view('admin.options.index', [
            'options' => $data['options'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'ajouter option';
        return view('admin.options.addUpdate', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionRequest $request)
    {
        $result = $this->optionsService->storeOption($request);

        if ($result) {
            return redirect()->route('options.index')->with('notify', [['success', 'Option ajoutée avec succès']]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $option = OptionSupplimentaire::find($id);
        return $option;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OptionSupplimentaire $option)
    {
        $pageTitle = 'Modifier Option';
        return view('admin.options.addUpdate', compact('option','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionRequest $request, OptionSupplimentaire $option)
    {
        $result = $this->optionsService->updteOption($request, $option);

        if ($result) {
            return redirect()->route('options.index')->with('notify', [['success', 'Option ajoutée avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OptionSupplimentaire $option)
    {
        $result = $this->optionsService->destroyOption($option);
        if($result){
            return redirect()->route('options.index')->with('notify', [['success', 'Option supprimer avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de modification']]);
    }
}
