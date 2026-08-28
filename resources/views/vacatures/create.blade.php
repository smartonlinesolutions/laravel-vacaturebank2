<x-layout titel="Nieuwe vacature">
    <h1>Nieuwe vacature</h1>

    @include('vacatures._formulier', [
        'action'   => route('vacatures.store'),
        'method'   => 'POST',
        'vacature' => $vacature,
    ])
</x-layout>