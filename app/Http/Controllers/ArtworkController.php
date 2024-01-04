<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artwork;


class ArtworkController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/artwork",
     *     tags={"Artwork"},
     *     summary="Get artwork information",
     *     description="Retrieve artwork details based on country, owner, and artist filters",
     *     @OA\Parameter(
     *         name="country",
     *         in="query",
     *         required=false,
     *         description="Filter artwork by country",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="owner",
     *         in="query",
     *         required=false,
     *         description="Filter artwork by owner",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="artist",
     *         in="query",
     *         required=false,
     *         description="Filter artwork by artist",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="idartwork", type="integer"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="date", type="string"),
     *                 @OA\Property(property="country", type="string"),
     *                 @OA\Property(property="owner", type="string"),
     *                 @OA\Property(property="artist", type="string")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Bad request",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="status", type="integer"),
     *             @OA\Property(property="message", type="string")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        try {
            $keyCountry = $request->country;
            $keyOwner = $request->owner;
            $keyArtist = $request->artist;

            $artwork = Artwork::when($request->country, function ($query, $keyCountry) {
                $query->where('artwork.idcountry', $keyCountry);
            })
            ->when($request->owner, function ($query, $keyOwner) {
                $query->where('artwork.idowner', $keyOwner);
            })
            ->when($request->artist, function ($query, $keyArtist) {
                $query->where('artwork.idartist', $keyArtist);
            })
            ->join('arts.country', 'artwork.idcountry', '=', 'country.idcountry') 
            ->join('arts.owner', 'artwork.idowner', '=', 'owner.idowner') 
            ->join('arts.artist', 'artwork.idartist', '=', 'artist.idartist') 
            ->select('artwork.idartwork'
                    ,'artwork.name'
                    ,'artwork.date'
                    ,'country.name as country'
                    ,'owner.name as owner'
                    ,'artist.name as artist') 
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
