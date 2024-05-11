<?php

namespace App\Services;

use App\Models\Client;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Storage;

class ClientService
{
    protected $saveImageService;

    public function __construct(SaveImageService $saveImageService)
    {
        $this->saveImageService = $saveImageService;
    }

    public function storeClient($request)
    {
        $validated = $request->validated();

        if ($request->from_booking) {
            if ($request->doc_type == "passport") {
                $validated['num_passeport'] = $request->num;
            } else if ($request->doc_type == "cin") {
                $validated['cin'] = $request->num;
            }
        }

        $clientName = $request->nom; // Use this variable to create a folder with the client's name

        // For passport image
        if ($request->hasFile('image_passport')) {
            // The path now includes the client's name directly, then 'passport'
            $passportPath = $this->saveImageService->uploadImage($request, 'image_passport', 'clients/' . $clientName, 'passport');
            if ($passportPath) {
                $validated['image_passport'] = $passportPath;
            }
        }

        // For permis image
        if ($request->hasFile('image_permis')) {
            // The path now includes the client's name directly, then 'permis'
            $permisPath = $this->saveImageService->uploadImage($request, 'image_permis', 'clients/' . $clientName, 'permis');
            if ($permisPath) {
                $validated['image_permis'] = $permisPath;
            }
        }

        $validated['company_id'] = auth()->user()->company_id;
        $client = new Client($validated);
        if ($client->save()) {
            return $client;
        }

        return false;
    }

    public function destroyClient(Client $client)
    {
        $client = client::findOrFail($client->id);
        if ($client->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateClient(ClientRequest $request, Client $client)
    {
        $validatedData = $request->validated();

        // Update image_passport if it's provided in the request
        if ($request->hasFile('image_passport')) {
            // Upload the new passport image and update the path
            $passportPath = $this->saveImageService->uploadImage($request, 'image_passport', 'clients/' . $client->nom, 'passport');
            if ($passportPath) {
                $validatedData['image_passport'] = $passportPath;
            }
        }

        // Update image_permis if it's provided in the request
        if ($request->hasFile('image_permis')) {
            // Upload the new permis image and update the path
            $permisPath = $this->saveImageService->uploadImage($request, 'image_permis', 'clients/' . $client->nom, 'permis');
            if ($permisPath) {
                $validatedData['image_permis'] = $permisPath;
            }
        }

        // Update the client with the validated data
        if ($client->update($validatedData)) {
            return true; // Return true on successful update
        }

        return false;
    }

    public function show($id)
    {
        $client = Client::find($id);
        if ($client) {
            return $client;
        } else {
            return false;
        }
    }
}
