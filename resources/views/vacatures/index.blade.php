<x-layout title="Vacaturebank overzicht">
    <h1>Vacaturebank</h1>

    @if ( session('vacatures_melding') )
        <p>{{ session('vacatures_melding') }}</p>
    @endif

    <form method="GET" action="">
        <input type="text" value="{{ request('search') }}" name="search" />
        <button type="submit">Zoeken</button>
    </form>

    <hr />

    @forelse ($vacatures as $vacature)
        <p>ID: {{ $vacature->id }}</p>
        <h2><a href="{{ route('vacatures.show', $vacature->id) }}">
                {{ $vacature->titel }} 
                @if ( $vacature->fulltime ) (full-time) @endif 
            </a>
        </h2>
        <p><label>Bedrijf:</label> {{ $vacature->bedrijf?->naam }}</p>
        <p><label>Plaats:</label> {{ $vacature->bedrijf?->plaats }}</p>
        <p><label>Salaris:</label> {{ $vacature->salaris }}</p>
        <p><label>Fulltime:</label> {{ $vacature->fulltime ? "Ja" : "Nee" }}</p>
        <div class="delete">
            <form method="POST" action="{{ route('vacatures.destroy',$vacature->id) }}"
                onsubmit="return confirm('Wil je deze vacature verwijderen?')">
                @csrf
                @method('DELETE')
                <button type="submit">Verwijder</button>
            </form>
        </div>
        <hr />
    @empty
        <p>Nog geen vacatures gevonden.</p>
    @endforelse

    {{ $vacatures->links() }}
</x-layout>