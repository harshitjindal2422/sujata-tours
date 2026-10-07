@extends('layouts.admin')

@section('title', 'Manage Fleet Vehicles')
@section('page_title', 'Vehicle Fleet Management')

@section('content')
<div class="space-y-6">

    <div class="flex items-center justify-between">
        <div>
            <p class="text-xs text-slate-500">Configure vehicles, passenger capacities, pricing, and availability states.</p>
        </div>
        <a href="{{ route('admin.vehicles.create') }}" class="btn-primary text-xs px-4 py-2.5 shadow-sm">
            + Add New Vehicle
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="p-4">Vehicle</th>
                        <th class="p-4">Category</th>
                        <th class="p-4">Capacity</th>
                        <th class="p-4">AC Type</th>
                        <th class="p-4">Rate Structure</th>
                        <th class="p-4">Availability</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($vehicles as $v)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $v->image ?: asset('images/fleet/toyota-innova-crysta.jpg') }}" 
                                         alt="{{ $v->name }}" 
                                         class="w-12 h-9 object-cover rounded-md border border-slate-200 flex-shrink-0">
                                    <div>
                                        <a href="{{ route('vehicles.show', $v->slug) }}" target="_blank" class="font-bold text-navy-900 hover:underline block">
                                            {{ $v->name }}
                                        </a>
                                        <span class="text-[10px] text-slate-400">/vehicles/{{ $v->slug }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 font-semibold text-slate-700">
                                {{ $v->category ? $v->category->name : ucfirst($v->category_slug) }}
                            </td>
                            <td class="p-4">
                                <span class="font-bold text-slate-800">{{ $v->seating_capacity }} Seats</span>
                                <span class="text-[10px] text-slate-400 block">{{ $v->luggage_capacity ?: 'Standard luggage' }}</span>
                            </td>
                            <td class="p-4 text-slate-600">
                                {{ $v->ac_type }}
                            </td>
                            <td class="p-4">
                                <strong class="text-slate-900">{{ $v->formatted_price }}</strong>
                                @if($v->local_package_rate)
                                    <span class="text-[10px] text-slate-400 block">{{ $v->local_package_rate }}</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <form action="{{ route('admin.vehicles.toggle', $v->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-bold border transition-colors {{ $v->status === 'available' ? 'bg-emerald-50 text-emerald-800 border-emerald-200 hover:bg-emerald-100' : 'bg-slate-100 text-slate-600 border-slate-300 hover:bg-slate-200' }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $v->status === 'available' ? 'bg-emerald-500' : 'bg-slate-400' }}"></span>
                                        <span>{{ ucfirst($v->status) }}</span>
                                    </button>
                                </form>
                            </td>
                            <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.vehicles.edit', $v->id) }}" class="btn-secondary text-xs px-2.5 py-1">
                                    Edit
                                </a>
                                <form action="{{ route('admin.vehicles.destroy', $v->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete vehicle {{ $v->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-rose-600 font-bold hover:underline ml-1">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-10 text-center text-slate-400">No vehicles configured.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $vehicles->links() }}
        </div>
    </div>

</div>
@endsection
