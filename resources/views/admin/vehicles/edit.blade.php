@extends('layouts.admin')

@section('title', 'Edit ' . $vehicle->name)
@section('page_title', 'Edit Vehicle: ' . $vehicle->name)

@section('content')
<div class="max-w-4xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-slate-900">Update Specifications</h2>
            <p class="text-xs text-slate-500">Edit details for {{ $vehicle->name }}.</p>
        </div>
        <a href="{{ route('admin.vehicles.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900">
            &larr; Back to fleet
        </a>
    </div>

    <form action="{{ route('admin.vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs">
            <div>
                <label for="name" class="block font-bold uppercase text-slate-600 mb-1">Vehicle Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $vehicle->name) }}" required
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="category_id" class="block font-bold uppercase text-slate-600 mb-1">Category *</label>
                <select id="category_id" name="category_id" required class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $vehicle->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="short_tagline" class="block font-bold uppercase text-slate-600 mb-1">Tagline</label>
                <input type="text" id="short_tagline" name="short_tagline" value="{{ old('short_tagline', $vehicle->short_tagline) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="seating_capacity" class="block font-bold uppercase text-slate-600 mb-1">Seating Capacity (Pax) *</label>
                <input type="number" id="seating_capacity" name="seating_capacity" value="{{ old('seating_capacity', $vehicle->seating_capacity) }}" min="1" max="70" required
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="ac_type" class="block font-bold uppercase text-slate-600 mb-1">AC Type *</label>
                <input type="text" id="ac_type" name="ac_type" value="{{ old('ac_type', $vehicle->ac_type) }}" required
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="luggage_capacity" class="block font-bold uppercase text-slate-600 mb-1">Luggage Capacity</label>
                <input type="text" id="luggage_capacity" name="luggage_capacity" value="{{ old('luggage_capacity', $vehicle->luggage_capacity) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="fuel_type" class="block font-bold uppercase text-slate-600 mb-1">Fuel Type *</label>
                <input type="text" id="fuel_type" name="fuel_type" value="{{ old('fuel_type', $vehicle->fuel_type) }}" required
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="starting_price" class="block font-bold uppercase text-slate-600 mb-1">Display Starting Price</label>
                <input type="text" id="starting_price" name="starting_price" value="{{ old('starting_price', $vehicle->starting_price) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="price_per_km" class="block font-bold uppercase text-slate-600 mb-1">Base Rate Per KM (₹)</label>
                <input type="number" step="0.5" id="price_per_km" name="price_per_km" value="{{ old('price_per_km', $vehicle->price_per_km) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="local_package_rate" class="block font-bold uppercase text-slate-600 mb-1">Local Package Rate</label>
                <input type="text" id="local_package_rate" name="local_package_rate" value="{{ old('local_package_rate', $vehicle->local_package_rate) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="driver_allowance_per_day" class="block font-bold uppercase text-slate-600 mb-1">Driver Allowance/Day (₹)</label>
                <input type="number" id="driver_allowance_per_day" name="driver_allowance_per_day" value="{{ old('driver_allowance_per_day', $vehicle->driver_allowance_per_day) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="status" class="block font-bold uppercase text-slate-600 mb-1">Status *</label>
                <select id="status" name="status" class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
                    <option value="available" {{ $vehicle->status === 'available' ? 'selected' : '' }}>Available (Active in Fleet)</option>
                    <option value="unavailable" {{ $vehicle->status === 'unavailable' ? 'selected' : '' }}>Unavailable</option>
                </select>
            </div>

            <div>
                <label for="sort_order" class="block font-bold uppercase text-slate-600 mb-1">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $vehicle->sort_order) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div class="sm:col-span-2">
                <label for="ideal_for" class="block font-bold uppercase text-slate-600 mb-1">Ideal For</label>
                <input type="text" id="ideal_for" name="ideal_for" value="{{ old('ideal_for', $vehicle->ideal_for) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block font-bold uppercase text-slate-600 mb-1">Description *</label>
                <textarea id="description" name="description" rows="4" required class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">{{ old('description', $vehicle->description) }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="features" class="block font-bold uppercase text-slate-600 mb-1">Included Amenities (1 per line)</label>
                <textarea id="features" name="features" rows="4" 
                          class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">{{ old('features', is_array($vehicle->features) ? implode("\n", $vehicle->features) : '') }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="image" class="block font-bold uppercase text-slate-600 mb-1">Change Vehicle Photo</label>
                @if($vehicle->image)
                    <div class="mb-2 flex items-center gap-3">
                        <img src="{{ asset($vehicle->image) }}" alt="{{ $vehicle->name }}" class="w-20 h-14 object-cover rounded border">
                        <span class="text-xs text-slate-500">Current photo: {{ $vehicle->image }}</span>
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/*" class="w-full text-xs border border-slate-300 rounded-lg p-2 bg-slate-50">
            </div>
        </div>

        <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
            <a href="{{ route('admin.vehicles.index') }}" class="btn-secondary text-xs px-4 py-2">
                Cancel
            </a>
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">
                Update Vehicle
            </button>
        </div>
    </form>
</div>
@endsection
