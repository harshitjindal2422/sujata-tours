@extends('layouts.admin')

@section('title', 'Manage Service Areas')
@section('page_title', 'Rajasthan & Regional Service Areas')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Configure key Rajasthan cities and outstation destinations shown on the website.</p>
        <a href="{{ route('admin.service-areas.create') }}" class="btn-primary text-xs px-4 py-2.5">
            + Add Area
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-600 uppercase tracking-wider font-bold border-b border-slate-200">
                <tr>
                    <th class="p-4">Destination</th>
                    <th class="p-4">Distance from Jaipur</th>
                    <th class="p-4">Headline</th>
                    <th class="p-4">Popular Routes</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($serviceAreas as $area)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="p-4 font-bold text-navy-900">
                            {{ $area->name }}
                            <span class="text-[10px] text-slate-400 block">/{{ $area->slug }}</span>
                        </td>
                        <td class="p-4 font-semibold text-slate-700">
                            {{ $area->distance_from_jaipur }}
                        </td>
                        <td class="p-4 text-slate-600 max-w-xs">
                            <p class="truncate">{{ $area->headline }}</p>
                        </td>
                        <td class="p-4 text-slate-500 text-[11px]">
                            @if($area->popular_routes)
                                {{ implode(', ', array_slice($area->popular_routes, 0, 2)) }}
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <a href="{{ route('admin.service-areas.edit', $area->id) }}" class="btn-secondary text-xs px-2.5 py-1">Edit</a>
                            <form action="{{ route('admin.service-areas.destroy', $area->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this area?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 font-bold hover:underline ml-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-400">No service areas logged.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
