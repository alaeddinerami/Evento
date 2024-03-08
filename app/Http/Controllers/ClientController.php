<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use App\Models\Event;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        $events = Event::where('isValidByAdmin', 'accepted')->paginate(3);
        return view("client.index", compact('events','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        $categories = Category::all();
        $search = $request->input('search');
        $events = Event::where('isValidByAdmin', 'accepted')->where('title', 'like', "%$search%")->paginate(3);
        // dd($events);
        return view('client.index', compact('events','categories'));
    }
    public function filter(Request $request )
    {
        $categories = Category::all();
        $filter = $request->category;
        $events = Event::where('isValidByAdmin', 'accepted')->where('categoryID', '=', "$filter")->paginate(3);
        // dd($filter);
        
        // dd($events);
        return view('client.index', compact('events','categories'));
    }

    
    public function create()
    {
        //
    }
    public function ban(Client $client)
    {
        if (!$client->isBanned) {
            $client->update([
                'isBanned' => 1,
            ]);
            return redirect()->back()->with('success', 'user Banned!');
        } else {
            $client->update([
                'isBanned' => 0,
            ]);
            return redirect()->back()->with('success', 'user Unbanned!');
        }

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
    public function show(Client $client)
    {
        //
        
        
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //
    }
}
