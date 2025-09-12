<x-app-layout>

<h1>Alle auto's</h1>

@if ($cars->isEmpty())
    <p>Er zijn op dit moment geen auto's te koop.</p>
@else
    <div class="car-list">
        @foreach ($cars as $car)
            <div class="car-item">
                <div class="car-info-wrapper">
                    <div class="car-image">
                        @if ($car->image)
                            <img src="https://picsum.photos/seed/{{$car->id}}/100" alt="100 x 100" style="max-width: 300px;">
                        @else
                            <p>Geen afbeelding beschikbaar</p>
                        @endif
                    </div>

                    <div class="status-wrapper">
                        <span>{{ $car->license_plate }}</span>
                        @if ($car->sold_at)
                            <span class="status-text-sold">Verkocht</span>
                        @else
                            <span class="status-text">Te koop</span>
                        @endif
                    </div>

                    <div class="car-details">
                        <span></span>
                        <span>€{{ number_format($car->price, 2, ',', '.') }}</span>
                        <span>{{ $car->brand }} {{ $car->model }}</span>
                    </div>

                    <div class="car-tags">
                        @foreach($car->tags as $tag)
                            <span class="tag" style="background: #{{ $tag->color }}; color: {{ $tag->contrast }}" class="inline-block px-2 py-1 rounded mr-2">{{ $tag->name }}</span>
                        @endforeach
                    </div>

                    <div class="car-actions">
                        <a href="{{ route('cars.show', $car->id) }}" class="px-3 py-2 rounded mt-2 view-button">
                            Bekijk details
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

</x-app-layout>
