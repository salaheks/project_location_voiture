<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    protected $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->bookingService->index();
        return view('admin.booking.index', [
            'bookings' => $data['bookings'],
            'pageTitle' => $data['pageTitle']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->bookingService->create();
        return view('admin.booking.addUpdate', array_merge($data));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $data = $this->bookingService->store($request);
        if ($data) {
            return redirect()->route('bookings.index')->with('notify', [['success', 'Reservation ajoutée avec succès']]);
        }
        return back()->with('notify', [['error', 'echec de modification']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $result = $this->bookingService->destroy($booking);
        if ($result) {
            return redirect()->route('bookings.index')->with('notify', [['success', 'reservation supprimer avec succès']]);
        }
    }
}
