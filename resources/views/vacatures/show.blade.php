<x-layout title="Vacaturebank details">
    <h1>Vacature details</h1>

    <a href="{{ route('vacatures.edit', $vacature->id) }}">Vacature bijwerken</a>

    @if ( session('vacatures_melding') )
        <p>{{ session('vacatures_melding') }}</p>
    @endif

    <hr />

    <h2>{{ $vacature->titel }} @if ( $vacature->fulltime ) (full-time) @endif </h2>
    <p><label>Bedrijf:</label> {{ $vacature->bedrijf }}</p>
    <p><label>Plaats:</label> {{ $vacature->plaats }}</p>
    <p><label>Fulltime:</label> {{ $vacature->fulltime ? "Ja" : "Nee" }}</p>
    <p><label>Omschrijving:</label> {{ $vacature->omschrijving }}</p>
    <hr />
</x-layout>