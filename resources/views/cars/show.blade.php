<x-app-layout>

<div class="max-w-2xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">{{ $car->brand }} {{ $car->model }}</h1>
    <img src="https://picsum.photos/seed/{{$car->id}}/500/300" alt="Momenteel geen foto beschikbaar." class="mb-4 w-full h-64 object-cover rounded">
    <ul class="mb-4">
        <li><strong>Kenteken:</strong> {{ $car->license_plate }}</li>
        <li><strong>Fabrikant:</strong> {{ $car->brand }}</li>
        <li><strong>Model:</strong> {{ $car->model }}</li>
        <li><strong>Bouwjaar:</strong> {{ $car->production_year }}</li>
        <li><strong>Kleur:</strong> {{ $car->color }}</li>
        <li><strong>Prijs:</strong> €{{ number_format($car->price, 2, ',', '.') }}</li>
        <li><strong>Kilometerstand:</strong> {{ number_format($car->mileage) }} km</li>
        <li><strong>Massa rijklaar:</strong> {{ $car->weight }}</li>
        <li><strong>Stoelen:</strong> {{ $car->seats }}</li>
        <li><strong>Deuren:</strong> {{ $car->doors }}</li>
        <li><strong>Eigenaar:</strong> {{ $car->user->name ?? 'Onbekend' }}</li>
    </ul>
    <div class="mb-4">
        <strong>Tags:</strong>
        @foreach($car->tags as $tag)
            <span style="background: #{{ $tag->color }}; color: {{ $tag->contrast }}" class="inline-block px-2 py-1 rounded mr-2">{{ $tag->name }}</span>
        @endforeach
    </div>
    @if($car->sold_at)
        <div class="text-red-600 font-bold">Verkocht op: {{ $car->sold_at }}</div>
    @endif

    <div class="mt-6">
        <a href="{{ url()->previous() }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 view-button">Terug</a>
</div>

</x-app-layout>
