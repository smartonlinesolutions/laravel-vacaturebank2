@props([
    'action',
    'method'   => 'POST',
    'vacature' => null,
])

<form method="POST" action="{{ $action }}">

        @csrf
        @if (strtoupper($method) !== 'POST')
            @method($method)
        @endif

        <div>
            <label for="titel">Titel</label>
            <input id="titel" name="titel" type="text"
                   value="{{ old('titel', $vacature?->titel) }}"
                   @error('titel') aria-invalid="true" aria-describedby="titel-error" @enderror>
            @error('titel')
                <p id="titel-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="bedrijf">Bedrijf</label>
            <input id="bedrijf" name="bedrijf" type="text"
                   value="{{ old('bedrijf', $vacature?->bedrijf) }}"
                   @error('bedrijf') aria-invalid="true" aria-describedby="bedrijf-error" @enderror>
            @error('bedrijf')
                <p id="bedrijf-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="plaats">Plaats</label>
            <input id="plaats" name="plaats" type="text"
                   value="{{ old('plaats', $vacature?->plaats) }}"
                   @error('plaats') aria-invalid="true" aria-describedby="plaats-error" @enderror>
            @error('plaats')
                <p id="plaats-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salaris">Salaris</label>
            <input id="salaris" name="salaris" type="text"
                   value="{{ old('salaris', $vacature?->salaris) }}"
                   @error('salaris') aria-invalid="true" aria-describedby="salaris-error" @enderror>
            @error('salaris')
                <p id="salaris-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="omschrijving">Omschrijving</label>
            <textarea id="omschrijving" name="omschrijving" rows="10">{{ old('omschrijving', $vacature?->omschrijving) }}</textarea>
            @error('omschrijving')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Opslaan</button>
    </form>