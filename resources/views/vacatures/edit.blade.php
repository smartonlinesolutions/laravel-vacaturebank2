<x-layout titel="Edit vacature">
    <h1>Vacature bijwerken</h1>

    @include('vacatures._formulier', [
        'action'   => route('vacatures.update', $vacature->id),
        'method'   => 'PUT',
        'vacature' => $vacature,
    ])
</x-layout>