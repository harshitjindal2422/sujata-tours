@extends('layouts.admin')

@section('title', 'Booking ' . $booking->booking_reference)
@section('page_title', 'Booking Details: ' . $booking->booking_reference)

@section('content')
<div class="max-w-5xl space-y-6">

    <!-- Top Action Bar -->
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.bookings.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900 flex items-center gap-1">
            &larr; Back to all bookings
        </a>

        <div class="flex items-center gap-2">
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->customer_phone) }}?text=Hello%20{{ urlencode($booking->customer_name) }},%20this%20is%20Sujata%20Tours%20regarding%20your%20vehicle%20booking%20enquiry%20{{ $booking->booking_reference }}." 
               target="_blank" 
               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-xs transition-colors">
                <span>Message on WhatsApp</span>
            </a>
            <a href="tel:{{ $booking->customer_phone }}" class="btn-secondary text-xs px-3 py-1.5">
                Call {{ $booking->customer_phone }}
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        
        <!-- Left: Booking & Journey Details (7 cols) -->
        <div class="lg:col-span-7 space-y-6">
            
            <!-- Customer Card -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                    <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500">Customer Profile</h2>
                    <span class="text-[11px] text-slate-400">Received {{ $booking->created_at->format('d M, Y h:i A') }}</span>
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block">Full Name:</span>
                        <strong class="text-sm text-navy-900 block mt-0.5">{{ $booking->customer_name }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block">Phone / Mobile:</span>
                        <strong class="text-sm text-navy-900 block mt-0.5">{{ $booking->customer_phone }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block">Email Address:</span>
                        <span class="text-slate-700 font-medium block mt-0.5">{{ $booking->customer_email ?: 'Not provided' }}</span>
                    </div>

                    <div>
                        <span class="text-slate-400 block">IP Address:</span>
                        <span class="text-slate-700 font-medium block mt-0.5">{{ $booking->ip_address ?: 'Recorded' }}</span>
                    </div>
                </div>
            </div>

            <!-- Journey Details Card -->
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 border-b border-slate-100 pb-3">
                    Trip Specifications
                </h2>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-400 block">Pickup Location:</span>
                        <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->pickup_location }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block">Drop Location / Destination:</span>
                        <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->drop_location }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block">Travel Date:</span>
                        <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->travel_date->format('d M, Y') }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block">Pickup Time:</span>
                        <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->pickup_time ?: 'Morning' }}</strong>
                    </div>

                    @if($booking->return_date)
                        <div>
                            <span class="text-slate-400 block">Return Date:</span>
                            <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->return_date->format('d M, Y') }}</strong>
                        </div>
                    @endif

                    <div>
                        <span class="text-slate-400 block">Passengers:</span>
                        <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->passenger_count }} Persons</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block">Trip Category:</span>
                        <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->trip_type }}</strong>
                    </div>

                    <div>
                        <span class="text-slate-400 block">Vehicle Class:</span>
                        <strong class="text-sm text-slate-900 block mt-0.5">{{ $booking->specific_vehicle ?: $booking->vehicle_type }}</strong>
                    </div>
                </div>

                @if($booking->additional_requirements)
                    <div class="pt-4 border-t border-slate-100">
                        <span class="text-slate-400 text-xs block mb-1">Customer Message / Requests:</span>
                        <div class="p-3 bg-slate-50 rounded-lg text-xs text-slate-800 leading-relaxed">
                            {{ $booking->additional_requirements }}
                        </div>
                    </div>
                @endif
            </div>

        </div>

        <!-- Right: Status Workflow & Notes (5 cols) -->
        <div class="lg:col-span-5 space-y-6">
            
            <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                <h2 class="text-sm font-bold uppercase tracking-wider text-slate-500 border-b border-slate-100 pb-3">
                    Update Booking Status
                </h2>

                <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="status" class="block text-xs font-bold uppercase text-slate-600 mb-1.5">
                            Status
                        </label>
                        <select id="status" name="status" class="w-full text-xs font-semibold rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">
                            <option value="new" {{ $booking->status === 'new' ? 'selected' : '' }}>New (Awaiting Review)</option>
                            <option value="contacted" {{ $booking->status === 'contacted' ? 'selected' : '' }}>Contacted (Quote Sent)</option>
                            <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed (Advance/Driver Assigned)</option>
                            <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed (Trip Finished)</option>
                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    <div>
                        <label for="admin_notes" class="block text-xs font-bold uppercase text-slate-600 mb-1.5">
                            Admin Internal Notes
                        </label>
                        <textarea id="admin_notes" name="admin_notes" rows="4" 
                                  placeholder="Record quote given, driver assigned (e.g. Ramesh ji / RJ14-TA-9921), advance received..."
                                  class="w-full text-xs rounded-lg border-slate-300 focus:border-navy-900 focus:ring-navy-900">{{ old('admin_notes', $booking->admin_notes) }}</textarea>
                    </div>

                    <button type="submit" class="w-full btn-primary py-2.5 text-xs font-bold">
                        Save Status &amp; Notes
                    </button>
                </form>
            </div>

            <!-- Delete Action -->
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 flex items-center justify-between text-xs">
                <span class="text-slate-500">Delete this record?</span>
                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Permanently remove this booking enquiry?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-rose-600 font-bold hover:underline">
                        Delete Inquiry
                    </button>
                </form>
            </div>

        </div>

    </div>

</div>
@endsection
