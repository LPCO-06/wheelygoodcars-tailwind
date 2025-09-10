<x-app-layout>

<h1>Mijn aanbod</h1>

@if ($cars->isEmpty())
    <p>U heeft op dit moment geen auto's te koop staan.</p>
@else
    <div class="car-list">
        @foreach ($cars as $car)
            <div class="car-item">
                <div class="car-info-wrapper">
                    <div class="car-image">
                        @if ($car->image)
                            <img src="{{ asset('storage/' . $car->image) }}" alt="100 x 100" style="max-width: 300px;">
                        @else
                            <p>Geen afbeelding beschikbaar</p>
                        @endif
                    </div>

                    <div class="status-wrapper">
                        <span>{{ $car->license_plate }}</span>
                        <span class="status-text">{{ $car->sold_at ? 'Verkocht' : 'Te koop' }}</span>
                    </div>

                    <div class="car-details">
                        <span></span>
                        <span>€{{ number_format($car->price, 2, ',', '.') }}</span>
                        <span>{{ $car->brand }} {{ $car->model }}</span>
                    </div>

                    <div class="car-tags">
                        <span class="tag">tag</span>
                        <span class="tag">tag</span>
                        <span class="tag">tag</span>
                    </div>

                    <div class="car-actions">
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                            <button type="submit" style="background-color: red;" class="text-white px-3 py-2 rounded mt-2">
                                Verwijderen
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

</x-app-layout>
