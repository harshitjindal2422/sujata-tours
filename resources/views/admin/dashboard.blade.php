@extends('layouts.admin')

@section('title', 'Dashboard Overview')
@section('page_title', 'Fleet & Bookings Overview')

@section('content')
<div class="space-y-8">
    
    <!-- KPI Counters Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-5">
        
        <!-- Counter 1: Total Fleet -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Total Vehicles</span>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-navy-900">{{ $totalVehicles }}</span>
                <span class="text-xs font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">
                    {{ $availableVehicles }} Available
                </span>
            </div>
            <a href="{{ route('admin.vehicles.index') }}" class="text-xs text-navy-900 font-bold hover:underline mt-3 block">
                Manage fleet &rarr;
            </a>
        </div>

        <!-- Counter 2: New Inquiries -->
        <div class="bg-white p-5 rounded-2xl border border-amber-200 bg-amber-50/20 shadow-sm">
            <span class="text-xs font-bold uppercase tracking-wider text-amber-700 block">New Inquiries</span>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-amber-600">{{ $newBookings }}</span>
                @if($newBookings > 0)
                    <span class="text-xs font-bold text-amber-800 bg-amber-100 px-2 py-0.5 rounded animate-pulse">
                        Action Needed
                    </span>
                @endif
            </div>
            <a href="{{ route('admin.bookings.index', ['status' => 'new']) }}" class="text-xs text-amber-800 font-bold hover:underline mt-3 block">
                Review new leads &rarr;
            </a>
        </div>

        <!-- Counter 3: Contacted -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">In Discussion</span>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-blue-600">{{ $contactedBookings }}</span>
                <span class="text-xs text-slate-400">Quotes sent</span>
            </div>
            <a href="{{ route('admin.bookings.index', ['status' => 'contacted']) }}" class="text-xs text-blue-700 font-bold hover:underline mt-3 block">
                View quotes &rarr;
            </a>
        </div>

        <!-- Counter 4: Confirmed -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Confirmed Bookings</span>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-emerald-600">{{ $confirmedBookings }}</span>
                <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded">Active</span>
            </div>
            <a href="{{ route('admin.bookings.index', ['status' => 'confirmed']) }}" class="text-xs text-emerald-700 font-bold hover:underline mt-3 block">
                Assigned drivers &rarr;
            </a>
        </div>

        <!-- Counter 5: Completed -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500 block">Completed Trips</span>
            <div class="mt-2 flex items-baseline justify-between">
                <span class="text-3xl font-extrabold text-slate-700">{{ $completedBookings }}</span>
                <span class="text-xs text-slate-400">Closed</span>
            </div>
            <a href="{{ route('admin.bookings.index', ['status' => 'completed']) }}" class="text-xs text-slate-600 font-bold hover:underline mt-3 block">
                Trip history &rarr;
            </a>
        </div>

    </div>

    <!-- Main Section: Recent Bookings Table -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-200 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Recent Booking Inquiries</h2>
                <p class="text-xs text-slate-500">Live submissions received from the website booking forms.</p>
            </div>
            <a href="{{ route('admin.bookings.index') }}" class="btn-secondary text-xs px-3.5 py-1.5">
                View All Inquiries
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-50 text-slate-600 uppercase tracking-wider font-bold border-b border-slate-200">
                    <tr>
                        <th class="p-4">Reference</th>
                        <th class="p-4">Customer</th>
                        <th class="p-4">Vehicle Requested</th>
                        <th class="p-4">Route</th>
                        <th class="p-4">Date</th>
                        <th class="p-4">Status</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($recentBookings as $booking)
                        <tr class="hover:bg-slate-50 transition-colors">
                            <td class="p-4 font-bold text-navy-900">
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="hover:underline">
                                    {{ $booking->booking_reference }}
                                </a>
                            </td>
                            <td class="p-4">
                                <span class="font-bold text-slate-900 block">{{ $booking->customer_name }}</span>
                                <a href="tel:{{ $booking->customer_phone }}" class="text-slate-500 hover:text-navy-900">
                                    {{ $booking->customer_phone }}
                                </a>
                            </td>
                            <td class="p-4 font-medium text-slate-700">
                                {{ $booking->specific_vehicle ?: $booking->vehicle_type }}
                                <span class="text-[10px] text-slate-400 block">({{ $booking->passenger_count }} pax)</span>
                            </td>
                            <td class="p-4 text-slate-600 max-w-xs truncate">
                                <div><span class="text-slate-400">From:</span> {{ $booking->pickup_location }}</div>
                                <div><span class="text-slate-400">To:</span> {{ $booking->drop_location }}</div>
                            </td>
                            <td class="p-4 text-slate-700 whitespace-nowrap">
                                {{ $booking->travel_date->format('d M, Y') }}
                                @if($booking->pickup_time)
                                    <span class="text-[10px] text-slate-400 block">{{ $booking->pickup_time }}</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <span class="inline-flex px-2.5 py-1 rounded-full text-[11px] font-bold border {{ $booking->status_badge_class }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="text-navy-900 font-bold hover:underline">
                                    Details
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-slate-400">No bookings logged yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Fleet Breakdown Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($fleetSummary as $cat)
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <h3 class="text-base font-bold text-slate-900">{{ $cat->name }}</h3>
                    <p class="text-xs text-slate-500 mt-0.5">{{ $cat->subtitle ?: 'Fleet Category' }}</p>
                    <span class="text-2xl font-black text-navy-900 mt-2 block">{{ $cat->vehicles_count }} Vehicles</span>
                </div>
                <a href="{{ route('admin.vehicles.index') }}" class="btn-secondary text-xs px-3 py-2">
                    Manage
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection
