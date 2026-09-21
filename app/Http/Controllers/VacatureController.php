<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacature;
use App\Http\Requests\StoreVacancyRequest;

class VacatureController extends Controller
{
    private $vacatures = [
        [
            'titel' => 'Back-end Developer',
            'bedrijf' => 'Acato',
            'plaats' => 'Utrecht',
            'fulltime' => true,
            'omschrijving' => '<strong>Let op</strong><script>alert("xss")</script>',
        ], 
        [
            'titel' => 'Front-end Developer',
            'bedrijf' => 'Acato',
            'plaats' => 'Utrecht',
            'fulltime' => false,
            'omschrijving' => ''
        ], 
        [
            'titel' => 'Laravel Trainer',
            'bedrijf' => 'Global Training',
            'plaats' => 'Deventer',
            'fulltime' => false,
            'omschrijving' => ''
        ], 
        [
            'titel' => 'Projectmanager',
            'bedrijf' => 'Sumedia',
            'plaats' => 'Arnhem',
            'fulltime' => true,
            'omschrijving' => ''
        ], 
        [
            'titel' => 'Back-end Developer',
            'bedrijf' => 'Sumedia',
            'plaats' => 'Arnhem',
            'fulltime' => true,
            'omschrijving' => ''
        ], 
    ];

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $zoek = $request->query('search');

        $vacatures = Vacature::when($zoek, fn ($q) => $q->where('titel', 'like', "%{$zoek}%"))->with('bedrijf')->paginate(10);
        $vacatures->appends(['search' => $zoek]);
        return view('vacatures.index')->with( 'vacatures', $vacatures );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacatures.create', [
            'vacature'    => new Vacature()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request)
    {
        $vacature = Vacature::create($request->validated());

        session(['vacatures_melding' => 'Vacature aangemaakt']);    

        return redirect()
            ->route('vacatures.show', $vacature);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacature $vacature)
    {
        abort_if(! $vacature, 404);

        $vacature->load('bedrijf');

        return view('vacatures.show')->with( 'vacature', $vacature );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacature $vacature)
    {
        return view('vacatures.edit', [
            'vacature' => $vacature
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreVacancyRequest $request, int $id)
    {
        $vacature = Vacature::findOrFail($id);
        $vacature->update($request->validated());

        session(['vacatures_melding' => 'Vacature geupdate']);    

        return redirect()
            ->route('vacatures.show', $vacature);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vacature = Vacature::findOrFail($id);
        $vacature->delete();

        session(['vacatures_melding' => 'Vacature verwijderd']);    

        return redirect()
            ->route('vacatures.index');
    }
}
