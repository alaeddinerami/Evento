<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    public function displayIndex()
    {
        // $events = Event::whereHas('organizers', function ($query) use ($organizerId) {
        //     $query->where('userID', $organizerId);
        // $reservationsTotal = Reservation::where('');
        $reservations = Reservation::where('status', 0)->get();
        return view('organisateur.reservation.reseravtionliste', compact('reservations'));
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
        // dd($request);
        $validatedData = $request->validate([
            'eventID' => 'required',
            'clientID' => 'required',

        ]);
        $event = Event::findOrFail($validatedData['eventID']);
        if ($event->typeValidation == 'automatic') {
            $auto = 1;
        } else {
            $auto = 0;
        }
        $newReservation = Reservation::create([
            'eventID' => $request->eventID,
            'clientID' => $request->clientID,
            'status' => $auto,

        ]);
        if ($newReservation->status == 1) {
            $event->update([
                'placesdisponible' => $event->placesdisponible - 1,

            ]);
            return redirect()->back()->with([
                'message' => 'event is reserved successfully!',
                'operationSuccessful' => $this->operationSuccessful = true,
            ]);
        }

        return redirect()->back()->with([
            'message' => 'reservation pending!',
            'operationSuccessful' => $this->operationSuccessful = true,
        ]);


        // dd($event);


    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
        return view('client.ticket', compact('reservation'));
    }
    public function showStatistic(Reservation $reservation)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
        dd($reservation->eventID);
    }
    public function reseravationManualAccepted(Reservation $reservation)
    {
        // dd($reservation);
        $reservationAccepted = Reservation::find($reservation->id);
        
        $reservationAccepted->status = 1;
        $reservationAccepted->update();
        if ($reservationAccepted->status == 1) {
            $reservationAccepted->events->update([
                'placesdisponible' => $reservationAccepted->events->placesdisponible - 1,
                
            ]);
            // dd($reservationAccepted->status);
            
            
        }
        // $placesdisponible ;

        // dd($reservationAccepted->status);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
