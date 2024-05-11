<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Models\CreditPaiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CreditPaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditPaiement $creditPaiement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paiement = CreditPaiement::findOrFail($id);
        $pageTitle = "Details De Paiement";
        return view('admin.paiements.edit', compact('paiement','pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentRequest $request, $id)
    {
        $validatedData = $request->validated();

        $paiements = CreditPaiement::findOrFail($id);

        if ($request->hasFile('image')) {
            // Get the file from the request
            $file = $request->file('image');

            // Generate a unique filename by prepending the current timestamp to the original filename
            $filename = time() . '_' . $file->getClientOriginalName();

            // Move the file to 'storage/app/public/images/voitures' directory
            $path = $file->storeAs('images/paiements', $filename);
            $validatedData['image'] = $path;

            // Check if the car has an existing image and if that file exists
            if ($paiements->image && Storage::exists($paiements->image)) {
                Storage::delete($paiements->image);
            }
        }
        $paiements['status'] = '1';

        if($paiements->update($validatedData)){
            return redirect()->route('voiture.index')->with('notify', [['success', 'Paiement modifier avec succès']]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditPaiement $creditPaiement)
    {
        //
    }
}
