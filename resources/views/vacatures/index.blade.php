<x-layout title="Vacaturebank overzicht">
    <h1>Vacaturebank</h1>

    <hr />

    @forelse ($vacatures as $vacature)
        <p>ID: {{ $vacature->id }}</p>
        <h2><a href="{{ route('vacatures.show', $loop->iteration) }}">
                {{ $vacature->titel }} 
                @if ( $vacature->fulltime ) (full-time) @endif 
            </a>
        </h2>
        <p><label>Bedrijf:</label> {{ $vacature->bedrijf }}</p>
        <p><label>Plaats:</label> {{ $vacature->plaats }}</p>
        <p><label>Fulltime:</label> {{ $vacature->fulltime ? "Ja" : "Nee" }}</p>
        <hr />
    @empty
        <p>Nog geen vacatures gevonden.</p>
    @endforelse

    {{ $vacatures->links() }}
</x-layout>