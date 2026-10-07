@extends('layouts.admin')

@section('title', 'Edit Service Area')
@section('page_title', 'Edit Service Area')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900">Edit Destination</h2>
        <a href="{{ route('admin.service-areas.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900">&larr; Back to list</a>
    </div>

    <form action="{{ route('admin.service-areas.update', $serviceArea->id) }}" method="POST" class="space-y-4 text-xs">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="name" class="block font-bold uppercase text-slate-600 mb-1">City / Region Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $serviceArea->name) }}" required class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="distance_from_jaipur" class="block font-bold uppercase text-slate-600 mb-1">Distance &amp; Time from Jaipur</label>
                <input type="text" id="distance_from_jaipur" name="distance_from_jaipur" value="{{ old('distance_from_jaipur', $serviceArea->distance_from_jaipur) }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>
        </div>

        <div>
            <label for="headline" class="block font-bold uppercase text-slate-600 mb-1">Short Headline</label>
            <input type="text" id="headline" name="headline" value="{{ old('headline', $serviceArea->headline) }}" class="w-full text-xs rounded-lg border-slate-300">
        </div>

        <div>
            <label for="description" class="block font-bold uppercase text-slate-600 mb-1">Description *</label>
            <textarea id="description" name="description" rows="3" required class="w-full text-xs rounded-lg border-slate-300">{{ old('description', $serviceArea->description) }}</textarea>
        </div>

        <div>
            <label for="popular_routes" class="block font-bold uppercase text-slate-600 mb-1">Common Routes (1 per line)</label>
            <textarea id="popular_routes" name="popular_routes" rows="3" class="w-full text-xs rounded-lg border-slate-300">{{ old('popular_routes', is_array($serviceArea->popular_routes) ? implode("\n", $serviceArea->popular_routes) : '') }}</textarea>
        </div>

        <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.service-areas.index') }}" class="btn-secondary text-xs px-4 py-2">Cancel</a>
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">Update Area</button>
        </div>
    </form>
</div>
@endsection
