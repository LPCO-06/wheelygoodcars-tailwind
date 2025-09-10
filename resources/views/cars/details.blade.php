<x-app-layout>

    <div class="form-container-grid">

    <form action="{{ route('cars.create.step2.post') }}" method="POST" enctype="multipart/form-data">
            @csrf

<div class="parent">
    <div class="div1">
        <h1>Nieuw aanbod</h1>
        <div class="form-group">
            <label class="plate-text" for="license_plate">NL</label>
            <input type="text" name="license_plate" id="license_plate" class="form-control" value="{{ $carData['license_plate'] }}" required maxlength="8">
        </div>
    </div>
    <div class="div2">
        <div class="form-group">
            <label for="brand">Merk:</label>
            <input type="text" name="brand" id="brand" class="form-control">
        </div>
    </div>
    <div class="div3">
        <div class="form-group">
            <label for="model">Model:</label>
            <input type="text" name="model" id="model" class="form-control">
        </div>
    </div>
    <div class="div4">
        <div class="form-group">
            <label for="seats">Zitplaatsen:</label>
            <input type="text" name="seats" id="seats" class="form-control">
        </div>
    </div>
    <div class="div5">
        <div class="form-group">
            <label for="doors">Aantal deuren:</label>
            <input type="text" name="doors" id="doors" class="form-control">
        </div>
    </div>
    <div class="div6">
        <div class="form-group">
            <label for="weight">Massa rijklaar:</label>
            <input type="text" name="weight" id="weight" class="form-control">
        </div>
    </div>
    <div class="div7">
        <div class="form-group">
            <label for="production_year">Jaar van productie:</label>
            <input type="text" name="production_year" id="production_year" class="form-control">
        </div>
    </div>
    <div class="div8">
        <div class="form-group">
            <label for="color">Kleur:</label>
            <input type="text" name="color" id="color" class="form-control">
        </div>
    </div>
    <div class="div10">
        <div class="form-group">
            <label for="mileage">Kilometerafstand:</label>
            <input type="text" name="mileage" id="mileage" class="form-control">
            <p>km</p>
        </div>
    </div>
    <div class="div11">
        <div class="form-group">
            <label for="price">Vraagprijs</label>
            <p>(€):</p>
            <input type="number" name="price" id="price" class="form-control" required>
        </div>
    </div>
    <div class="div12">
        <div class="form-group">
            <label for="image">Kies afbeelding:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
    </div>
    <div class="div13">
        <button type="submit" class="btn btn-primary finish-button">Aanbod afronden</button>
        <button onclick="printPageToPdf()" class="print-button">Print Informatie</button>
    </div>
</div>



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

<script>

function printPageToPdf() {
  window.print();
}

</script>
