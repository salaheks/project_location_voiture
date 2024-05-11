<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Clients';
        $clients = Client::where('company_id', auth()->user()->company_id)->get();
        return view('admin.client.index', compact('pageTitle', 'clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Ajouter Client';
        return view('admin.client.addUpdate', compact('pageTitle'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $result = $this->clientService->storeClient($request);
        $route = $request->from_booking != null ? '' : 'clients.index';
        if ($route) {
            return redirect()->route($route)->with('notify', [['success', 'Client ajoutée avec succès']]);
        }
        else{
            return $result;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result = $this->clientService->show($id);
        if ($result) {
            return response()->json($result);
        } else {
            return response()->json(['error' => 'Client not found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $pageTitle = 'Modifier Client';
        return view('admin.client.addUpdate', compact('client', 'pageTitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
        $result = $this->clientService->updateClient($request, $client);

        if ($result) {
            return redirect()->route('clients.index')->with('notify', [['success', 'Client modifier avec succès']]);
        }

        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $result = $this->clientService->destroyClient($client);

        if ($result) {
            return redirect()->route('clients.index')->with('notify', [['success', 'Client supprimer avec succès']]);
        }
    }
}
