<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ServiceArea;

class ServiceAreaController extends Controller
{
    public function index()
    {
        $serviceAreas = ServiceArea::all();
        return view('admin.service-areas.index', compact('serviceAreas'));
    }

    public function create()
    {
        return view('admin.service-areas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'headline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'distance_from_jaipur' => 'nullable|string|max:100',
            'popular_routes' => 'nullable|string', // newline separated
        ]);

        $area = new ServiceArea();
        $area->name = $validated['name'];
        $area->slug = Str::slug($validated['name']);
        $area->headline = $validated['headline'] ?? null;
        $area->description = $validated['description'];
        $area->distance_from_jaipur = $validated['distance_from_jaipur'] ?? null;
        $area->is_active = $request->boolean('is_active', true);

        if (!empty($validated['popular_routes'])) {
            $routes = array_filter(array_map('trim', explode("\n", $validated['popular_routes'])));
            $area->popular_routes = array_values($routes);
        }

        $area->save();

        return redirect()->route('admin.service-areas.index')->with('success', 'Location added.');
    }

    public function edit($id)
    {
        $serviceArea = ServiceArea::findOrFail($id);
        return view('admin.service-areas.edit', compact('serviceArea'));
    }

    public function update(Request $request, $id)
    {
        $area = ServiceArea::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'headline' => 'nullable|string|max:255',
            'description' => 'required|string',
            'distance_from_jaipur' => 'nullable|string|max:100',
            'popular_routes' => 'nullable|string',
        ]);

        $area->name = $validated['name'];
        $area->headline = $validated['headline'] ?? null;
        $area->description = $validated['description'];
        $area->distance_from_jaipur = $validated['distance_from_jaipur'] ?? null;
        $area->is_active = $request->boolean('is_active');

        if (!empty($validated['popular_routes'])) {
            $routes = array_filter(array_map('trim', explode("\n", $validated['popular_routes'])));
            $area->popular_routes = array_values($routes);
        }

        $area->save();

        return redirect()->route('admin.service-areas.index')->with('success', 'Location updated.');
    }

    public function destroy($id)
    {
        $area = ServiceArea::findOrFail($id);
        $area->delete();

        return redirect()->route('admin.service-areas.index')->with('success', 'Location deleted.');
    }
}
