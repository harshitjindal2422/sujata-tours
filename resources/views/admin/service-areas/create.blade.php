@extends('layouts.admin')

@section('title', 'Add Service Area')
@section('page_title', 'Add Service Area')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900">Add Destination / City</h2>
        <a href="{{ route('admin.service-areas.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900">&larr; Back to list</a>
    </div>

    <form action="{{ route('admin.service-areas.store') }}" method="POST" class="space-y-4 text-xs">
        @csrf

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="name" class="block font-bold uppercase text-slate-600 mb-1">City / Region Name *</label>
                <input type="text" id="name" name="name" required class="w-full text-xs rounded-lg border-slate-300" placeholder="e.g. Mount Abu">
            </div>

            <div>
                <label for="distance_from_jaipur" class="block font-bold uppercase text-slate-600 mb-1">Distance &amp; Time from Jaipur</label>
                <input type="text" id="distance_from_jaipur" name="distance_from_jaipur" placeholder="e.g. 495 Kms (8 Hours)" class="w-full text-xs rounded-lg border-slate-300">
            </div>
        </div>

        <div>
            <label for="headline" class="block font-bold uppercase text-slate-600 mb-1">Short Headline</label>
            <input type="text" id="headline" name="headline" placeholder="e.g. Hill Station Tours & Dilwara Temple Transfers" class="w-full text-xs rounded-lg border-slate-300">
        </div>

        <div>
            <label for="description" class="block font-bold uppercase text-slate-600 mb-1">Description *</label>
            <textarea id="description" name="description" rows="3" required class="w-full text-xs rounded-lg border-slate-300" placeholder="Describe fleet services to this destination..."></textarea>
        </div>

        <div>
            <label for="popular_routes" class="block font-bold uppercase text-slate-600 mb-1">Common Routes (1 per line)</label>
            <textarea id="popular_routes" name="popular_routes" rows="3" class="w-full text-xs rounded-lg border-slate-300" placeholder="Jaipur to Mount Abu One-way&#10;Udaipur – Mount Abu Circuit"></textarea>
        </div>

        <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.service-areas.index') }}" class="btn-secondary text-xs px-4 py-2">Cancel</a>
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">Save Area</button>
        </div>
    </form>
</div>
@endsection
