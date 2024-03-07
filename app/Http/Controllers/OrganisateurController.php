<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organisateur;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
       
        return view("organisateur.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function ban(Organisateur $organisateur)
    {
        if (!$organisateur->isBanned) {
            $organisateur->update([
                'isBanned' => 1,
            ]);
            return redirect()->back()->with('success', 'user Banned!');
        } else {
            $organisateur->update([
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
    public function show(Organisateur $organisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisateur $organisateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisateur $organisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisateur $organisateur)
    {
        //
    }
}
