@extends('layouts.admin')

@section('title', 'Add New Vehicle')
@section('page_title', 'Add New Vehicle to Fleet')

@section('content')
<div class="max-w-4xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200 flex items-center justify-between">
        <div>
            <h2 class="text-lg font-bold text-slate-900">Vehicle Profile &amp; Specifications</h2>
            <p class="text-xs text-slate-500">Configure vehicle metadata, capacity, pricing, and upload an image.</p>
        </div>
        <a href="{{ route('admin.vehicles.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900">
            &larr; Back to fleet
        </a>
    </div>

    <form action="{{ route('admin.vehicles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 text-xs">
            <div>
                <label for="name" class="block font-bold uppercase text-slate-600 mb-1">Vehicle Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Force Urbania 12 Seater"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="category_id" class="block font-bold uppercase text-slate-600 mb-1">Category *</label>
                <select id="category_id" name="category_id" required class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="sm:col-span-2">
                <label for="short_tagline" class="block font-bold uppercase text-slate-600 mb-1">Tagline</label>
                <input type="text" id="short_tagline" name="short_tagline" value="{{ old('short_tagline') }}" placeholder="e.g. Luxury Maharaja 1x1 Recliners for Rajasthan Circuits"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="seating_capacity" class="block font-bold uppercase text-slate-600 mb-1">Seating Capacity (Pax) *</label>
                <input type="number" id="seating_capacity" name="seating_capacity" value="{{ old('seating_capacity', 7) }}" min="1" max="70" required
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="ac_type" class="block font-bold uppercase text-slate-600 mb-1">AC Type *</label>
                <input type="text" id="ac_type" name="ac_type" value="{{ old('ac_type', 'Air Conditioned (Dual AC)') }}" required
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="luggage_capacity" class="block font-bold uppercase text-slate-600 mb-1">Luggage Capacity</label>
                <input type="text" id="luggage_capacity" name="luggage_capacity" value="{{ old('luggage_capacity', '4 Large Bags + 2 Small Bags') }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="fuel_type" class="block font-bold uppercase text-slate-600 mb-1">Fuel Type *</label>
                <input type="text" id="fuel_type" name="fuel_type" value="{{ old('fuel_type', 'Diesel') }}" required
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="starting_price" class="block font-bold uppercase text-slate-600 mb-1">Display Starting Price</label>
                <input type="text" id="starting_price" name="starting_price" value="{{ old('starting_price', '₹16 / km') }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="price_per_km" class="block font-bold uppercase text-slate-600 mb-1">Base Rate Per KM (₹)</label>
                <input type="number" step="0.5" id="price_per_km" name="price_per_km" value="{{ old('price_per_km', 16) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="local_package_rate" class="block font-bold uppercase text-slate-600 mb-1">Local Package Rate</label>
                <input type="text" id="local_package_rate" name="local_package_rate" value="{{ old('local_package_rate', '₹2,600 (8h / 80km)') }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="driver_allowance_per_day" class="block font-bold uppercase text-slate-600 mb-1">Driver Allowance/Day (₹)</label>
                <input type="number" id="driver_allowance_per_day" name="driver_allowance_per_day" value="{{ old('driver_allowance_per_day', 400) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div>
                <label for="status" class="block font-bold uppercase text-slate-600 mb-1">Status *</label>
                <select id="status" name="status" class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
                    <option value="available">Available (Active in Fleet)</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>

            <div>
                <label for="sort_order" class="block font-bold uppercase text-slate-600 mb-1">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 1) }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div class="sm:col-span-2">
                <label for="ideal_for" class="block font-bold uppercase text-slate-600 mb-1">Ideal For</label>
                <input type="text" id="ideal_for" name="ideal_for" value="{{ old('ideal_for', 'Family vacations, corporate transfers, Jaipur to Udaipur trips') }}"
                       class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
            </div>

            <div class="sm:col-span-2">
                <label for="description" class="block font-bold uppercase text-slate-600 mb-1">Description *</label>
                <textarea id="description" name="description" rows="4" required class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">{{ old('description') }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="features" class="block font-bold uppercase text-slate-600 mb-1">Included Amenities (1 per line)</label>
                <textarea id="features" name="features" rows="4" placeholder="Reclining seats&#10;Dual AC blowers&#10;USB mobile charging ports&#10;Generous luggage space"
                          class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">{{ old('features') }}</textarea>
            </div>

            <div class="sm:col-span-2">
                <label for="image" class="block font-bold uppercase text-slate-600 mb-1">Upload Vehicle Photo</label>
                <input type="file" id="image" name="image" accept="image/*" class="w-full text-xs border border-slate-300 rounded-lg p-2 bg-slate-50">
                <p class="text-[11px] text-slate-400 mt-1">Accepts JPG, PNG, WebP up to 4MB.</p>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-200 flex items-center justify-end gap-3">
            <a href="{{ route('admin.vehicles.index') }}" class="btn-secondary text-xs px-4 py-2">
                Cancel
            </a>
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">
                Save Vehicle
            </button>
        </div>
    </form>
</div>
@endsection
