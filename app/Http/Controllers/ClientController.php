<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("client.index");
    }

    /**
     * Show the form for creating a new resource.
     */
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
