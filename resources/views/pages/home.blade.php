@extends('layouts.app')

@section('title', 'Sujata Tours | Reliable Cars, Tempo Travellers & Buses in Jaipur')
@section('meta_description', 'Sujata Tours is Jaipur’s trusted commercial vehicle rental service. Book chauffeur-driven Toyota Innova Crysta, tempo travellers (12-26 seats), and luxury buses for local and Rajasthan outstation trips.')
@section('canonical_url', route('home'))

@push('schema')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($faqs as $index => $faq)
    {
      "@type": "Question",
      "name": "{{ addslashes($faq->question) }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ addslashes($faq->answer) }}"
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
  ]
}
</script>
@endpush

@section('content')

    <!-- HERO SECTION -->
    <section class="relative bg-gradient-to-b from-white to-surface-muted pt-8 pb-16 lg:pt-14 lg:pb-24 border-b border-border overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Hero Left: Content -->
                <div class="lg:col-span-7 space-y-6 text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-navy-50 border border-slate-200 text-xs font-bold text-navy-900 tracking-wide">
                        <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                        Reliable Travel • Comfortable Journeys
                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-navy-900 tracking-tight leading-[1.15]">
                        Book the Right Vehicle for Your Journey
                    </h1>

                    <p class="text-base sm:text-lg text-charcoal-muted leading-relaxed max-w-2xl">
                        Sujata Tours provides clean, well-maintained cars, tempo travellers, and buses for local travel, outstation trips, events, corporate travel, and group transportation across Jaipur and Rajasthan.
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-wrap items-center gap-4 pt-2">
                        <a href="#booking-section" class="btn-primary text-base px-7 py-3.5 shadow-md">
                            Book a Vehicle
                        </a>
                        <a href="{{ route('vehicles.index') }}" class="btn-secondary text-base px-6 py-3.5">
                            View All Vehicles
                        </a>
                        <a href="tel:+919829012345" class="inline-flex items-center gap-2 text-sm font-bold text-navy-900 px-3 py-3 hover:text-amber-700 transition-colors">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>+91 98290 12345</span>
                        </a>
                    </div>

                    <!-- Trust Points Bar -->
                    <div class="pt-6 border-t border-border grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div>
                            <span class="block text-xl font-black text-navy-900">15+ Years</span>
                            <span class="text-xs text-charcoal-muted font-medium">Serving Rajasthan</span>
                        </div>
                        <div>
                            <span class="block text-xl font-black text-navy-900">65+ Fleet</span>
                            <span class="text-xs text-charcoal-muted font-medium">Cars, Vans &amp; Coaches</span>
                        </div>
                        <div>
                            <span class="block text-xl font-black text-navy-900">100%</span>
                            <span class="text-xs text-charcoal-muted font-medium">Chauffeur Driven</span>
                        </div>
                        <div>
                            <span class="block text-xl font-black text-navy-900">Fixed Rates</span>
                            <span class="text-xs text-charcoal-muted font-medium">No Surprise Charges</span>
                        </div>
                    </div>
                </div>

                <!-- Hero Right: Authentic Fleet Photography -->
                <div class="lg:col-span-5">
                    <div class="relative rounded-2xl overflow-hidden border border-border shadow-card bg-white">
                        <img src="{{ asset('images/fleet/hero-fleet.jpg') }}" 
                             alt="Sujata Tours fleet of Toyota Innova and Force Tempo Traveller in Jaipur" 
                             class="w-full h-[360px] sm:h-[420px] object-cover"
                             priority>
                        
                        <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-navy-950/90 via-navy-950/50 to-transparent p-5 text-white">
                            <span class="inline-block px-2 py-0.5 rounded text-[11px] font-bold bg-amber-500 text-navy-950 uppercase tracking-wider mb-1">
                                Commercial Tourist Fleet
                            </span>
                            <p class="text-sm font-semibold text-white">
                                Verified All-India Tourist Permits &amp; Chauffeurs
                            </p>
                            <p class="text-xs text-slate-300">
                                Pre-checked air conditioning, clean upholstery, and GPS tracking.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- QUICK BOOKING / ENQUIRY FORM SECTION -->
    <section id="booking-section" class="relative -mt-6 z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <x-booking-form :vehicles="$allVehiclesForForm" />
    </section>


    <!-- VEHICLE CATEGORIES SECTION -->
    <section class="py-20 bg-surface-muted">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">Fleet Options</span>
                <h2 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight mt-1.5">
                    Choose Your Vehicle
                </h2>
                <p class="text-sm sm:text-base text-charcoal-muted mt-2">
                    Whether you are an individual traveling for business, a family planning a holiday, or an organizer managing a 50-person group.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Category 1: Car Rental -->
                <div class="bg-white rounded-2xl border border-border overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col group">
                    <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/fleet/toyota-innova-crysta.jpg') }}" 
                             alt="Car Rental Jaipur Toyota Innova and Sedan" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-md text-xs font-bold bg-white/95 text-navy-900 backdrop-blur-sm shadow-sm">
                                4 to 7 Seater
                            </span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-black text-navy-900 group-hover:text-slate-800 transition-colors">
                                Car Rental
                            </h3>
                            <p class="text-xs font-semibold text-charcoal-muted uppercase tracking-wider mt-1">
                                Sedans &amp; Premium SUVs
                            </p>
                            <p class="text-sm text-charcoal-muted mt-3 leading-relaxed">
                                Comfortable cars for individuals, couples and small groups. Ideal for local Jaipur visits, airport runs, and Rajasthan circuits.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-1.5 text-xs">
                                <span class="badge-spec">Swift Dzire</span>
                                <span class="badge-spec">Maruti Ertiga</span>
                                <span class="badge-spec">Innova Crysta</span>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-border flex items-center justify-between">
                            <span class="text-xs text-charcoal-muted font-medium">From <strong class="text-sm text-navy-900">₹10 / km</strong></span>
                            <a href="{{ route('vehicles.cars') }}" class="btn-primary text-xs px-4 py-2">
                                View Vehicles &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Category 2: Tempo Traveller -->
                <div class="bg-white rounded-2xl border border-border overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col group">
                    <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/fleet/tempo-traveller-luxury.jpg') }}" 
                             alt="Tempo Traveller Hire Jaipur" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-md text-xs font-bold bg-white/95 text-navy-900 backdrop-blur-sm shadow-sm">
                                12 to 26 Seater
                            </span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-black text-navy-900 group-hover:text-slate-800 transition-colors">
                                Tempo Traveller
                            </h3>
                            <p class="text-xs font-semibold text-charcoal-muted uppercase tracking-wider mt-1">
                                Maharaja &amp; Pushback Vans
                            </p>
                            <p class="text-sm text-charcoal-muted mt-3 leading-relaxed">
                                Spacious vehicles for families and medium-sized groups. Ample legroom, 1x1 or 2x1 reclining seats, dual air conditioning, and deep luggage trunks.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-1.5 text-xs">
                                <span class="badge-spec">12 Seater Maharaja</span>
                                <span class="badge-spec">17 Seater</span>
                                <span class="badge-spec">26 Seater</span>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-border flex items-center justify-between">
                            <span class="text-xs text-charcoal-muted font-medium">From <strong class="text-sm text-navy-900">₹22 / km</strong></span>
                            <a href="{{ route('vehicles.tempo-travellers') }}" class="btn-primary text-xs px-4 py-2">
                                View Vehicles &rarr;
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Category 3: Bus Rental -->
                <div class="bg-white rounded-2xl border border-border overflow-hidden shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col group">
                    <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                        <img src="{{ asset('images/fleet/luxury-coach-bus.jpg') }}" 
                             alt="Luxury Bus Rental Jaipur BharatBenz" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute top-4 left-4">
                            <span class="px-3 py-1 rounded-md text-xs font-bold bg-white/95 text-navy-900 backdrop-blur-sm shadow-sm">
                                21 to 45 Seater
                            </span>
                        </div>
                    </div>
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-2xl font-black text-navy-900 group-hover:text-slate-800 transition-colors">
                                Bus Rental
                            </h3>
                            <p class="text-xs font-semibold text-charcoal-muted uppercase tracking-wider mt-1">
                                Mini Buses &amp; Intercity Coaches
                            </p>
                            <p class="text-sm text-charcoal-muted mt-3 leading-relaxed">
                                Reliable buses for large groups, events, weddings and corporate delegations. Air-suspension, underfloor baggage bays, and certified bus crew.
                            </p>
                            <div class="mt-4 flex flex-wrap gap-1.5 text-xs">
                                <span class="badge-spec">21 Seater Mini Bus</span>
                                <span class="badge-spec">35 Seater Deluxe</span>
                                <span class="badge-spec">45 Seater Coach</span>
                            </div>
                        </div>
                        <div class="mt-6 pt-4 border-t border-border flex items-center justify-between">
                            <span class="text-xs text-charcoal-muted font-medium">From <strong class="text-sm text-navy-900">₹32 / km</strong></span>
                            <a href="{{ route('vehicles.buses') }}" class="btn-primary text-xs px-4 py-2">
                                View Vehicles &rarr;
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- FEATURED VEHICLES SECTION -->
    <section class="py-20 bg-white border-y border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-12 gap-4">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">Available Fleet</span>
                    <h2 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight mt-1.5">
                        Featured Rental Vehicles
                    </h2>
                    <p class="text-sm sm:text-base text-charcoal-muted mt-1">
                        All vehicles are owned, managed, and dispatched with verified commercial drivers.
                    </p>
                </div>
                <a href="{{ route('vehicles.index') }}" class="btn-secondary text-sm self-start sm:self-auto">
                    Browse Complete Fleet &rarr;
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($featuredVehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" />
                @endforeach
            </div>
        </div>
    </section>


    <!-- WHY SUJATA TOURS (TRUST & SERVICE EXCELLENCE) -->
    <section class="py-20 bg-surface-muted">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">Why Choose Us</span>
                <h2 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight mt-1.5">
                    Straightforward Transportation You Can Rely On
                </h2>
                <p class="text-sm sm:text-base text-charcoal-muted mt-2">
                    We focus on the essentials: clean vehicles, respectful experienced drivers, and fair transparent billing without gimmicks.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <div class="bg-white p-7 rounded-xl border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">Well-Maintained Vehicles</h3>
                    <p class="text-sm text-charcoal-muted leading-relaxed">
                        Every vehicle is thoroughly vacuumed, washed, and mechanically inspected prior to dispatch. Air conditioning and tyres are tested for peak highway performance.
                    </p>
                </div>

                <div class="bg-white p-7 rounded-xl border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">Experienced Drivers</h3>
                    <p class="text-sm text-charcoal-muted leading-relaxed">
                        Our chauffeurs possess over 8 to 15 years of driving experience across Rajasthan and interstate expressways. Courteous, non-intrusive, and strictly non-commission oriented.
                    </p>
                </div>

                <div class="bg-white p-7 rounded-xl border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">Transparent Pricing</h3>
                    <p class="text-sm text-charcoal-muted leading-relaxed">
                        Clear per-kilometer rates and defined daily minimums. State toll taxes, parking, and driver allowances are clearly documented without unexpected add-ons at the end.
                    </p>
                </div>

                <div class="bg-white p-7 rounded-xl border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">On-Time Dispatch</h3>
                    <p class="text-sm text-charcoal-muted leading-relaxed">
                        We know that airport pickups and early morning starts cannot be delayed. Drivers report 15 minutes ahead of schedule and share real-time contact details via WhatsApp.
                    </p>
                </div>

                <div class="bg-white p-7 rounded-xl border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">Multiple Fleet Options</h3>
                    <p class="text-sm text-charcoal-muted leading-relaxed">
                        From Swift Dzire sedans to Toyota Innova Crysta, 12/17/20/26-seater tempo travellers, and 21 to 45-seater buses, find the precise vehicle size your journey requires.
                    </p>
                </div>

                <div class="bg-white p-7 rounded-xl border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">24/7 Booking Support</h3>
                    <p class="text-sm text-charcoal-muted leading-relaxed">
                        Reach a knowledgeable coordinator whenever you need assistance. Real human support based directly in Jaipur, available on direct phone and WhatsApp.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- HOW IT WORKS SECTION -->
    <section class="py-20 bg-white border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">How It Works</span>
                <h2 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight mt-1.5">
                    Straightforward 4-Step Booking Process
                </h2>
                <p class="text-sm sm:text-base text-charcoal-muted mt-2">
                    No confusing app hoops. Book your transport directly with the actual vehicle operator.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <div class="relative p-6 rounded-xl border border-border bg-surface-muted space-y-3">
                    <span class="text-3xl font-black text-slate-300">01</span>
                    <h3 class="text-lg font-bold text-navy-900">Choose Your Vehicle</h3>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        Select a car, tempo traveller, or coach that comfortably fits your passengers and bags.
                    </p>
                </div>

                <div class="relative p-6 rounded-xl border border-border bg-surface-muted space-y-3">
                    <span class="text-3xl font-black text-slate-300">02</span>
                    <h3 class="text-lg font-bold text-navy-900">Share Journey Details</h3>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        Enter pickup address, travel date, time, destination, and any custom itinerary requests.
                    </p>
                </div>

                <div class="relative p-6 rounded-xl border border-border bg-surface-muted space-y-3">
                    <span class="text-3xl font-black text-slate-300">03</span>
                    <h3 class="text-lg font-bold text-navy-900">Confirm Availability</h3>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        Our desk reviews vehicle schedule, shares transparent fare breakdown, and confirms reservation.
                    </p>
                </div>

                <div class="relative p-6 rounded-xl border border-border bg-surface-muted space-y-3">
                    <span class="text-3xl font-black text-slate-300">04</span>
                    <h3 class="text-lg font-bold text-navy-900">Start Your Journey</h3>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        Your driver reports on time at your pickup location with a clean, fully fueled vehicle.
                    </p>
                </div>

            </div>
        </div>
    </section>


    <!-- SERVICE AREAS (SEO-FRIENDLY NATURAL SECTION) -->
    <section class="py-20 bg-surface-muted border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mb-12">
                <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">Service Coverage</span>
                <h2 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight mt-1.5">
                    Serving Jaipur &amp; Rajasthan
                </h2>
                <p class="text-sm sm:text-base text-charcoal-muted mt-2">
                    Headquartered in Jaipur, our commercial vehicles operate daily routes across Rajasthan, Delhi NCR, and neighboring states. Explore our dedicated route details below:
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($serviceAreas as $area)
                    <div class="bg-white p-6 rounded-xl border border-border shadow-subtle flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="text-xl font-bold text-navy-900">{{ $area->name }}</h3>
                                <span class="text-[11px] font-semibold text-slate-500 bg-surface-subtle px-2 py-0.5 rounded">
                                    {{ $area->distance_from_jaipur }}
                                </span>
                            </div>
                            <p class="text-xs text-charcoal-muted leading-relaxed mb-4">
                                {{ $area->headline }}
                            </p>
                            @if($area->popular_routes && count($area->popular_routes))
                                <div class="space-y-1 text-xs text-slate-600">
                                    <span class="font-bold text-navy-900 block text-[11px] uppercase tracking-wider">Common Routes:</span>
                                    @foreach($area->popular_routes as $route)
                                        <div class="flex items-center gap-1.5">
                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                                            <span>{{ $route }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div class="mt-6 pt-4 border-t border-border">
                            <a href="{{ route('home') }}#booking-section" 
                               onclick="document.getElementById('quick-booking-form_drop_location').value = '{{ $area->name }}';"
                               class="text-xs font-bold text-navy-900 hover:text-slate-700 flex items-center justify-between">
                                <span>Book to {{ $area->name }}</span>
                                <span>&rarr;</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- SEO Internal Linking Tags -->
            <div class="mt-12 p-6 bg-white rounded-xl border border-border flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm font-semibold text-navy-900">
                    Looking for a specific route?
                </div>
                <div class="flex flex-wrap gap-2 text-xs">
                    <a href="{{ url('/jaipur-to-delhi-taxi') }}" class="px-3 py-1.5 rounded-md bg-surface-subtle border border-border hover:bg-slate-100 transition-colors">Jaipur to Delhi Taxi</a>
                    <a href="{{ url('/jaipur-to-jodhpur-taxi') }}" class="px-3 py-1.5 rounded-md bg-surface-subtle border border-border hover:bg-slate-100 transition-colors">Jaipur to Jodhpur Cab</a>
                    <a href="{{ url('/jaipur-to-udaipur-taxi') }}" class="px-3 py-1.5 rounded-md bg-surface-subtle border border-border hover:bg-slate-100 transition-colors">Jaipur to Udaipur Taxi</a>
                    <a href="{{ url('/jaipur-to-jaisalmer-taxi') }}" class="px-3 py-1.5 rounded-md bg-surface-subtle border border-border hover:bg-slate-100 transition-colors">Jaipur to Jaisalmer Cab</a>
                    <a href="{{ url('/car-rental-jaipur') }}" class="px-3 py-1.5 rounded-md bg-surface-subtle border border-border hover:bg-slate-100 transition-colors">Car Rental Jaipur</a>
                    <a href="{{ url('/tempo-traveller-jaipur') }}" class="px-3 py-1.5 rounded-md bg-surface-subtle border border-border hover:bg-slate-100 transition-colors">Tempo Traveller Jaipur</a>
                    <a href="{{ url('/bus-rental-jaipur') }}" class="px-3 py-1.5 rounded-md bg-surface-subtle border border-border hover:bg-slate-100 transition-colors">Bus Rental Jaipur</a>
                </div>
            </div>
        </div>
    </section>


    <!-- CUSTOMER REVIEWS (GENUINE TESTIMONIALS) -->
    <section class="py-20 bg-white border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">Customer Feedback</span>
                <h2 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight mt-1.5">
                    What Our Passengers Say
                </h2>
                <p class="text-sm sm:text-base text-charcoal-muted mt-2">
                    Genuine experiences from families, corporate teams, and group organizers who rely on Sujata Tours.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $review)
                    <div class="p-7 rounded-2xl border border-border bg-surface-muted flex flex-col justify-between shadow-subtle">
                        <div>
                            <!-- Star Rating -->
                            <div class="flex items-center gap-1 text-amber-500 mb-4">
                                @for($i = 0; $i < $review->rating; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>

                            <p class="text-sm text-charcoal leading-relaxed mb-6 italic">
                                "{{ $review->review_text }}"
                            </p>
                        </div>

                        <div class="pt-4 border-t border-border flex items-center justify-between">
                            <div>
                                <span class="block text-sm font-bold text-navy-900">{{ $review->customer_name }}</span>
                                <span class="text-xs text-charcoal-muted">{{ $review->customer_city }}</span>
                            </div>
                            @if($review->vehicle_used)
                                <span class="text-[11px] font-semibold text-slate-600 bg-white border border-border px-2 py-1 rounded">
                                    {{ $review->vehicle_used }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- FAQ ACCORDION SECTION -->
    <section class="py-20 bg-surface-muted border-t border-border">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">Got Questions?</span>
                <h2 class="text-3xl sm:text-4xl font-black text-navy-900 tracking-tight mt-1.5">
                    Frequently Asked Questions
                </h2>
                <p class="text-sm sm:text-base text-charcoal-muted mt-2">
                    Everything you need to know about vehicle bookings, drivers, pricing, and schedules.
                </p>
            </div>

            <div class="space-y-4" x-data="{ openFaq: 0 }">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-xl border border-border overflow-hidden transition-all shadow-subtle">
                        <button type="button" 
                                @click="openFaq = (openFaq === {{ $index }} ? null : {{ $index }})"
                                class="w-full text-left p-5 flex items-center justify-between gap-4 font-bold text-navy-900 text-base hover:text-slate-700 focus:outline-none">
                            <span>{{ $faq->question }}</span>
                            <span class="transform transition-transform text-slate-400 flex-shrink-0" :class="openFaq === {{ $index }} ? 'rotate-180' : ''">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </span>
                        </button>
                        
                        <div x-show="openFaq === {{ $index }}" x-cloak class="px-5 pb-5 text-sm text-charcoal-muted leading-relaxed border-t border-slate-100 pt-3">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- FINAL CTA STRIP -->
    <section class="py-16 bg-navy-900 text-white border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 text-center lg:text-left">
                <div class="space-y-2 max-w-2xl">
                    <h2 class="text-2xl sm:text-3xl font-black text-white tracking-tight">
                        Need a Vehicle for Your Journey?
                    </h2>
                    <p class="text-slate-300 text-sm sm:text-base leading-relaxed">
                        Tell us where you're going and we'll help you choose the right vehicle with an exact quote.
                    </p>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-3">
                    <a href="#booking-section" class="btn-primary bg-white text-navy-900 hover:bg-slate-100 text-sm font-bold px-6 py-3 shadow-md">
                        Book a Vehicle
                    </a>
                    <a href="tel:+919829012345" class="btn-secondary bg-transparent border-slate-700 text-white hover:bg-navy-800 text-sm px-6 py-3">
                        Call Desk: 098290 12345
                    </a>
                    <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20need%20vehicle%20information" target="_blank" class="inline-flex items-center gap-2 px-5 py-3 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold transition-colors">
                        WhatsApp Us
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
