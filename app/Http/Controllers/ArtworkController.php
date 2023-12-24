<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artwork;


class ArtworkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $keyCountry = $request->country;
            $keyOwner = $request->owner;
            $keyArtist = $request->artist;

            $artwork = Artwork::when($request->country, function ($query, $keyCountry) {
                $query->where('idcountry', $keyCountry);
            })
            ->when($request->owner, function ($query, $keyOwner) {
                $query->where('idowner', $keyOwner);
            })
            ->when($request->artist, function ($query, $keyArtist) {
                $query->where('idartist', $keyArtist);
            })
            ->get();

            return response()->json($artwork,200);

        }catch (\Exception $e){
            return response()->json(['status' => 0, 'message' => $e->getMessage()], 400);
        }
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
