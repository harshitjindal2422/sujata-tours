@extends('layouts.app')

@section('title', 'Inquiry Confirmation - Reference ' . $booking->booking_reference . ' | Sujata Tours')
@section('meta_description', 'Your vehicle booking inquiry has been recorded with Sujata Tours Jaipur. Our dispatch team is preparing your quote.')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-2xl border border-border p-8 sm:p-10 shadow-card text-center">
        
        <!-- Success Icon -->
        <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>

        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold bg-navy-50 text-navy-900 mb-2">
            Inquiry Reference: <span class="text-navy-900 tracking-wider">{{ $booking->booking_reference }}</span>
        </span>

        <h1 class="text-2xl sm:text-3xl font-black text-navy-900 tracking-tight">
            Thank You, {{ $booking->customer_name }}!
        </h1>

        <p class="text-sm sm:text-base text-charcoal-muted mt-2 max-w-lg mx-auto leading-relaxed">
            Your vehicle enquiry has been logged into our Jaipur central dispatch desk. A coordinator will review fleet availability and contact you shortly.
        </p>

        <!-- Summary Details Card -->
        <div class="my-8 p-6 rounded-xl bg-surface-muted border border-border text-left space-y-3">
            <h2 class="text-xs font-bold uppercase tracking-wider text-charcoal-muted border-b border-border pb-2">
                Trip Inquiry Summary
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                <div>
                    <span class="text-xs text-charcoal-muted block">Requested Vehicle:</span>
                    <strong class="text-navy-900">{{ $booking->specific_vehicle ?: $booking->vehicle_type }}</strong>
                </div>

                <div>
                    <span class="text-xs text-charcoal-muted block">Travel Date and Time:</span>
                    <strong class="text-navy-900">{{ $booking->travel_date->format('d M, Y') }} ({{ $booking->pickup_time ?: 'Morning' }})</strong>
                </div>

                <div>
                    <span class="text-xs text-charcoal-muted block">Pickup Address:</span>
                    <span class="text-charcoal font-medium">{{ $booking->pickup_location }}</span>
                </div>

                <div>
                    <span class="text-xs text-charcoal-muted block">Destination:</span>
                    <span class="text-charcoal font-medium">{{ $booking->drop_location }}</span>
                </div>

                <div>
                    <span class="text-xs text-charcoal-muted block">Passenger Count:</span>
                    <span class="text-charcoal font-medium">{{ $booking->passenger_count }} Persons</span>
                </div>

                <div>
                    <span class="text-xs text-charcoal-muted block">Registered Phone:</span>
                    <span class="text-charcoal font-medium">{{ $booking->customer_phone }}</span>
                </div>
            </div>

            @if($booking->additional_requirements)
                <div class="pt-3 border-t border-slate-200 text-xs">
                    <span class="text-charcoal-muted block">Notes / Special Requests:</span>
                    <p class="text-charcoal mt-0.5">{{ $booking->additional_requirements }}</p>
                </div>
            @endif
        </div>

        <!-- Next Steps -->
        <div class="text-left bg-blue-50/60 border border-blue-200/70 rounded-xl p-5 mb-8 text-xs text-slate-700 space-y-2">
            <strong class="text-navy-900 block text-sm">What Happens Next?</strong>
            <p>1. Our dispatch manager calculates the route distance and verifies vehicle schedule.</p>
            <p>2. You will receive an exact quote via WhatsApp or phone call within 15–30 minutes.</p>
            <p>3. Once you confirm, driver contact details and vehicle registration will be dispatched.</p>
        </div>

        <!-- Fast Contact Action -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20just%20submitted%20booking%20enquiry%20reference%20{{ $booking->booking_reference }}" 
               target="_blank" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white font-semibold text-sm transition-colors">
                <span>Speed Up on WhatsApp</span>
            </a>

            <a href="tel:+919829012345" class="w-full sm:w-auto btn-secondary text-sm">
                Call Helpline: +91 98290 12345
            </a>

            <a href="{{ route('home') }}" class="w-full sm:w-auto text-xs text-charcoal-muted hover:text-navy-900 py-3">
                &larr; Return to Home
            </a>
        </div>

    </div>
</div>
@endsection
