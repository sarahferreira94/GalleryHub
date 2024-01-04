<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/artist",
     *     tags={"Artists"},
     *     summary="Get a list of artists",
     *     description="Returns a list of artists matching the provided key",
     *     @OA\Parameter(
     *         name="key",
     *         in="query",
     *         required=false,
     *         description="Search key for filtering artists by name",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Bad request")
     * )
     *//
    public function index(Request $request)
    {
        try {

            $key = $request->key;
            
            $artists = Artist::where('name','LIKE','%'.$key.'%')->get();

            return response()->json($artists,200);

        }catch (\Exception $e){
            return response()->json(['status' => 0, 'message' => $e->getMessage()], 400);
        }
    }

    /**/
    public function create()
    {
        //
    }

    /**/
    public function store(Request $request)
    {
        //
    }

    /**/
    public function show(string $id)
    {
        //
    }

    /**/
    public function edit(string $id)
    {
        //
    }

    /**/
    public function update(Request $request, string $id)
    {
        //
    }

    /**/
    public function destroy(string $id)
    {
        //
    }
}
