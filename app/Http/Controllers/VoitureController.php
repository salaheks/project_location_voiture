<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoitureRequest;
use App\Models\CreditPaiement;
use App\Models\Type;
use App\Models\visiteTechnique;
use App\Models\Voiture;
use App\Models\VoitureHistorique;
use App\Services\SaveImageService;
use App\Services\VoitureService;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoitureController extends Controller
{
    protected $voitureService;
    protected $saveImageService;

    public function __construct(VoitureService $voitureService, SaveImageService $saveImageService)
    {
        $this->voitureService = $voitureService;
        $this->saveImageService = $saveImageService;
    }

    public function index()
    {
        $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Voitures';
        return view('admin.voiture.index', compact('voitures', 'pageTitle'));
    }

    public function add()
    {
        $types = Type::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Ajouter Voiture';
        return view('admin.voiture.add', compact('types', 'pageTitle'));
    }
    private function createCreditPayments(Voiture $voiture, $paymentDate)
    {
        $interval = new DateInterval('P30D'); // 30-day interval
        $paymentDate = new DateTime($paymentDate);
    
        // Loop through the number of months in duree_credit_mois
        for ($i = 0; $i < $voiture->duree_credit_mois; $i++) {
            $creditPaiement = new CreditPaiement();
            $creditPaiement->voiture_id = $voiture->id;
            $creditPaiement->montant = $voiture->montant_paiement_par_mois;
    
            // Set the payment date
            if ($i === 0) {
                // For the first payment, use the date_debut_paiement
                $creditPaiement->date_paiement = $paymentDate->format('Y-m-d');
            } else {
                // Add 30 days to the payment date for the next iteration
                $paymentDate->add($interval);
                $creditPaiement->date_paiement = $paymentDate->format('Y-m-d');
            }
    
            $creditPaiement->save();
        }
    }
    
    public function store(VoitureRequest $request)
    {
        // Retrieve the validated input data
        $validatedData = $request->validated();
        $company = auth()->user()->company->name;
    
        if ($request->hasFile('image')) {
            $imagePath = $this->saveImageService->uploadImage($request, 'image', $company, 'voitures', '');
            if ($imagePath) {
                $validatedData['image'] = $imagePath;
            }
        }
    
        // Set user_id and company_id
        $validatedData['user_id'] = auth()->id();
        $validatedData['company_id'] = auth()->user()->company_id;
    
        // Create a new Voiture instance with the validated data
        $voiture = Voiture::create($validatedData);
    
        // Create credit payments
        $this->createCreditPayments($voiture, $request->date_debut_paiement);
    
        return redirect()->route('voiture.index')->with('notify', [['success', 'Voiture ajoutée avec succès']]);
    }
    
    

    public function edit($id)
    {
        $voiture = Voiture::findOrFail($id);
        $types = Type::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Modifier Voiture';
        return view('admin.voiture.edit', compact('voiture', 'types', 'pageTitle'));
    }

    public function update(VoitureRequest $request, $id)
    {
        $validatedData = $request->validated();
    
        $company = auth()->user()->company->name;  
    
        $voiture = Voiture::findOrFail($id);
    
        $this->updateImage($request, $voiture, $company);
    
        if ($voiture->update($validatedData)) {
            return redirect()->route('voiture.index')->with('notify', [['success', 'Voiture modifiée avec succès']]);
        }
    }
    
    private function updateImage($request, $voiture, $company)
    {
        if ($request->hasFile('image')) {
            $imagePath = $this->saveImageService->uploadImage($request, 'image', $company, 'voitures', '');
            if ($imagePath) {
                $voiture->image = $imagePath;
                $voiture->save();
            }
        }
    }
    

    public function destroy($id)
    {
        $voiture = Voiture::findOrFail($id);
        if ($voiture->delete()) {
            return redirect()->route('voiture.index')->with('notify', [['success', 'Voiture supprimée avec succès']]);
        }
    }

    public function showPayments($id)
    {
        $voiture = Voiture::findOrFail($id);
        $pageTitle = 'Paiements de credit de ' . $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->type->transmission . ' ' . $voiture->type->carburant;
        if ($voiture) {
            $creditPaiements = CreditPaiement::where('voiture_id', $id)->get();
            return view('admin/voiture/credit-paiments', compact('creditPaiements', 'pageTitle'));
        }
    }

    public function showTechnicalVisits($id)
    {
        $voiture = Voiture::findOrFail($id);
        $pageTitle = 'Visite techniques de ' . $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->type->transmission . ' ' . $voiture->type->carburant;

        if ($voiture) {
            $visiteTechniques = visiteTechnique::where('voiture_id', $id)->with('centreVisite')->get();
            return view('admin/voiture/visite-techniques', compact('visiteTechniques', 'pageTitle', 'id'));
        }
    }

    public function showAssurances(Voiture $voiture)
    {
        if($voiture){
            $data = $this->voitureService->assurances($voiture);
            return view('admin/voiture/assurance', [
                'pageTitle' => $data['pageTitle'],
                'id' => $data['id'],
                'assurances' => $data['assurances'],
            ]);
        }
    }

    public function showVignettes(Voiture $voiture)
    {
        if($voiture){
            $data = $this->voitureService->vignettes($voiture);
            return view('admin/voiture/vignette', [
                'pageTitle' => $data['pageTitle'],
                'id' => $data['id'],
                'vignettes' => $data['vignettes'],
            ]);
        }
    }

    public function showVidanges(Voiture $voiture)
    {
        if($voiture){
            $data = $this->voitureService->vidanges($voiture);
            return view('admin/voiture/vidange', [
                'pageTitle' => $data['pageTitle'],
                'id' => $data['id'],
                'vidanges' => $data['vidanges'],
            ]);
        }
    }

    public function availableCars(Request $request)
    {
        $dateLivraison = Carbon::parse($request->dateLivraison);
        $dateRetour = Carbon::parse($request->dateRetour);
        $companyId = auth()->user()->company_id;

        $availableCars = Voiture::with('type')
            ->where('company_id', $companyId)
            ->whereDoesntHave('bookings', function ($query) use ($dateLivraison, $dateRetour) {
                $query->where(function ($q) use ($dateLivraison, $dateRetour) {
                    $q->where('date_livraison', '<', $dateLivraison)
                    ->where('date_retour', '>', $dateRetour);
                })->orWhere(function ($q) use ($dateLivraison, $dateRetour) {
                    $q->whereBetween('date_livraison', [$dateLivraison, $dateRetour]);
                })->orWhere(function ($q) use ($dateLivraison, $dateRetour) {
                    $q->whereBetween('date_retour', [$dateLivraison, $dateRetour]);
                });
            })->get();

        return response()->json($availableCars);
    }

    public function show($id){
        $voiture = Voiture::with('type')->find($id);
        return $voiture;
    }
    public function showHistory($id)
    {
        $voiture = Voiture::findOrFail($id);
        $pageTitle = 'Historique de ' . $voiture->type->marque . ' ' . $voiture->type->model . ' ' . $voiture->type->transmission . ' ' . $voiture->type->carburant;

        if ($voiture) {
            $historiques = VoitureHistorique::where('voiture_id', $id)->orderBy('date','desc')->get();
            return view('admin/voiture/historique', compact('historiques', 'pageTitle', 'id'));
        }
    }
}
