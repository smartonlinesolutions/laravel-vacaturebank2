<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vacature;
use App\Models\Bedrijf;
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

        $vacatures = Vacature::when($zoek, fn ($q) => $q->where('titel', 'like', "%{$zoek}%"))->with('bedrijf','tags')->paginate(10);
        $vacatures->appends(['search' => $zoek]);
        return view('vacatures.index')->with( 'vacatures', $vacatures );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bedrijven = Bedrijf::orderBy('naam')->get();

        return view('vacatures.create', [
            'vacature'    => new Vacature(),
            'bedrijven'   => $bedrijven
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request)
    {
        $data = $request->validated();

        $vacature = $request->user()
            ->vacatures()
            ->create($data);

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

        $vacature->load('bedrijf', 'tags', 'user');

        return view('vacatures.show')->with( 'vacature', $vacature );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacature $vacature)
    {
        $bedrijven = Bedrijf::orderBy('naam')->get();

        return view('vacatures.edit', [
            'vacature'  => $vacature,
            'bedrijven' => $bedrijven
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
