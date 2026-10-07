@extends('layouts.admin')

@section('title', 'Manage Bookings & Inquiries')
@section('page_title', 'Bookings & Rental Inquiries')

@section('content')
<div class="space-y-6">

    <!-- Status Tabs & Search Bar -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200">
        
        <!-- Status Tabs -->
        <div class="flex flex-wrap items-center gap-1.5 w-full sm:w-auto">
            <a href="{{ route('admin.bookings.index') }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all {{ empty($status) ? 'bg-navy-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                All ({{ $statusCounts['all'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'new']) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all {{ $status === 'new' ? 'bg-amber-600 text-white' : 'text-amber-800 bg-amber-50 hover:bg-amber-100' }}">
                New ({{ $statusCounts['new'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'contacted']) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all {{ $status === 'contacted' ? 'bg-blue-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Contacted ({{ $statusCounts['contacted'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'confirmed']) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all {{ $status === 'confirmed' ? 'bg-emerald-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Confirmed ({{ $statusCounts['confirmed'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all {{ $status === 'completed' ? 'bg-slate-700 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Completed ({{ $statusCounts['completed'] }})
            </a>
            <a href="{{ route('admin.bookings.index', ['status' => 'cancelled']) }}" 
               class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all {{ $status === 'cancelled' ? 'bg-rose-600 text-white' : 'text-slate-600 hover:bg-slate-100' }}">
                Cancelled ({{ $statusCounts['cancelled'] }})
            </a>
        </div>

        <!-- Search Bar -->
        <form method="GET" action="{{ route('admin.bookings.index') }}" class="w-full sm:w-72">
            @if($status)
                <input type="hidden" name="status" value="{{ $status }}">
            @endif
            <div class="relative">
                <input type="text" name="search" value="{{ $search }}" placeholder="Search customer, phone, ref..." 
                       class="w-full text-xs rounded-lg border-slate-300 pr-8 focus:border-navy-900 focus:ring-navy-900">
                <button type="submit" class="absolute right-2.5 top-2.5 text-slate-400 hover:text-slate-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
            </div>
        </form>

    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="p-4">Reference</th>
                        <th class="p-4">Customer Details</th>
                        <th class="p-4">Vehicle Category</th>
                        <th class="p-4">Route</th>
                        <th class="p-4">Travel Date</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($bookings as $b)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-4 font-bold text-navy-900">
                                <a href="{{ route('admin.bookings.show', $b->id) }}" class="hover:underline">
                                    {{ $b->booking_reference }}
                                </a>
                                <span class="text-[10px] text-slate-400 block">{{ $b->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="p-4">
                                <span class="font-bold text-slate-900 block">{{ $b->customer_name }}</span>
                                <a href="tel:{{ $b->customer_phone }}" class="text-slate-600 hover:text-navy-900 font-medium">
                                    {{ $b->customer_phone }}
                                </a>
                                @if($b->customer_email)
                                    <span class="text-[10px] text-slate-400 block">{{ $b->customer_email }}</span>
                                @endif
                            </td>
                            <td class="p-4 font-medium text-slate-700">
                                <div>{{ $b->specific_vehicle ?: $b->vehicle_type }}</div>
                                <span class="text-[10px] text-slate-400 block">{{ $b->passenger_count }} Passenger(s) • {{ $b->trip_type }}</span>
                            </td>
                            <td class="p-4 text-slate-600">
                                <div><strong class="text-slate-400 font-normal">Pickup:</strong> {{ $b->pickup_location }}</div>
                                <div><strong class="text-slate-400 font-normal">Drop:</strong> {{ $b->drop_location }}</div>
                            </td>
                            <td class="p-4 text-slate-700 whitespace-nowrap">
                                <div class="font-bold">{{ $b->travel_date->format('d M, Y') }}</div>
                                <span class="text-[10px] text-slate-400 block">{{ $b->pickup_time ?: 'Morning' }}</span>
                            </td>
                            <td class="p-4">
                                <span class="inline-flex px-2.5 py-1 rounded-full text-[11px] font-bold border {{ $b->status_badge_class }}">
                                    {{ ucfirst($b->status) }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2 whitespace-nowrap">
                                <a href="{{ route('admin.bookings.show', $b->id) }}" class="btn-primary text-xs px-3 py-1.5">
                                    Manage
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-12 text-center text-slate-400">
                                No booking inquiries found matching criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100">
            {{ $bookings->links() }}
        </div>
    </div>

</div>
@endsection
