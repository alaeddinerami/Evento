<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Traits\ImageUpload;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     use ImageUpload;

    public function index()
    {
        //
        $events = Event::all();
        return view('organisateur.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('organisateur.event.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $validatedData = $request->validate([
        'title' => 'required' ,
        'lieu' => 'required',
        'placesdisponible' => 'required',
        'description' => 'required',
        'date' => 'required',
        'typeValidation' => 'required',
        'categoryID' => 'required',
        'organizerID' => 'required',
       
        ]);

        $newEvent = Event::create($validatedData);
        $this->storeImg($request->file('image'), $newEvent);
        return redirect()->back()->with([
            'message' => 'Event created successfully!',
            'operationSuccessful' => $this->operationSuccessful = true,
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
        // dd($event);
        return view('client.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('organisateur.event.edit', compact('categories', "event"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        // dd($request);
        $validatedData = $request->validate([
            'title' => 'required' ,
            'lieu' => 'required',
            'placesdisponible' => 'required',
            'description' => 'required',
            'date' => 'required',
            'typeValidation' => 'required',
            'categoryID' => 'required',
            'organizerID' => 'required',
            ]);
            // dd($request->all());
             $event->update($validatedData);


            if ($request->hasFile('image')) {
                $this->upadateImg($request->file('image'), $event);
            }         
    
           
            //    return redirect()->back()->with([
            //     'message' => 'Event updated successfully!',
            //     'operationSuccessful' => $this->operationSuccessful = true,]);
                return redirect('organisateur/event');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->Delete();
     
        return redirect()->back();
    }
}
