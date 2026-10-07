<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Category;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('sort_order', 'asc')->get();
        $selectedCategory = $request->query('category');
        $minPassengers = $request->query('passengers');

        $query = Vehicle::with('category')->available();

        if ($selectedCategory) {
            $query->whereHas('category', function ($q) use ($selectedCategory) {
                $q->where('slug', $selectedCategory);
            });
        }

        if ($minPassengers) {
            $query->where('seating_capacity', '>=', (int)$minPassengers);
        }

        $vehicles = $query->orderBy('sort_order', 'asc')->paginate(12);

        return view('pages.vehicles.index', compact('vehicles', 'categories', 'selectedCategory', 'minPassengers'));
    }

    public function cars()
    {
        $category = Category::where('slug', 'cars')->firstOrFail();
        $vehicles = Vehicle::where('category_id', $category->id)
            ->available()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('pages.vehicles.category', [
            'category' => $category,
            'vehicles' => $vehicles,
            'pageTitle' => 'Car Rental in Jaipur - Sedans & SUVs with Driver',
            'metaDescription' => 'Browse our fleet of rental cars in Jaipur. Toyota Innova Crysta, Maruti Ertiga, Swift Dzire with experienced commercial chauffeurs.',
        ]);
    }

    public function tempoTravellers()
    {
        $category = Category::where('slug', 'tempo-travellers')->firstOrFail();
        $vehicles = Vehicle::where('category_id', $category->id)
            ->available()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('pages.vehicles.category', [
            'category' => $category,
            'vehicles' => $vehicles,
            'pageTitle' => 'Tempo Traveller Hire in Jaipur - 12 to 26 Seater',
            'metaDescription' => 'Hire 12, 17, 20 & 26 seater luxury tempo travellers in Jaipur with driver. Pushback & 1x1 Maharaja seating for Rajasthan group tours.',
        ]);
    }

    public function buses()
    {
        $category = Category::where('slug', 'buses')->firstOrFail();
        $vehicles = Vehicle::where('category_id', $category->id)
            ->available()
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('pages.vehicles.category', [
            'category' => $category,
            'vehicles' => $vehicles,
            'pageTitle' => 'Bus & Coach Rental in Jaipur - 21 to 45 Seater',
            'metaDescription' => 'Rent 21-seater mini buses and 35-45 seater luxury tourist coaches in Jaipur with commercial drivers. Ideal for corporate events and weddings.',
        ]);
    }

    public function show($slug)
    {
        $vehicle = Vehicle::with('category')->where('slug', $slug)->firstOrFail();

        $relatedVehicles = Vehicle::where('category_id', $vehicle->category_id)
            ->where('id', '!=', $vehicle->id)
            ->available()
            ->take(3)
            ->get();

        return view('pages.vehicles.show', compact('vehicle', 'relatedVehicles'));
    }
}
