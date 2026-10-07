@props(['vehicle'])

<div class="bg-white rounded-xl border border-border overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col group">
    <!-- Vehicle Image Container -->
        <img src="{{ $vehicle->image_url }}" 
             alt="{{ $vehicle->name }} rental in Jaipur" 
             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
             loading="lazy"
             onerror="this.onerror=null;this.src='{{ asset('images/fleet/toyota-innova-crysta.jpg') }}';">
        
        <!-- Category Badge -->
        <div class="absolute top-3 left-3">
            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-navy-900/90 text-white backdrop-blur-sm">
                {{ $vehicle->category ? $vehicle->category->name : ucfirst($vehicle->category_slug) }}
            </span>
        </div>

        <!-- Status Indicator -->
        <div class="absolute top-3 right-3">
            @if($vehicle->status === 'available')
                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200 backdrop-blur-sm">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                    Available
                </span>
            @else
                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-semibold bg-slate-100 text-slate-700">
                    Booked Out
                </span>
            @endif
        </div>
    </div>

    <!-- Vehicle Content -->
    <div class="p-6 flex-1 flex flex-col justify-between">
        <div>
            <!-- Title & Tagline -->
            <div class="mb-4">
                <h3 class="text-xl font-bold text-navy-900 group-hover:text-slate-800 transition-colors">
                    <a href="{{ route('vehicles.show', $vehicle->slug) }}">
                        {{ $vehicle->name }}
                    </a>
                </h3>
                @if($vehicle->short_tagline)
                    <p class="text-xs text-charcoal-muted mt-1 line-clamp-1">
                        {{ $vehicle->short_tagline }}
                    </p>
                @endif
            </div>

            <!-- Key Specifications Grid -->
            <div class="grid grid-cols-2 gap-2 mb-5">
                <div class="badge-spec justify-start">
                    <svg class="w-4 h-4 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span class="font-semibold text-slate-800">{{ $vehicle->seating_capacity }} Seats</span>
                </div>

                <div class="badge-spec justify-start">
                    <svg class="w-4 h-4 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    <span class="truncate">{{ $vehicle->ac_type }}</span>
                </div>

                <div class="badge-spec justify-start">
                    <svg class="w-4 h-4 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span class="truncate">{{ $vehicle->luggage_capacity ?: 'Ample Luggage' }}</span>
                </div>

                <div class="badge-spec justify-start">
                    <svg class="w-4 h-4 text-slate-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    <span class="text-emerald-700 font-semibold">Chauffeur Included</span>
                </div>
            </div>
        </div>

        <!-- Pricing & Action -->
        <div class="pt-4 border-t border-border flex items-center justify-between gap-3">
            <div>
                <span class="block text-[11px] uppercase font-bold text-charcoal-muted tracking-wide">Starting From</span>
                <span class="text-lg font-black text-navy-900">
                    {{ $vehicle->formatted_price }}
                </span>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('vehicles.show', $vehicle->slug) }}" class="btn-secondary text-xs px-3.5 py-2.5">
                    Specs
                </a>
                <a href="{{ route('home') }}#booking-section" 
                   onclick="if(window.selectVehicleForBooking) { window.selectVehicleForBooking('{{ $vehicle->id }}', '{{ $vehicle->name }}', '{{ $vehicle->category ? $vehicle->category->name : 'Car Rental' }}'); }"
                   class="btn-primary text-xs px-4 py-2.5">
                    Book Now
                </a>
            </div>
        </div>
    </div>
</div>
