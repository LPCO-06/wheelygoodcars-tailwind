<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    public function index()
    {
        $cars = Car::all();
        $cars->load('tags', 'user');

        // Lees alle auto's
        foreach ($cars as $car) {
            // Voeg contrastkleur toe aan elke tag
            foreach ($car->tags as $tag) {
                // Verwijder '#' als die er is
                $hex = ltrim($tag->color, '#');

                // Converteer naar RGB
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));

                // Bereken helderheid
                $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;

                // Als helder, gebruik zwarte tekst; als donker, gebruik witte tekst
                $tag->contrast = $brightness > 128 ? '#000000' : '#FFFFFF';
            }
        }

        return view('welcome', compact('cars'));
    }

    public function myCars()
    {
        $userId = auth()->id();

        $cars = Car::where('user_id', $userId)->get();

        return view('offers', compact('cars'));
    }

    /**
     * Toon het formulier voor de eerste stap.
     */
    public function create()
    {
        return view('cars.create');
    }

    public function destroy(Car $car)
    {
        if ($car->user_id !== auth()->id()) {
            abort(403);
        }
        $car->delete();
        return redirect()->route('offers')->with('success', 'Auto verwijderd!');
    }

    /**
     * Verwerk de eerste stap van het formulier (kenteken).
     */
    public function createStep1()
    {
        return view('cars.create');
    }

    public function postStep1(Request $request)
    {
        $request->validate([
            'license_plate' => 'required|max:8',
        ]);
        session(['car.license_plate' => $request->license_plate]);
        return redirect()->route('cars.create.step2');
    }

    public function createStep2()
    {
        if (!session()->has('car.license_plate')) {
            return redirect()->route('cars.create.step1')->withErrors('Vul eerst het kenteken in.');
        }
        $carData = [
            'license_plate' => session('car.license_plate')
        ];
        return view('cars.details', compact('carData'));
    }

    public function postStep2(Request $request)
    {
        if (!session()->has('car.license_plate')){
        return redirect()->route('cars.create.step1')->withErrors('Vul eerst het kenteken in.');
        }

        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'seats' => 'required|integer',
            'doors' => 'required|integer',
            'weight' => 'required|integer',
            'production_year' => 'required|integer',
            'color' => 'required',
            'mileage' => 'required|integer',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        $car = new Car();
        $car->license_plate = session('car.license_plate');
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->seats = $request->seats;
        $car->doors = $request->doors;
        $car->weight = $request->weight;
        $car->production_year = $request->production_year;
        $car->color = $request->color;
        $car->mileage = $request->mileage;
        $car->price = $request->price;

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->user_id = auth()->id();
        $car->save();

        session()->forget('car.license_plate');
        return redirect()->route('home')->with('success', 'Auto succesvol toegevoegd!');
    }

    public function show(Car $car)
    {
        // Laad tags en eigenaar mee
        $car->load('tags', 'user');

        // Add contrast color to each tag
        foreach ($car->tags as $tag) {
        // Remove '#' if present
        $hex = ltrim($tag->color, '#');
        // Convert to RGB
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
        // Calculate brightness
        $brightness = ($r * 299 + $g * 587 + $b * 114) / 1000;
        // If bright, use black text; if dark, use white text
        $tag->contrast = $brightness > 128 ? '#000000' : '#FFFFFF';
    }
        return view('cars.show', compact('car'));
    }
}
