<?php

namespace App\Services;

use App\Models\Booking;
use App\Models\BookingOption;
use App\Models\Voiture;
use App\Models\Client;
use App\Models\OptionSupplimentaire;
use App\Models\Convoyage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingService
{

    public function index(){
        $bookings = Booking::all();
        $pageTitle = "Reservations";
        return ['bookings' => $bookings, 'pageTitle' => $pageTitle];
    }
    public function create()
    {
        $voitures = Voiture::where('company_id', auth()->user()->company_id)->get();
        $clients = Client::where('company_id', auth()->user()->company_id)->get();
        $options = OptionSupplimentaire::where('company_id', auth()->user()->company_id)->get();
        $convoyages = Convoyage::where('company_id', auth()->user()->company_id)->get();
        $pageTitle = 'Ajouter Reservation';
        $reference = $this->generateReference(Auth::user()->company_id);
        $tabs = [
            ['id' => 'voiture', 'name' => 'Voiture', 'view' => 'admin.booking.tabs.voiture'],
            ['id' => 'client', 'name' => 'Client', 'view' => 'admin.booking.tabs.client'],
            ['id' => 'conducteur-2', 'name' => 'Conducteur 2', 'view' => 'admin.booking.tabs.conducteur2'],
            ['id' => 'option-supp', 'name' => 'Option supplémentaire', 'view' => 'admin.booking.tabs.optionsupp'],
            ['id' => 'reglement', 'name' => 'Réglement', 'view' => 'admin.booking.tabs.reglement'],
            ['id' => 'transfert', 'name' => 'Transfert', 'view' => 'admin.booking.tabs.transfert'],
        ];

        return compact('voitures', 'clients', 'options', 'convoyages', 'tabs', 'pageTitle', 'reference');
    }

    function generateReference($company_id)
    {
        DB::enableQueryLog();
        $numRef = "ref-0001-0001";
        if (Booking::where("company_id", $company_id)->orderBy("id", "desc")->exists()) {
            $booking = Booking::where("company_id", $company_id)->orderBy("id", "desc")->first();
            if (!is_null($booking->num_ref)) {
                $explode_ref = explode("-", $booking->num_ref);
                $ref = last($explode_ref);
                $numRef = "ref-" . ($booking->id + 1) . "-" . str_pad($ref + 1, 4, "0", STR_PAD_LEFT);
            }
        }
        return $numRef;
    }

    public function store($request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['company_id'] = auth()->user()->company_id;
        if ($request->doc_type == 'cin') {
            $validated['cin_conducteur_2'] = $request->num;
        } else if ($request->doc_type == 'passport') {
            $validated['num_passeport_conducteur_2'] = $request->num;
        }
        $booking = new Booking($validated);
        if ($booking->save()) {
            if (request()->has('option_id')) {
                $optionIds = request('option_id');
                $quantities = request('quantite');
                $prices = request('prix');
                $types = request('type_paiement');
                $amounts = request('amount');
                $bookingId = $booking->id;

                foreach ($optionIds as $index => $optionId) {
                    $option = new BookingOption([
                        'quantite' => $quantities[$index],
                        'option_supplimentaire_id' => $optionId,
                        'booking_id' => $bookingId,
                        'type' => $types[$index],
                        'price' => $prices[$index],
                        'amount' => $amounts[$index],
                    ]);
                    $option->save();
                }
            }
            return true;
        }
        return false;
    }

    public function destroy($booking)
    {
        if ($booking->delete()) {
            return true;
        } else {
            return false;
        }
    }
}
