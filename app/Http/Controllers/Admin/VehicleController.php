<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Vehicle;
use App\Models\Category;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::with('category')->orderBy('sort_order', 'asc')->paginate(15);
        return view('admin.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.vehicles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'short_tagline' => 'nullable|string|max:255',
            'seating_capacity' => 'required|integer|min:1|max:70',
            'ac_type' => 'required|string|max:100',
            'luggage_capacity' => 'nullable|string|max:150',
            'fuel_type' => 'required|string|max:50',
            'driver_included' => 'boolean',
            'local_availability' => 'boolean',
            'outstation_availability' => 'boolean',
            'starting_price' => 'nullable|string|max:100',
            'price_per_km' => 'nullable|numeric|min:0',
            'local_package_rate' => 'nullable|string|max:100',
            'outstation_min_km' => 'nullable|integer',
            'driver_allowance_per_day' => 'nullable|integer',
            'description' => 'required|string',
            'features' => 'nullable|string', // newline separated
            'ideal_for' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
            'image_url' => 'nullable|string|max:255',
        ]);

        $category = Category::findOrFail($validated['category_id']);

        $vehicle = new Vehicle();
        $vehicle->name = $validated['name'];
        $vehicle->slug = Str::slug($validated['name']);
        // Ensure unique slug
        $count = Vehicle::where('slug', 'like', "{$vehicle->slug}%")->count();
        if ($count > 0) {
            $vehicle->slug = $vehicle->slug . '-' . ($count + 1);
        }

        $vehicle->category_id = $category->id;
        $vehicle->category_slug = $category->slug;
        $vehicle->short_tagline = $validated['short_tagline'] ?? null;
        $vehicle->seating_capacity = $validated['seating_capacity'];
        $vehicle->ac_type = $validated['ac_type'];
        $vehicle->luggage_capacity = $validated['luggage_capacity'] ?? null;
        $vehicle->fuel_type = $validated['fuel_type'];
        $vehicle->driver_included = $request->boolean('driver_included', true);
        $vehicle->local_availability = $request->boolean('local_availability', true);
        $vehicle->outstation_availability = $request->boolean('outstation_availability', true);
        $vehicle->starting_price = $validated['starting_price'] ?? null;
        $vehicle->price_per_km = $validated['price_per_km'] ?? null;
        $vehicle->local_package_rate = $validated['local_package_rate'] ?? null;
        $vehicle->outstation_min_km = $validated['outstation_min_km'] ?? 250;
        $vehicle->driver_allowance_per_day = $validated['driver_allowance_per_day'] ?? 400;
        $vehicle->description = $validated['description'];
        $vehicle->ideal_for = $validated['ideal_for'] ?? null;
        $vehicle->status = $validated['status'];
        $vehicle->is_featured = $request->boolean('is_featured', true);
        $vehicle->sort_order = $validated['sort_order'] ?? 0;

        // Process features
        if (!empty($validated['features'])) {
            $featuresList = array_filter(array_map('trim', explode("\n", $validated['features'])));
            $vehicle->features = array_values($featuresList);
        }

        // Process image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('fleet', 'public');
            $vehicle->image = '/storage/' . $path;
        } elseif (!empty($validated['image_url'])) {
            $vehicle->image = $validated['image_url'];
        } else {
            $vehicle->image = '/images/fleet/toyota-innova-crysta.jpg';
        }

        $vehicle->save();

        return redirect()->route('admin.vehicles.index')->with('success', "Vehicle '{$vehicle->name}' created successfully.");
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $categories = Category::all();
        return view('admin.vehicles.edit', compact('vehicle', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'category_id' => 'required|exists:categories,id',
            'short_tagline' => 'nullable|string|max:255',
            'seating_capacity' => 'required|integer|min:1|max:70',
            'ac_type' => 'required|string|max:100',
            'luggage_capacity' => 'nullable|string|max:150',
            'fuel_type' => 'required|string|max:50',
            'starting_price' => 'nullable|string|max:100',
            'price_per_km' => 'nullable|numeric|min:0',
            'local_package_rate' => 'nullable|string|max:100',
            'outstation_min_km' => 'nullable|integer',
            'driver_allowance_per_day' => 'nullable|integer',
            'description' => 'required|string',
            'features' => 'nullable|string',
            'ideal_for' => 'nullable|string|max:255',
            'status' => 'required|in:available,unavailable',
            'sort_order' => 'integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        $category = Category::findOrFail($validated['category_id']);

        $vehicle->name = $validated['name'];
        $vehicle->category_id = $category->id;
        $vehicle->category_slug = $category->slug;
        $vehicle->short_tagline = $validated['short_tagline'] ?? null;
        $vehicle->seating_capacity = $validated['seating_capacity'];
        $vehicle->ac_type = $validated['ac_type'];
        $vehicle->luggage_capacity = $validated['luggage_capacity'] ?? null;
        $vehicle->fuel_type = $validated['fuel_type'];
        $vehicle->driver_included = $request->boolean('driver_included');
        $vehicle->local_availability = $request->boolean('local_availability');
        $vehicle->outstation_availability = $request->boolean('outstation_availability');
        $vehicle->starting_price = $validated['starting_price'] ?? null;
        $vehicle->price_per_km = $validated['price_per_km'] ?? null;
        $vehicle->local_package_rate = $validated['local_package_rate'] ?? null;
        $vehicle->outstation_min_km = $validated['outstation_min_km'] ?? 250;
        $vehicle->driver_allowance_per_day = $validated['driver_allowance_per_day'] ?? 400;
        $vehicle->description = $validated['description'];
        $vehicle->ideal_for = $validated['ideal_for'] ?? null;
        $vehicle->status = $validated['status'];
        $vehicle->is_featured = $request->boolean('is_featured');
        $vehicle->sort_order = $validated['sort_order'] ?? 0;

        if (!empty($validated['features'])) {
            $featuresList = array_filter(array_map('trim', explode("\n", $validated['features'])));
            $vehicle->features = array_values($featuresList);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('fleet', 'public');
            $vehicle->image = '/storage/' . $path;
        }

        $vehicle->save();

        return redirect()->route('admin.vehicles.index')->with('success', "Vehicle '{$vehicle->name}' updated successfully.");
    }

    public function toggleStatus($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->status = $vehicle->status === 'available' ? 'unavailable' : 'available';
        $vehicle->save();

        return back()->with('success', "Status for '{$vehicle->name}' changed to {$vehicle->status}.");
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $name = $vehicle->name;
        $vehicle->delete();

        return redirect()->route('admin.vehicles.index')->with('success', "Vehicle '{$name}' removed.");
    }
}
