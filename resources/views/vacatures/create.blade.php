<x-layout titel="Nieuwe vacature">
    <h1>Nieuwe vacature</h1>

    <form method="POST" action="{{ route('vacatures.store') }}">
        <div>
            <label for="titel">Titel</label>
            <input id="titel" name="titel" type="text"
                   value="{{ old('titel') }}"
                   @error('titel') aria-invalid="true" aria-describedby="titel-error" @enderror>
            @error('titel')
                <p id="titel-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="bedrijf">Bedrijf</label>
            <input id="bedrijf" name="bedrijf" type="text"
                   value="{{ old('bedrijf') }}"
                   @error('bedrijf') aria-invalid="true" aria-describedby="bedrijf-error" @enderror>
            @error('bedrijf')
                <p id="bedrijf-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="plaats">Plaats</label>
            <input id="plaats" name="plaats" type="text"
                   value="{{ old('plaats') }}"
                   @error('plaats') aria-invalid="true" aria-describedby="plaats-error" @enderror>
            @error('plaats')
                <p id="plaats-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="salaris">Salaris</label>
            <input id="salaris" name="salaris" type="text"
                   value="{{ old('salaris') }}"
                   @error('salaris') aria-invalid="true" aria-describedby="salaris-error" @enderror>
            @error('salaris')
                <p id="salaris-error" class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="omschrijving">Omschrijving</label>
            <textarea id="omschrijving" name="omschrijving" rows="10">{{ old('omschrijving') }}</textarea>
            @error('omschrijving')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Opslaan</button>
    </form>
</x-layout>