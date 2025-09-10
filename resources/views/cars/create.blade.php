<x-app-layout>
    <div class="form-container-create">
        <form class="form-group-plate" action="{{ route('cars.create.step1.post') }}" method="POST">
            @csrf
            <label for="license_plate">NL</label>
            <input type="text" name="license_plate" id="license_plate" placeholder="AA-BB-12" required maxlength="8">
            <button type="submit">Go!</button>
        </form>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
