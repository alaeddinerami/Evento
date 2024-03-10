<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Client;
use App\Models\Event;
use App\Models\Organisateur;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clients = Client::all();
        $organisateurs = Organisateur::all();
        return view('dashboard.users.index', compact('clients', 'organisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function statistics()
    {
        $clientsTotal = Client::all()->count();
        $organisateursTotal = Organisateur::all()->count();
        $categoriesTotal = Category::all()->count();
        $eventsTotal = Event::all()->count();
        return view('dashboard.dashboard', compact('clientsTotal', 'organisateursTotal', 'categoriesTotal', 'eventsTotal'));
    }
    public function create()
    {
        //
    }
    public function visitEvent(Event $event)
    {
        
        return view('dashboard.event.visitEvent',['event'=>$event]);
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
    public function show(Admin $admin)
    {
        //
        $events = Event::all();
        return view('dashboard.event.index', compact('events'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function validateEvent(Event $event)
    {

        $event->isValidByAdmin = 'accepted';
        $event->update();
        // dd($event->isValidByAdmin);
        return redirect()->back()->with([
            'message' => 'Event accepted successfully!',
            'operationSuccessful' => $this->operationSuccessful = true,
        ]);
    }
    public function rejectEvent(Event $event)
    {

        $event->isValidByAdmin = 'rejected';
        $event->update();
        // dd($event->isValidByAdmin);
        return redirect()->back()->with([
            'message' => 'Event rejected successfully!',
            'operationSuccessful' => $this->operationSuccessful = true,
        ]);
    }
}
