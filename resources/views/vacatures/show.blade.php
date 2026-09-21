<x-layout title="Vacaturebank details">
    <h1>Vacature details</h1>

    <a href="{{ route('vacatures.edit', $vacature->id) }}">Vacature bijwerken</a>

    @if ( session('vacatures_melding') )
        <p>{{ session('vacatures_melding') }}</p>
    @endif

    <hr />

    <h2>{{ $vacature->titel }} @if ( $vacature->fulltime ) (full-time) @endif </h2>
    <p><label>Bedrijf:</label> {{ $vacature->bedrijf?->naam }}</p>
    <p><label>Plaats:</label> {{ $vacature->bedrijf?->plaats }}</p>
    <p><label>Salaris:</label> {{ $vacature->salaris }}</p>
    <p><label>Fulltime:</label> {{ $vacature->fulltime ? "Ja" : "Nee" }}</p>
    <p><label>Omschrijving:</label> {{ $vacature->omschrijving }}</p>

    @if ($vacature->bedrijf?->website)
        <p>
            Website:
            <a href="{{ $vacature->bedrijf->website }}" target="_blank" rel="noopener">
                {{ $vacature->bedrijf->website }}
            </a>
        </p>
    @endif

    <h2>Tags</h2>
    @forelse ($vacature->tags as $tag)
        <span class="tag">{{ $tag->naam }}</span>
    @empty
        <p>Deze vacature heeft geen tags.</p>
    @endforelse
    <hr />
</x-layout>