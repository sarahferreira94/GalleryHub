<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/owner",
     *     tags={"Owners"},
     *     summary="Get a list of owners",
     *     description="Returns a list of owners matching the provided key",
     *     @OA\Parameter(
     *         name="key",
     *         in="query",
     *         required=false,
     *         description="Search key for filtering owners by name",
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=400, description="Bad request")
     * )
     */
    public function index(request $request)
    {
        try {

            $key = $request->key;

            $owners = Owner::where('name','LIKE','%'.$key.'%')->get();

            return response()->json($owners,200);

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
