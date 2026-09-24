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
            <label for="bedrijf_id">Bedrijf</label>
            <select name="bedrijf_id" id="bedrijf_id">
                <option value="">-- Kies een bedrijf --</option>
                @foreach ($bedrijven as $bedrijf)
                    <option
                        value="{{ $bedrijf->id }}"
                        @selected(old('bedrijf_id', $vacature->bedrijf_id ?? null) == $bedrijf->id)
                    >
                        {{ $bedrijf->naam }} ({{ $bedrijf->plaats }})
                    </option>
                @endforeach
            </select>

            @error('bedrijf_id')
                <p class="text-red-600">{{ $message }}</p>
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