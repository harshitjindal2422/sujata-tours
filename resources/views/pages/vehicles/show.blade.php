@extends('layouts.app')

@section('title', $vehicle->meta_title ?: "{$vehicle->name} Rental in Jaipur with Driver | Sujata Tours")
@section('meta_description', $vehicle->meta_description ?: "Hire {$vehicle->name} in Jaipur. Clean {$vehicle->seating_capacity} seater with air conditioning and experienced chauffeur. Transparent per-km rates for Rajasthan outstation and local city trips.")
@section('canonical_url', route('vehicles.show', $vehicle->slug))
@section('og_image', asset($vehicle->image))

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Product",
  "name": "{{ $vehicle->name }} Rental Jaipur",
  "image": "{{ asset($vehicle->image) }}",
  "description": "{{ addslashes(strip_tags($vehicle->description)) }}",
  "brand": {
    "@type": "Brand",
    "name": "Sujata Tours"
  },
  "offers": {
    "@type": "Offer",
    "priceCurrency": "INR",
    "price": "{{ $vehicle->price_per_km ?: 16 }}",
    "availability": "https://schema.org/InStock",
    "url": "{{ route('vehicles.show', $vehicle->slug) }}"
  }
}
</script>
@endpush

@section('content')
    <!-- Breadcrumb and Top Bar -->
    <div class="bg-surface-subtle border-b border-border py-3">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center gap-2 text-xs text-charcoal-muted" aria-label="Breadcrumb">
                <a href="{{ route('home') }}" class="hover:text-navy-900">Home</a>
                <span>/</span>
                <a href="{{ route('vehicles.index') }}" class="hover:text-navy-900">Vehicles</a>
                <span>/</span>
                @if($vehicle->category)
                    <a href="{{ url('/' . $vehicle->category->slug) }}" class="hover:text-navy-900">{{ $vehicle->category->name }}</a>
                    <span>/</span>
                @endif
                <span class="text-navy-900 font-bold truncate">{{ $vehicle->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Main Detail Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left Column: Media and Specifications (7 Cols) -->
            <div class="lg:col-span-7 space-y-8">
                
                <!-- Main Vehicle Photo -->
                <div class="bg-white rounded-2xl border border-border overflow-hidden shadow-card">
                        <img src="{{ $vehicle->image_url }}" 
                             alt="{{ $vehicle->name }} in Jaipur" 
                             class="w-full h-full object-cover"
                             onerror="this.onerror=null;this.src='{{ asset('images/fleet/toyota-innova-crysta.jpg') }}';">
                        
                        <div class="absolute top-4 left-4 flex gap-2">
                            <span class="px-3 py-1 rounded-md text-xs font-bold bg-navy-900 text-white shadow-sm">
                                {{ $vehicle->category ? $vehicle->category->name : 'Commercial Fleet' }}
                            </span>
                            @if($vehicle->status === 'available')
                                <span class="px-3 py-1 rounded-md text-xs font-bold bg-emerald-50 text-emerald-800 border border-emerald-200">
                                    Ready for Dispatch
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Title and Tagline -->
                <div>
                    <h1 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight">
                        {{ $vehicle->name }}
                    </h1>
                    @if($vehicle->short_tagline)
                        <p class="text-base text-charcoal-muted mt-1 font-medium">
                            {{ $vehicle->short_tagline }}
                        </p>
                    @endif
                </div>

                <!-- Detailed Specifications Table -->
                <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-4">
                    <h2 class="text-lg font-bold text-navy-900 border-b border-border pb-3">
                        Vehicle Specifications and Features
                    </h2>

                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        <div class="p-3 rounded-lg bg-surface-muted">
                            <span class="block text-[11px] uppercase font-bold text-charcoal-muted">Seating Capacity</span>
                            <span class="text-base font-bold text-navy-900">{{ $vehicle->seating_capacity }} Passenger Seats</span>
                        </div>

                        <div class="p-3 rounded-lg bg-surface-muted">
                            <span class="block text-[11px] uppercase font-bold text-charcoal-muted">Air Conditioning</span>
                            <span class="text-base font-bold text-navy-900">{{ $vehicle->ac_type }}</span>
                        </div>

                        <div class="p-3 rounded-lg bg-surface-muted">
                            <span class="block text-[11px] uppercase font-bold text-charcoal-muted">Luggage Room</span>
                            <span class="text-base font-bold text-navy-900">{{ $vehicle->luggage_capacity ?: 'Ample Boot Space' }}</span>
                        </div>

                        <div class="p-3 rounded-lg bg-surface-muted">
                            <span class="block text-[11px] uppercase font-bold text-charcoal-muted">Driver</span>
                            <span class="text-base font-bold text-emerald-700">Commercial Chauffeur Included</span>
                        </div>

                        <div class="p-3 rounded-lg bg-surface-muted">
                            <span class="block text-[11px] uppercase font-bold text-charcoal-muted">Fuel Type</span>
                            <span class="text-base font-bold text-navy-900">{{ $vehicle->fuel_type }}</span>
                        </div>

                        <div class="p-3 rounded-lg bg-surface-muted">
                            <span class="block text-[11px] uppercase font-bold text-charcoal-muted">Availability</span>
                            <span class="text-base font-bold text-navy-900">Local and Outstation</span>
                        </div>
                    </div>
                </div>

                <!-- Description and Overview -->
                <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-3">
                    <h2 class="text-lg font-bold text-navy-900">Vehicle Overview</h2>
                    <div class="text-sm text-charcoal leading-relaxed space-y-3">
                        <p>{{ $vehicle->description }}</p>
                    </div>

                    @if($vehicle->ideal_for)
                        <div class="mt-4 p-4 rounded-xl bg-sand-100 border border-border text-xs text-charcoal">
                            <strong>Recommended For:</strong> {{ $vehicle->ideal_for }}
                        </div>
                    @endif
                </div>

                <!-- Features Checklist -->
                @if($vehicle->features && count($vehicle->features))
                    <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-4">
                        <h2 class="text-lg font-bold text-navy-900">Included Amenities and Standards</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs sm:text-sm text-charcoal">
                            @foreach($vehicle->features as $feature)
                                <div class="flex items-center gap-2.5">
                                    <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Transparent Fare Structure Rules -->
                <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-4">
                    <h2 class="text-lg font-bold text-navy-900">Fare and Billing Terms</h2>
                    <div class="space-y-2 text-xs text-charcoal-muted leading-relaxed">
                        <div class="flex justify-between py-2 border-b border-slate-100">
                            <span class="font-semibold text-charcoal">Outstation Running Rate:</span>
                            <strong class="text-navy-900">{{ $vehicle->formatted_price }}</strong>
                        </div>
                        @if($vehicle->local_package_rate)
                            <div class="flex justify-between py-2 border-b border-slate-100">
                                <span class="font-semibold text-charcoal">Local Jaipur City Package:</span>
                                <strong class="text-navy-900">{{ $vehicle->local_package_rate }}</strong>
                            </div>
                        @endif
                        <div class="flex justify-between py-2 border-b border-slate-100">
                            <span class="font-semibold text-charcoal">Minimum Daily Distance:</span>
                            <strong class="text-navy-900">{{ $vehicle->outstation_min_km }} km / calendar day</strong>
                        </div>
                        <div class="flex justify-between py-2 border-b border-slate-100">
                            <span class="font-semibold text-charcoal">Driver Night / Day Allowance:</span>
                            <strong class="text-navy-900">₹{{ $vehicle->driver_allowance_per_day }} / day</strong>
                        </div>
                        <p class="pt-2 text-[11px] text-slate-500">
                            * Toll taxes, state border entry taxes, and parking fees are charged at actuals or can be quoted as an all-inclusive package on request.
                        </p>
                    </div>
                </div>

            </div>

            <!-- Right Column: Dedicated Reservation Form (5 Cols) -->
            <div class="lg:col-span-5 space-y-6">
                <div class="sticky top-24">
                    <x-booking-form :selectedVehicle="$vehicle" :compact="true" id="vehicle-booking-form" />

                    <!-- Direct Contact Card -->
                    <div class="mt-6 p-5 rounded-xl bg-white border border-border shadow-subtle flex items-center justify-between">
                        <div>
                            <span class="block text-xs font-bold text-charcoal-muted uppercase tracking-wider">Need Immediate Booking?</span>
                            <span class="text-sm font-bold text-navy-900">Call Fleet Manager Directly</span>
                        </div>
                        <a href="tel:+919829012345" class="btn-primary text-xs px-4 py-2">
                            098290 12345
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Related Vehicles -->
        @if($relatedVehicles->count())
            <div class="mt-20 pt-12 border-t border-border">
                <h2 class="text-2xl font-black text-navy-900 mb-8">
                    Other Similar Vehicles
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedVehicles as $rel)
                        <x-vehicle-card :vehicle="$rel" />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
