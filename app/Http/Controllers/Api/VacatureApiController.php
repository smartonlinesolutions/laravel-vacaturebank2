<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vacature;
use App\Http\Resources\VacatureResource;
use Illuminate\Http\Request;

class VacatureApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacatures = Vacature::with(['bedrijf', 'tags', 'user'])
            ->paginate(10);

        return VacatureResource::collection($vacatures);
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
    public function show(Vacature $vacature)
    {
        return new VacatureResource($vacature->load('bedrijf', 'tags', 'user'));
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
