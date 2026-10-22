@extends('layouts.app')

@section('title', 'Sujata Tours | Premium Car, Tempo Traveller and Bus Rentals')
@section('meta_description', 'Sujata Tours provides premium chauffeur-driven cars, luxury tempo travellers, and tourist buses for local travel, outstation road trips, and group transportation across Rajasthan and North India.')
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

    <!-- =========================================================================
         1. CINEMATIC FULL-WIDTH HERO SLIDER (Viewport-Docked, Minimal and Sharp, Auto-sliding)
         ========================================================================= -->
    <section class="relative bg-charcoal-dark overflow-hidden w-full select-none h-[490px] sm:h-[520px] lg:h-[550px]" 
             style="min-height: 480px; height: clamp(480px, calc(100vh - 180px), 560px);"
             x-data="{
                 activeSlide: 0,
                 totalSlides: 3,
                 timer: null,
                 init() {
                     this.startAutoplay();
                 },
                 startAutoplay() {
                     if (this.timer) clearInterval(this.timer);
                     this.timer = setInterval(() => {
                         this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
                     }, 5500);
                 },
                 goTo(i) {
                     this.activeSlide = i;
                     this.startAutoplay();
                 },
                 next() {
                     this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
                     this.startAutoplay();
                 },
                 prev() {
                     this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
                     this.startAutoplay();
                 }
             }">

        <!-- Slider Images and Backdrop -->
        <div class="relative w-full h-full overflow-hidden">

            <!-- SLIDE 1: Airport Arrivals and Innova Group Travel (Matches Reference Design) -->
            <div x-show="activeSlide === 0"
                 x-transition:enter="transition-opacity ease-out duration-700"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in duration-500"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                
                <img src="{{ asset('images/banners/banner-innova-airport.jpg') }}" 
                     alt="Group Travel Pure Comfort and Luxury - Sujata Tours Innova Crysta" 
                     class="absolute inset-0 w-full h-full object-cover object-center brightness-105 contrast-105 pointer-events-none">
                
                <!-- Radiant semi-transparent overlay: dark on left for text readability, clear and bright on right for Innova view -->
                <div class="absolute inset-0 bg-gradient-to-r from-black/90 via-black/55 to-black/20 sm:to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-transparent to-black/20"></div>

                <div class="absolute inset-0 z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center pb-16 sm:pb-20 lg:pb-24">
                    <div class="max-w-2xl">
                        <!-- Minimal Sharp Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/25 text-white text-[11px] tracking-widest font-bold uppercase mb-3 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>AIRPORT ARRIVALS AND LUXURY COACHES</span>
                        </div>

                        <!-- Striking Sharp Headline -->
                        <h1 class="font-serif text-3xl sm:text-5xl lg:text-[52px] font-bold text-white leading-tight tracking-tight drop-shadow-[0_2px_12px_rgba(0,0,0,0.85)] mb-3">
                            Group Travel.<br>
                            <span class="font-normal italic text-white/95">Pure Comfort and Luxury.</span>
                        </h1>

                        <!-- Minimal Readable Subtext -->
                        <p class="text-xs sm:text-sm lg:text-base text-sand-100/90 font-normal drop-shadow-[0_1px_4px_rgba(0,0,0,0.85)] max-w-xl mb-6">
                            Punctual airport arrivals, executive sedans, and luxury tourist coaches for families, corporate groups, and outstation journeys.
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center gap-3">
                            <a href="#quick-booking" 
                               class="inline-flex items-center justify-center gap-2 text-xs uppercase tracking-wider font-extrabold px-7 py-3 rounded-xl text-white bg-primary hover:bg-primary-hover shadow-lg transition-all">
                                <span>Book a Vehicle</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="{{ route('vehicles.index') }}" 
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs uppercase tracking-wider font-extrabold text-white bg-black/40 hover:bg-black/60 backdrop-blur-md border border-white/30 transition-all shadow-sm">
                                <span>View Fleet</span>
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 2: Highway and Expressway Corridors -->
            <div x-show="activeSlide === 1"
                 x-transition:enter="transition-opacity ease-out duration-700"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in duration-500"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                
                <img src="{{ asset('images/banners/banner-2-highway.jpg') }}" 
                     alt="Highway and Expressway Travel" 
                     class="absolute inset-0 w-full h-full object-cover object-center brightness-110 contrast-105 pointer-events-none">
                
                <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/45 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20"></div>

                <div class="absolute inset-0 z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center pb-16 sm:pb-20 lg:pb-24">
                    <div class="max-w-2xl">
                        <!-- Minimal Sharp Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/25 text-white text-[11px] tracking-widest font-bold uppercase mb-3 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>DELHI-MUMBAI EXPRESSWAY AND OUTSTATION</span>
                        </div>

                        <!-- Striking Sharp Headline -->
                        <h2 class="font-serif text-3xl sm:text-5xl lg:text-[52px] font-bold text-white leading-tight tracking-tight drop-shadow-[0_2px_12px_rgba(0,0,0,0.85)] mb-3">
                            Go Outstation.<br>
                            <span class="font-normal italic text-white/90">Travel in Comfort.</span>
                        </h2>

                        <!-- Minimal Readable Subtext -->
                        <p class="text-xs sm:text-sm lg:text-base text-sand-100/90 font-normal drop-shadow-[0_1px_4px_rgba(0,0,0,0.85)] max-w-xl mb-6">
                            Chauffeur-driven highway fleets across the Delhi-Mumbai Expressway, Agra, Jodhpur, and Udaipur.
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center gap-3">
                            <a href="{{ route('vehicles.index') }}" 
                               class="inline-flex items-center justify-center gap-2 text-xs uppercase tracking-wider font-extrabold px-7 py-3 rounded-xl text-white bg-primary hover:bg-primary-hover shadow-lg transition-all">
                                <span>Explore Vehicles</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                            <a href="{{ url('/outstation-cab-jaipur') }}" 
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs uppercase tracking-wider font-extrabold text-white bg-white/15 hover:bg-white/25 backdrop-blur-md border border-white/30 transition-all shadow-sm">
                                <span>View Routes</span>
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SLIDE 3: Jaipur Heritage and Chauffeur Fleet -->
            <div x-show="activeSlide === 2"
                 x-transition:enter="transition-opacity ease-out duration-700"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition-opacity ease-in duration-500"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 w-full h-full">
                
                <img src="{{ asset('images/banners/banner-1-jaipur.jpg') }}" 
                     alt="Sujata Tours Jaipur Fleet" 
                     class="absolute inset-0 w-full h-full object-cover object-center brightness-110 contrast-105 pointer-events-none">
                
                <div class="absolute inset-0 bg-gradient-to-r from-black/85 via-black/45 to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-black/20"></div>

                <div class="absolute inset-0 z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center pb-16 sm:pb-20 lg:pb-24">
                    <div class="max-w-2xl">
                        <!-- Minimal Sharp Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/25 text-white text-[11px] tracking-widest font-bold uppercase mb-3 shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                            <span>4.9/5 RATED • SUJATA TOURS JAIPUR FLEET</span>
                        </div>

                        <!-- Striking Sharp Headline -->
                        <h2 class="font-serif text-3xl sm:text-5xl lg:text-[52px] font-bold text-white leading-tight tracking-tight drop-shadow-[0_2px_12px_rgba(0,0,0,0.85)] mb-3">
                            Your Journey.<br>
                            <span class="font-normal italic text-white/90">Our Finest Fleet.</span>
                        </h2>

                        <!-- Minimal Readable Subtext -->
                        <p class="text-xs sm:text-sm lg:text-base text-sand-100/90 font-normal drop-shadow-[0_1px_4px_rgba(0,0,0,0.85)] max-w-xl mb-6">
                            Chauffeur-driven sedans, luxury tempo travellers, and tourist coaches across Rajasthan and North India.
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap items-center gap-3">
                            <a href="#quick-booking" 
                               class="inline-flex items-center justify-center gap-2 text-xs uppercase tracking-wider font-extrabold px-7 py-3 rounded-xl text-white bg-primary hover:bg-primary-hover shadow-lg transition-all">
                                <span>Book a Vehicle</span>
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </a>
                            <a href="{{ route('vehicles.index') }}" 
                               class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-xs uppercase tracking-wider font-extrabold text-white bg-white/15 hover:bg-white/25 backdrop-blur-md border border-white/30 transition-all shadow-sm">
                                <span>Explore Vehicles</span>
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Slider Navigation Controls and Numbering -->
        <div class="absolute bottom-20 sm:bottom-24 right-4 sm:right-8 lg:right-12 z-20 flex items-center gap-3">
            <div class="text-white font-serif text-xs tracking-widest flex items-center gap-1.5 bg-black/60 backdrop-blur-md px-3.5 py-1 rounded-full border border-white/20 shadow">
                <span class="text-white text-xs font-bold" x-text="'0' + (activeSlide + 1)"></span>
                <span class="text-white/40">/</span>
                <span class="text-white/70 text-xs">03</span>
            </div>

            <div class="flex items-center gap-2">
                <button @click="prev()" 
                        class="w-9 h-9 rounded-full border border-white/30 bg-black/50 hover:bg-primary hover:border-primary text-white flex items-center justify-center transition-all focus:outline-none shadow-lg backdrop-blur-sm active:scale-95"
                        aria-label="Previous Slide">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click="next()" 
                        class="w-9 h-9 rounded-full border border-white/30 bg-black/50 hover:bg-primary hover:border-primary text-white flex items-center justify-center transition-all focus:outline-none shadow-lg backdrop-blur-sm active:scale-95"
                        aria-label="Next Slide">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>

        <!-- Interactive Slide Indicator Dots and Progress Bar -->
        <div class="absolute bottom-0 left-0 right-0 z-30 h-1 bg-white/20 flex">
            <div class="h-full flex-1 transition-all duration-300 cursor-pointer"
                 @click="goTo(0)"
                 :class="(activeSlide === 0) ? 'bg-white shadow-[0_0_12px_rgba(255,255,255,0.9)]' : 'bg-transparent hover:bg-white/20'">
            </div>
            <div class="h-full flex-1 transition-all duration-300 cursor-pointer"
                 @click="goTo(1)"
                 :class="(activeSlide === 1) ? 'bg-white shadow-[0_0_12px_rgba(255,255,255,0.9)]' : 'bg-transparent hover:bg-white/20'">
            </div>
            <div class="h-full flex-1 transition-all duration-300 cursor-pointer"
                 @click="goTo(2)"
                 :class="(activeSlide === 2) ? 'bg-white shadow-[0_0_12px_rgba(255,255,255,0.9)]' : 'bg-transparent hover:bg-white/20'">
            </div>
        </div>

    </section>

    <!-- =========================================================================
         1.1 FLOATING TRUST & FLEET HIGHLIGHTS BAR (Matches Reference Design Mockup)
         ========================================================================= -->
    <div class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 sm:-mt-8 lg:-mt-12 mb-8">
        <div class="bg-white rounded-2xl shadow-xl border border-sand-300/60 p-4 sm:p-5 lg:p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 divide-y sm:divide-y-0 lg:divide-x divide-sand-200/80">
            
            <!-- 1. Wide Range of Vehicles -->
            <div class="flex items-center gap-3.5 sm:gap-4 pt-3 sm:pt-0 lg:px-4 first:pt-0 first:lg:pl-0">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 17a2 2 0 100-4 2 2 0 000 4zm8 0a2 2 0 100-4 2 2 0 000 4z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 13l1.5-4.5A2 2 0 016.4 7h11.2a2 2 0 011.9 1.5L21 13v4a1 1 0 01-1 1h-1a2 2 0 01-4 0H9a2 2 0 01-4 0H4a1 1 0 01-1-1v-4z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h3 class="text-sm font-bold text-charcoal leading-tight truncate sm:whitespace-normal">Wide Range of Vehicles</h3>
                    <p class="text-xs text-charcoal-muted mt-0.5 truncate sm:whitespace-normal">Sedans, SUVs, Tempo Travellers, Buses</p>
                </div>
            </div>

            <!-- 2. Verified Chauffeurs -->
            <div class="flex items-center gap-3.5 sm:gap-4 pt-3 sm:pt-0 lg:px-4">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h3 class="text-sm font-bold text-charcoal leading-tight truncate sm:whitespace-normal">Verified Chauffeurs</h3>
                    <p class="text-xs text-charcoal-muted mt-0.5 truncate sm:whitespace-normal">Experienced & Professional Drivers</p>
                </div>
            </div>

            <!-- 3. Airport Transfers -->
            <div class="flex items-center gap-3.5 sm:gap-4 pt-3 sm:pt-0 lg:px-4">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h3 class="text-sm font-bold text-charcoal leading-tight truncate sm:whitespace-normal">Airport Transfers</h3>
                    <p class="text-xs text-charcoal-muted mt-0.5 truncate sm:whitespace-normal">On-Time, Every Time</p>
                </div>
            </div>

            <!-- 4. Rajasthan & Intercity -->
            <div class="flex items-center gap-3.5 sm:gap-4 pt-3 sm:pt-0 lg:px-4 last:lg:pr-0">
                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <h3 class="text-sm font-bold text-charcoal leading-tight truncate sm:whitespace-normal">Rajasthan & Intercity</h3>
                    <p class="text-xs text-charcoal-muted mt-0.5 truncate sm:whitespace-normal">Local, Outstation & Tourist Routes</p>
                </div>
            </div>

        </div>
    </div>

    <!-- =========================================================================
         2. INTERACTIVE LIVE FARE & ROUTE CALCULATOR (Outstation, Local & Airport)
         ========================================================================= -->
    <section id="fare-calculator" 
             data-anchor="quick-booking"
             class="relative z-30 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 sm:mt-6"
             x-data="{
                 tab: 'outstation', // 'outstation', 'local', 'airport'
                 
                 // Outstation State
                 pickup: 'Jaipur',
                 outstationRoute: 'delhi',
                 customDestination: '',
                 customKm: 280,
                 tripType: 'one_way', // 'one_way' or 'round_trip'
                 days: 1,
                 travelDate: '{{ date('Y-m-d', strtotime('+1 day')) }}',
                 pickupTime: '06:00 AM',
                 
                 // Local State
                 localPackage: '8h_80k', // '4h_40k', '8h_80k', '12h_120k'
                 localDate: '{{ date('Y-m-d', strtotime('+1 day')) }}',
                 localTime: '09:00 AM',
                 
                 // Airport State
                 airportDirection: 'pickup', // 'pickup' or 'drop'
                 airportArea: 'city',
                 flightNumber: '',
                 airportDate: '{{ date('Y-m-d', strtotime('+1 day')) }}',
                 airportTime: '10:30 AM',
                 
                 // Selected Vehicle Key
                 selectedVehicle: 'crysta',
                 
                 // Vehicles Catalog
                 vehicles: {
                     'dzire': {
                         name: 'Maruti Suzuki Dzire',
                         type: 'Sedan (4+1 Seater)',
                         category: 'Car Rental',
                         seats: 4,
                         luggage: '2 Bags',
                         rate: 10,
                         driverAllowance: 300,
                         minKm: 250,
                         tag: 'Economy Choice',
                         localRates: { '4h_40k': 1200, '8h_80k': 1800, '12h_120k': 2400, extraKm: 11, extraHr: 150 },
                         airportRates: { 'city': 799, 'suburb': 899, 'outskirts': 1199 },
                         icon: '🚗'
                     },
                     'ertiga': {
                         name: 'Maruti Suzuki Ertiga',
                         type: 'MPV (6+1 Seater)',
                         category: 'Car Rental',
                         seats: 6,
                         luggage: '3 Bags',
                         rate: 12,
                         driverAllowance: 350,
                         minKm: 250,
                         tag: 'Family Value',
                         localRates: { '4h_40k': 1500, '8h_80k': 2200, '12h_120k': 2900, extraKm: 13, extraHr: 200 },
                         airportRates: { 'city': 1199, 'suburb': 1299, 'outskirts': 1599 },
                         icon: '🚙'
                     },
                     'crysta': {
                         name: 'Toyota Innova Crysta',
                         type: 'Executive SUV (7+1)',
                         category: 'Car Rental',
                         seats: 7,
                         luggage: '4 Bags',
                         rate: 16,
                         driverAllowance: 400,
                         minKm: 250,
                         tag: 'Most Popular',
                         localRates: { '4h_40k': 1800, '8h_80k': 2600, '12h_120k': 3400, extraKm: 17, extraHr: 250 },
                         airportRates: { 'city': 1499, 'suburb': 1599, 'outskirts': 1999 },
                         icon: '⭐'
                     },
                     'tempo12': {
                         name: '12-Seater Maharaja Tempo',
                         type: '1x1 Luxury Recliner',
                         category: 'Tempo Traveller',
                         seats: 12,
                         luggage: '10 Bags',
                         rate: 22,
                         driverAllowance: 500,
                         minKm: 250,
                         tag: 'Plush Recliner',
                         localRates: { '4h_40k': 3200, '8h_80k': 4500, '12h_120k': 5800, extraKm: 24, extraHr: 350 },
                         airportRates: { 'city': 2499, 'suburb': 2699, 'outskirts': 3200 },
                         icon: '🚐'
                     },
                     'tempo17': {
                         name: '17-Seater Tempo Traveller',
                         type: 'Pushback Group Coach',
                         category: 'Tempo Traveller',
                         seats: 17,
                         luggage: '15 Bags',
                         rate: 24,
                         driverAllowance: 500,
                         minKm: 250,
                         tag: 'Medium Group',
                         localRates: { '4h_40k': 3600, '8h_80k': 5000, '12h_120k': 6500, extraKm: 26, extraHr: 400 },
                         airportRates: { 'city': 2999, 'suburb': 3200, 'outskirts': 3800 },
                         icon: '🚐'
                     },
                     'tempo26': {
                         name: '26-Seater Mini Coach',
                         type: 'Mini Tourist Bus',
                         category: 'Tempo Traveller',
                         seats: 26,
                         luggage: '20 Bags',
                         rate: 32,
                         driverAllowance: 600,
                         minKm: 300,
                         tag: 'Weddings & Tour',
                         localRates: { '4h_40k': 4800, '8h_80k': 6500, '12h_120k': 8200, extraKm: 32, extraHr: 500 },
                         airportRates: { 'city': 3999, 'suburb': 4500, 'outskirts': 5200 },
                         icon: '🚌'
                     },
                     'bus45': {
                         name: 'Luxury Tourist Coach (45S)',
                         type: 'Deluxe AC Bus',
                         category: 'Bus Rental',
                         seats: 45,
                         luggage: '45 Bags',
                         rate: 45,
                         driverAllowance: 800,
                         minKm: 300,
                         tag: 'Large Delegations',
                         localRates: { '4h_40k': 6500, '8h_80k': 9500, '12h_120k': 12500, extraKm: 45, extraHr: 700 },
                         airportRates: { 'city': 5999, 'suburb': 6999, 'outskirts': 8500 },
                         icon: '🚍'
                     }
                 },
                 
                 // Route Presets
                 routes: {
                     'delhi': { name: 'Jaipur ➔ Delhi (NCR / IGI Airport)', destination: 'Delhi NCR', km: 270, time: '4.5 hrs', highway: 'NH-48 Expressway' },
                     'agra': { name: 'Jaipur ➔ Agra (Taj Mahal & Fort)', destination: 'Agra', km: 240, time: '4.0 hrs', highway: 'NH-21 Highway' },
                     'khatu': { name: 'Jaipur ➔ Khatu Shyam Ji & Salasar', destination: 'Khatu Shyam Ji', km: 180, time: '3.5 hrs', highway: 'Ringas Express Corridor' },
                     'pushkar': { name: 'Jaipur ➔ Ajmer Sharif & Pushkar', destination: 'Ajmer / Pushkar', km: 145, time: '2.5 hrs', highway: 'NH-48 Highway' },
                     'udaipur': { name: 'Jaipur ➔ Udaipur (City of Lakes)', destination: 'Udaipur', km: 395, time: '6.5 hrs', highway: 'NH-48 via Bhilwara' },
                     'jodhpur': { name: 'Jaipur ➔ Jodhpur (Sun City)', destination: 'Jodhpur', km: 335, time: '5.5 hrs', highway: 'NH-25 Expressway' },
                     'jaisalmer': { name: 'Jaipur ➔ Jaisalmer (Sam Sand Dunes)', destination: 'Jaisalmer', km: 570, time: '9.0 hrs', highway: 'NH-11 Desert Highway' },
                     'ranthambore': { name: 'Jaipur ➔ Ranthambore (Tiger Safari)', destination: 'Ranthambore / Sawai Madhopur', km: 165, time: '3.5 hrs', highway: 'Jaipur-Kota Highway' },
                     'bikaner': { name: 'Jaipur ➔ Bikaner (Junagarh Fort)', destination: 'Bikaner', km: 335, time: '5.5 hrs', highway: 'NH-52 Highway' },
                     'mount_abu': { name: 'Jaipur ➔ Mount Abu (Hill Station)', destination: 'Mount Abu', km: 495, time: '8.0 hrs', highway: 'NH-48 via Sirohi' },
                     'custom': { name: 'Custom Destination', destination: 'Custom Location', km: 250, time: 'Flexible', highway: 'State Highway' }
                 },
                 
                 // Modal Control
                 modalOpen: false,
                 
                 // Computed Helpers
                 get activeVehicle() {
                     return this.vehicles[this.selectedVehicle] || this.vehicles['crysta'];
                 },
                 
                 get activeRoute() {
                     if (this.outstationRoute === 'custom') {
                         return {
                             name: 'Jaipur ➔ ' + (this.customDestination || 'Outstation'),
                             destination: this.customDestination || 'Outstation',
                             km: parseInt(this.customKm) || 250,
                             time: 'As per route',
                             highway: 'Rajasthan State Highway'
                         };
                     }
                     return this.routes[this.outstationRoute] || this.routes['delhi'];
                 },
                 
                 get calculatedOutstationDistance() {
                     let oneWay = this.activeRoute.km;
                     if (this.tripType === 'one_way') {
                         return Math.max(this.activeVehicle.minKm, oneWay);
                     } else {
                         let roundTrip = oneWay * 2;
                         let minKmForDays = (parseInt(this.days) || 1) * this.activeVehicle.minKm;
                         return Math.max(roundTrip, minKmForDays);
                     }
                 },
                 
                 get calculatedFare() {
                     if (this.tab === 'outstation') {
                         let km = this.calculatedOutstationDistance;
                         let kmCharge = km * this.activeVehicle.rate;
                         let daysCount = (this.tripType === 'one_way') ? 1 : (parseInt(this.days) || 1);
                         let allowance = daysCount * this.activeVehicle.driverAllowance;
                         return Math.round(kmCharge + allowance);
                     } else if (this.tab === 'local') {
                         return this.activeVehicle.localRates[this.localPackage] || 2600;
                     } else if (this.tab === 'airport') {
                         return this.activeVehicle.airportRates[this.airportArea] || 1499;
                     }
                     return 0;
                 },
                 
                 get formattedCalculatedFare() {
                     return '₹' + this.calculatedFare.toLocaleString('en-IN');
                 },
                 
                 get whatsappUrl() {
                     let msg = '';
                     if (this.tab === 'outstation') {
                         let tripLabel = (this.tripType === 'one_way') ? 'One-Way Drop' : ('Round-Trip (' + this.days + ' Days)');
                         msg = `Namaste Sujata Tours! 🚖\n\nI want to check availability and book a vehicle:\n• Route: ${this.activeRoute.name}\n• Trip Type: ${tripLabel}\n• Vehicle: ${this.activeVehicle.name} (${this.activeVehicle.type})\n• Travel Date: ${this.travelDate} (${this.pickupTime})\n• Est. Distance: ${this.calculatedOutstationDistance} km\n• Estimated Fare: ${this.formattedCalculatedFare}\n\nPlease confirm vehicle availability and driver details.`;
                     } else if (this.tab === 'local') {
                         let pkgNames = {
                             '4h_40k': '4 Hours / 40 Kms (Half Day / Meetings)',
                             '8h_80k': '8 Hours / 80 Kms (Full Day Jaipur Sightseeing)',
                             '12h_120k': '12 Hours / 120 Kms (Extended Day / Forts & Outskirts)'
                         };
                         msg = `Namaste Sujata Tours! 🚖\n\nI want to book Jaipur Local City cab:\n• Package: ${pkgNames[this.localPackage]}\n• Vehicle: ${this.activeVehicle.name}\n• Date: ${this.localDate} (${this.localTime})\n• Estimated Fare: ${this.formattedCalculatedFare}\n\nPlease confirm booking schedule.`;
                     } else if (this.tab === 'airport') {
                         let dirLabel = (this.airportDirection === 'pickup') ? 'Pickup from Jaipur Airport (JAI)' : 'Drop to Jaipur Airport (JAI)';
                         let areaNames = {
                             'city': 'Jaipur City / Railway Station / MI Road / C-Scheme',
                             'suburb': 'Mansarovar / Vaishali Nagar / Jagatpura / Malviya Nagar',
                             'outskirts': 'Kukas / Amer Resorts / Chokhi Dhani / Sitapura'
                         };
                         msg = `Namaste Sujata Tours! ✈️\n\nI want to book Airport Transfer:\n• Type: ${dirLabel}\n• Area: ${areaNames[this.airportArea]}\n• Vehicle: ${this.activeVehicle.name}\n• Travel Date: ${this.airportDate} (${this.airportTime})\n• Flight No: ${this.flightNumber || 'Will provide upon confirmation'}\n• Fixed Fare: ${this.formattedCalculatedFare}\n\nPlease confirm airport cab allotment.`;
                     }
                     return 'https://wa.me/919829012345?text=' + encodeURIComponent(msg);
                 }
             }">
        
        <!-- Anchor tag to support old #quick-booking links -->
        <a id="quick-booking" class="absolute -top-28"></a>

        <!-- Main Calculator Card -->
        <div class="bg-white rounded-3xl shadow-[0_25px_60px_rgba(0,0,0,0.18)] border-2 border-white/90 overflow-hidden backdrop-blur-md">
            
            <!-- Header Strip & Tabs -->
            <div class="bg-charcoal-dark px-5 sm:px-8 py-5 border-b border-white/10 flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span class="text-xs font-bold uppercase tracking-widest text-sand-300">
                            Transparent Transparent Pricing • Instant Dispatch
                        </span>
                    </div>
                    <h2 class="font-serif text-xl sm:text-2xl text-white font-bold tracking-tight">
                        Interactive Fare & Route Calculator
                    </h2>
                </div>

                <!-- Segmented Service Tabs -->
                <div class="flex items-center bg-black/40 p-1.5 rounded-2xl border border-white/10 self-start md:self-auto">
                    <button type="button" 
                            @click="tab = 'outstation'" 
                            :class="tab === 'outstation' ? 'bg-primary text-white shadow-md' : 'text-sand-300 hover:text-white'"
                            class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition-all duration-200 flex items-center gap-1.5">
                        <span>🚕 Outstation Cabs</span>
                    </button>
                    <button type="button" 
                            @click="tab = 'local'" 
                            :class="tab === 'local' ? 'bg-primary text-white shadow-md' : 'text-sand-300 hover:text-white'"
                            class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition-all duration-200 flex items-center gap-1.5">
                        <span>🏙️ Local City Sightseeing</span>
                    </button>
                    <button type="button" 
                            @click="tab = 'airport'" 
                            :class="tab === 'airport' ? 'bg-primary text-white shadow-md' : 'text-sand-300 hover:text-white'"
                            class="px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider transition-all duration-200 flex items-center gap-1.5">
                        <span>✈️ Airport Transfer</span>
                    </button>
                </div>
            </div>

            <!-- Body Grid: Left Controls (7 cols) + Right Live Estimate Card (5 cols) -->
            <div class="p-6 sm:p-8 grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- Left Column: Interactive Controls -->
                <div class="lg:col-span-7 space-y-6">

                    <!-- TAB 1: OUTSTATION CONTROLS -->
                    <div x-show="tab === 'outstation'" class="space-y-5" x-transition>
                        
                        <!-- Trip Sub-type Toggle -->
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-charcoal-muted">Trip Type:</span>
                            <div class="inline-flex rounded-xl bg-sand-200 p-1 border border-border">
                                <button type="button" 
                                        @click="tripType = 'one_way'; if(days > 1) days = 1;"
                                        :class="tripType === 'one_way' ? 'bg-white text-charcoal shadow-sm font-bold' : 'text-charcoal-muted hover:text-charcoal font-medium'"
                                        class="px-4 py-1.5 rounded-lg text-xs transition-all">
                                    One-Way Drop
                                </button>
                                <button type="button" 
                                        @click="tripType = 'round_trip'; if(days < 2) days = 2;"
                                        :class="tripType === 'round_trip' ? 'bg-white text-charcoal shadow-sm font-bold' : 'text-charcoal-muted hover:text-charcoal font-medium'"
                                        class="px-4 py-1.5 rounded-lg text-xs transition-all">
                                    Round-Trip / Multi-Day
                                </button>
                            </div>
                        </div>

                        <!-- Route Selector & Custom Inputs -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>Pickup Location</span>
                                </label>
                                <input type="text" 
                                       x-model="pickup" 
                                       placeholder="e.g. Jaipur Hotel / Home / Station" 
                                       class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-xl px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                                    <span>Popular Destination</span>
                                </label>
                                <select x-model="outstationRoute" 
                                        class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-xl px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                                    <option value="delhi">Jaipur ➔ Delhi NCR (270 km)</option>
                                    <option value="agra">Jaipur ➔ Agra Taj Mahal (240 km)</option>
                                    <option value="khatu">Jaipur ➔ Khatu Shyam Ji & Salasar (180 km)</option>
                                    <option value="pushkar">Jaipur ➔ Ajmer & Pushkar (145 km)</option>
                                    <option value="udaipur">Jaipur ➔ Udaipur City of Lakes (395 km)</option>
                                    <option value="jodhpur">Jaipur ➔ Jodhpur Sun City (335 km)</option>
                                    <option value="jaisalmer">Jaipur ➔ Jaisalmer Sand Dunes (570 km)</option>
                                    <option value="ranthambore">Jaipur ➔ Ranthambore Tiger Safari (165 km)</option>
                                    <option value="bikaner">Jaipur ➔ Bikaner (335 km)</option>
                                    <option value="mount_abu">Jaipur ➔ Mount Abu (495 km)</option>
                                    <option value="custom">✍️ Custom Destination (Enter KMs)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Custom Destination / KMs if selected -->
                        <div x-show="outstationRoute === 'custom'" class="grid grid-cols-1 sm:grid-cols-2 gap-4 p-4 rounded-xl bg-sand-100 border border-border">
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-charcoal-muted mb-1">Enter Destination City</label>
                                <input type="text" x-model="customDestination" placeholder="e.g. Haridwar, Chandigarh, Kota" class="w-full text-xs font-semibold bg-white border border-border rounded-lg px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-[10px] uppercase font-bold text-charcoal-muted mb-1">Approx One-Way Distance (KM)</label>
                                <input type="number" x-model="customKm" min="50" max="3000" class="w-full text-xs font-semibold bg-white border border-border rounded-lg px-3 py-2">
                            </div>
                        </div>

                        <!-- Date, Time & Number of Days -->
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">Travel Date</label>
                                <input type="date" x-model="travelDate" min="{{ date('Y-m-d') }}" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3 py-2">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">Pickup Time</label>
                                <input type="text" x-model="pickupTime" placeholder="e.g. 06:00 AM" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3 py-2">
                            </div>
                            <div x-show="tripType === 'round_trip'">
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">Duration (Days)</label>
                                <select x-model="days" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3 py-2">
                                    <option value="1">1 Day</option>
                                    <option value="2">2 Days / 1 Night</option>
                                    <option value="3">3 Days / 2 Nights</option>
                                    <option value="4">4 Days / 3 Nights</option>
                                    <option value="5">5 Days / 4 Nights</option>
                                    <option value="7">7 Days Road Trip</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- TAB 2: LOCAL SIGHTSEEING CONTROLS -->
                    <div x-show="tab === 'local'" class="space-y-5" x-transition>
                        <span class="text-xs font-bold uppercase tracking-wider text-charcoal-muted block">Select City Package:</span>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <!-- 4h/40k -->
                            <button type="button" 
                                    @click="localPackage = '4h_40k'"
                                    :class="localPackage === '4h_40k' ? 'border-primary ring-2 ring-primary/20 bg-primary-50/40' : 'border-border bg-white hover:border-charcoal-subtle'"
                                    class="p-4 rounded-2xl border text-left transition-all">
                                <span class="block text-xs font-bold text-charcoal mb-1">4 Hrs / 40 Kms</span>
                                <span class="block text-[11px] text-charcoal-muted leading-tight mb-2">Half Day • Shopping & Business Meetings</span>
                                <span class="text-xs font-extrabold text-primary" x-text="'From ₹' + activeVehicle.localRates['4h_40k'].toLocaleString('en-IN')"></span>
                            </button>

                            <!-- 8h/80k -->
                            <button type="button" 
                                    @click="localPackage = '8h_80k'"
                                    :class="localPackage === '8h_80k' ? 'border-primary ring-2 ring-primary/20 bg-primary-50/40' : 'border-border bg-white hover:border-charcoal-subtle'"
                                    class="p-4 rounded-2xl border text-left transition-all relative">
                                <span class="absolute -top-2.5 right-3 bg-emerald-600 text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded-full">Most Popular</span>
                                <span class="block text-xs font-bold text-charcoal mb-1">8 Hrs / 80 Kms</span>
                                <span class="block text-[11px] text-charcoal-muted leading-tight mb-2">Full Day • Amer, Hawa Mahal, City Palace</span>
                                <span class="text-xs font-extrabold text-primary" x-text="'From ₹' + activeVehicle.localRates['8h_80k'].toLocaleString('en-IN')"></span>
                            </button>

                            <!-- 12h/120k -->
                            <button type="button" 
                                    @click="localPackage = '12h_120k'"
                                    :class="localPackage === '12h_120k' ? 'border-primary ring-2 ring-primary/20 bg-primary-50/40' : 'border-border bg-white hover:border-charcoal-subtle'"
                                    class="p-4 rounded-2xl border text-left transition-all">
                                <span class="block text-xs font-bold text-charcoal mb-1">12 Hrs / 120 Kms</span>
                                <span class="block text-[11px] text-charcoal-muted leading-tight mb-2">Extended Day • Forts + Chokhi Dhani</span>
                                <span class="text-xs font-extrabold text-primary" x-text="'From ₹' + activeVehicle.localRates['12h_120k'].toLocaleString('en-IN')"></span>
                            </button>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">Sightseeing Date</label>
                                <input type="date" x-model="localDate" min="{{ date('Y-m-d') }}" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3.5 py-2.5">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">Hotel / Pickup Point in Jaipur</label>
                                <input type="text" x-model="pickup" placeholder="e.g. Hotel in Bani Park / C-Scheme" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3.5 py-2.5">
                            </div>
                        </div>

                        <div class="p-3 bg-sand-100 rounded-xl text-[11px] text-charcoal-muted flex items-center justify-between">
                            <span>Extra KM rate: <strong class="text-charcoal" x-text="'₹' + activeVehicle.localRates.extraKm + '/km'"></strong></span>
                            <span>Extra Hour rate: <strong class="text-charcoal" x-text="'₹' + activeVehicle.localRates.extraHr + '/hr'"></strong></span>
                            <span>Toll & Parking: <strong class="text-charcoal">At actuals</strong></span>
                        </div>
                    </div>

                    <!-- TAB 3: AIRPORT TRANSFER CONTROLS -->
                    <div x-show="tab === 'airport'" class="space-y-5" x-transition>
                        
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold uppercase tracking-wider text-charcoal-muted">Transfer Type:</span>
                            <div class="inline-flex rounded-xl bg-sand-200 p-1 border border-border">
                                <button type="button" 
                                        @click="airportDirection = 'pickup'"
                                        :class="airportDirection === 'pickup' ? 'bg-white text-charcoal shadow-sm font-bold' : 'text-charcoal-muted hover:text-charcoal font-medium'"
                                        class="px-4 py-1.5 rounded-lg text-xs transition-all">
                                    🛬 Airport Pickup (To City)
                                </button>
                                <button type="button" 
                                        @click="airportDirection = 'drop'"
                                        :class="airportDirection === 'drop' ? 'bg-white text-charcoal shadow-sm font-bold' : 'text-charcoal-muted hover:text-charcoal font-medium'"
                                        class="px-4 py-1.5 rounded-lg text-xs transition-all">
                                    🛫 Airport Drop (From City)
                                </button>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1.5">City Zone / Destination Area</label>
                                <select x-model="airportArea" class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-xl px-3.5 py-2.5">
                                    <option value="city">Central Jaipur (Railway Station, MI Road, C-Scheme, Civil Lines)</option>
                                    <option value="suburb">Suburbs (Mansarovar, Vaishali Nagar, Malviya Nagar, Jagatpura)</option>
                                    <option value="outskirts">Outskirts (Kukas, Amer Resorts, Chokhi Dhani, Sitapura)</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1.5">Flight Number (Optional)</label>
                                <input type="text" x-model="flightNumber" placeholder="e.g. 6E-204 / AI-492" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3.5 py-2.5">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">Transfer Date</label>
                                <input type="date" x-model="airportDate" min="{{ date('Y-m-d') }}" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3.5 py-2.5">
                            </div>
                            <div>
                                <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">Landing / Pickup Time</label>
                                <input type="text" x-model="airportTime" placeholder="e.g. 10:30 AM" class="w-full text-xs font-semibold bg-sand-100 border border-border rounded-xl px-3.5 py-2.5">
                            </div>
                        </div>

                        <div class="p-3 bg-emerald-50 rounded-xl text-xs text-emerald-800 flex items-center gap-2 border border-emerald-200">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            <span>Guaranteed Punctual Driver • Placard Welcome at Jaipur Airport Terminal</span>
                        </div>
                    </div>

                    <!-- COMMON VEHICLE SELECTOR CHIPS (Across all tabs) -->
                    <div class="pt-4 border-t border-border">
                        <label class="block text-[11px] uppercase font-bold tracking-wider text-charcoal-muted mb-2.5 flex items-center justify-between">
                            <span>Select Your Fleet Vehicle:</span>
                            <span class="text-primary font-semibold" x-text="activeVehicle.name + ' (' + activeVehicle.seats + ' Seats)'"></span>
                        </label>

                        <!-- Responsive Vehicle Chips Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">
                            <template x-for="(veh, key) in vehicles" :key="key">
                                <button type="button" 
                                        @click="selectedVehicle = key"
                                        :class="selectedVehicle === key ? 'border-primary ring-2 ring-primary/20 bg-primary-50/50 shadow-sm' : 'border-border bg-white hover:border-charcoal-subtle'"
                                        class="p-2.5 rounded-xl border text-left transition-all duration-200 relative">
                                    <div class="flex items-center justify-between mb-1">
                                        <span class="text-base" x-text="veh.icon"></span>
                                        <span class="text-[9px] font-bold uppercase tracking-wider px-1.5 py-0.5 rounded bg-sand-200 text-charcoal" x-text="'₹' + veh.rate + '/km'"></span>
                                    </div>
                                    <span class="block text-xs font-bold text-charcoal truncate" x-text="veh.name"></span>
                                    <span class="block text-[10px] text-charcoal-muted" x-text="veh.seats + ' Seats • ' + veh.luggage"></span>
                                </button>
                            </template>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Live Calculated Fare Card (High Conversion Box) -->
                <div class="lg:col-span-5 bg-gradient-to-br from-sand-100 via-sand-50 to-white rounded-2xl border-2 border-primary/20 p-6 sm:p-7 shadow-float space-y-5">
                    
                    <div class="flex items-center justify-between pb-3 border-b border-border">
                        <span class="text-[10px] uppercase font-bold tracking-widest text-primary flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                            Live Estimated Quote
                        </span>
                        <span class="text-[11px] font-bold text-charcoal-muted" x-text="activeVehicle.tag"></span>
                    </div>

                    <!-- Big Price Display -->
                    <div class="space-y-1">
                        <div class="flex items-baseline gap-2">
                            <span class="font-serif text-3xl sm:text-4xl lg:text-5xl font-extrabold text-charcoal tracking-tight" x-text="formattedCalculatedFare"></span>
                            <span class="text-xs text-charcoal-muted uppercase tracking-wider font-semibold">Total Estimate</span>
                        </div>
                        <p class="text-[11px] text-emerald-700 font-medium">
                            ✓ Best Guaranteed Rajasthan Commercial Fleet Rate
                        </p>
                    </div>

                    <!-- Breakdown Box -->
                    <div class="bg-white rounded-xl p-4 border border-border text-xs space-y-2.5 shadow-sm">
                        
                        <div class="flex justify-between items-center text-charcoal-muted">
                            <span>Selected Vehicle:</span>
                            <strong class="text-charcoal" x-text="activeVehicle.name"></strong>
                        </div>

                        <!-- Outstation Breakdown -->
                        <template x-if="tab === 'outstation'">
                            <div class="space-y-2 border-t border-border/60 pt-2 text-charcoal-muted">
                                <div class="flex justify-between items-center">
                                    <span>Route Corridor:</span>
                                    <strong class="text-charcoal truncate max-w-[200px]" x-text="activeRoute.destination"></strong>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Estimated Distance:</span>
                                    <span class="font-semibold text-charcoal" x-text="calculatedOutstationDistance + ' KM (' + activeRoute.time + ')'"></span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Base Rate:</span>
                                    <span class="font-semibold text-charcoal" x-text="'₹' + activeVehicle.rate + ' / KM'"></span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Driver Allowance:</span>
                                    <span class="font-semibold text-charcoal" x-text="'₹' + activeVehicle.driverAllowance + ' × ' + ((tripType === 'one_way') ? 1 : days) + ' Day(s)'"></span>
                                </div>
                            </div>
                        </template>

                        <!-- Local Breakdown -->
                        <template x-if="tab === 'local'">
                            <div class="space-y-2 border-t border-border/60 pt-2 text-charcoal-muted">
                                <div class="flex justify-between items-center">
                                    <span>Package Type:</span>
                                    <strong class="text-charcoal" x-text="localPackage.replace('_', ' ').toUpperCase()"></strong>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Included:</span>
                                    <span class="font-semibold text-charcoal">Clean AC Vehicle + Chauffeur</span>
                                </div>
                            </div>
                        </template>

                        <!-- Airport Breakdown -->
                        <template x-if="tab === 'airport'">
                            <div class="space-y-2 border-t border-border/60 pt-2 text-charcoal-muted">
                                <div class="flex justify-between items-center">
                                    <span>Transfer Direction:</span>
                                    <strong class="text-charcoal" x-text="airportDirection === 'pickup' ? 'Airport ➔ City' : 'City ➔ Airport'"></strong>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Included:</span>
                                    <span class="font-semibold text-charcoal">Terminal Placard + Airport Parking</span>
                                </div>
                            </div>
                        </template>

                        <div class="pt-2 border-t border-border text-[10px] text-charcoal-subtle space-y-1">
                            <p>• <strong>Included:</strong> Vehicle rental, fuel charges, experienced commercial chauffeur.</p>
                            <p>• <strong>Excluded:</strong> Toll tax, state permit, parking fees (payable directly as per actual receipts).</p>
                        </div>

                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-2.5 pt-1">
                        
                        <!-- 1. Book on WhatsApp (Primary Conversion) -->
                        <a :href="whatsappUrl" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg hover:shadow-xl transition-all duration-200 active:scale-95">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                            <span>Book via WhatsApp Quote</span>
                        </a>

                        <!-- 2. Reserve Online Form Modal Trigger -->
                        <button type="button" 
                                @click="modalOpen = true"
                                class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-primary hover:bg-primary-hover text-white font-bold text-xs uppercase tracking-wider shadow-sm transition-all duration-200">
                            <span>Reserve Online (No Payment Needed)</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>

                    </div>

                    <!-- Immediate Call Help -->
                    <div class="text-center pt-2">
                        <span class="text-[11px] text-charcoal-muted">Need instant assistance?</span>
                        <a href="tel:+919829012345" class="text-xs font-bold text-charcoal hover:text-primary ml-1 inline-flex items-center gap-1">
                            <span>📞 098290 12345</span>
                        </a>
                    </div>

                </div>

            </div>

        </div>

        <!-- Sleek Slide-over / Modal for Finalizing Details and Submitting to Laravel Backend -->
        <div x-show="modalOpen" 
             x-cloak
             class="fixed inset-0 z-50 overflow-y-auto bg-charcoal-dark/75 backdrop-blur-sm flex items-center justify-center p-4"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            
            <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-card border border-border relative text-left"
                 @click.away="modalOpen = false">
                
                <button @click="modalOpen = false" 
                        class="absolute top-5 right-5 text-charcoal-muted hover:text-charcoal p-1.5 rounded-lg hover:bg-sand-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="mb-5 pb-4 border-b border-border">
                    <div class="inline-flex items-center gap-1.5 text-[10px] uppercase font-bold tracking-wider text-primary mb-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                        Quick Reservation Desk
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-charcoal">
                        Confirm Vehicle Reservation
                    </h3>
                    
                    <!-- Pre-calculated summary badge inside modal -->
                    <div class="mt-3 p-3 bg-sand-100 rounded-xl text-xs space-y-1">
                        <div class="flex justify-between items-center">
                            <span class="text-charcoal-muted">Vehicle:</span>
                            <strong class="text-charcoal" x-text="activeVehicle.name"></strong>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-charcoal-muted">Estimated Fare:</span>
                            <strong class="text-emerald-700 text-sm font-bold" x-text="formattedCalculatedFare"></strong>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-charcoal-muted">Schedule:</span>
                            <span class="text-charcoal font-medium" x-text="(tab === 'outstation' ? travelDate : (tab === 'local' ? localDate : airportDate)) + ' (' + (tab === 'outstation' ? pickupTime : (tab === 'local' ? localTime : airportTime)) + ')'"></span>
                        </div>
                    </div>
                </div>

                <!-- Form submitting directly to Laravel backend route('booking.store') -->
                <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Hidden synced fields from the calculator -->
                    <input type="hidden" name="pickup_location" :value="pickup || 'Jaipur City'">
                    <input type="hidden" name="drop_location" :value="tab === 'outstation' ? activeRoute.destination : (tab === 'local' ? ('Jaipur Local ' + localPackage) : ('Jaipur Airport ' + airportArea))">
                    <input type="hidden" name="travel_date" :value="tab === 'outstation' ? travelDate : (tab === 'local' ? localDate : airportDate)">
                    <input type="hidden" name="pickup_time" :value="tab === 'outstation' ? pickupTime : (tab === 'local' ? localTime : airportTime)">
                    <input type="hidden" name="vehicle_type" :value="activeVehicle.category">
                    <input type="hidden" name="specific_vehicle" :value="activeVehicle.name">
                    <input type="hidden" name="passenger_count" :value="activeVehicle.seats">
                    <input type="hidden" name="trip_type" :value="tab === 'outstation' ? (tripType === 'one_way' ? 'Outstation One-Way' : 'Outstation Round-Trip') : (tab === 'local' ? 'Local Rental' : 'Airport Transfer')">
                    
                    <!-- Auto-embed estimated fare into additional_requirements -->
                    <input type="hidden" name="additional_requirements" :value="'Calculated Estimate: ' + formattedCalculatedFare + ' | Tab: ' + tab + ' | Details: ' + (tab === 'outstation' ? (calculatedOutstationDistance + ' KM, ' + days + ' Days') : (tab === 'local' ? localPackage : (airportDirection + ' - ' + airportArea + ' ' + flightNumber)))">

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                            Your Full Name <span class="text-primary">*</span>
                        </label>
                        <input type="text" 
                               name="customer_name" 
                               required 
                               placeholder="e.g. Ramesh Sharma" 
                               class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-xl px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                                WhatsApp / Mobile Number <span class="text-primary">*</span>
                            </label>
                            <input type="tel" 
                                   name="customer_phone" 
                                   required 
                                   placeholder="+91 98290 12345" 
                                   class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-xl px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                                Email Address <span class="text-charcoal-subtle font-normal">(Optional)</span>
                            </label>
                            <input type="email" 
                                   name="customer_email" 
                                   placeholder="name@example.com" 
                                   class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-xl px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                        </div>
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                                class="w-full btn-primary py-3.5 rounded-xl text-xs font-bold uppercase tracking-wider shadow-md active:scale-95 transition-all">
                            Confirm Booking Inquiry
                        </button>
                        <p class="text-[10px] text-center text-charcoal-muted mt-2">
                            ✓ No advance payment required online. Our Jaipur central dispatch team will call you within 10 minutes to verify.
                        </p>
                    </div>
                </form>

            </div>
        </div>

    </section>

    <!-- =========================================================================
         3. INTRO / BRAND EDITORIAL SECTION (Asymmetrical Editorial Split)
         ========================================================================= -->
    <section class="pt-6 pb-20 sm:pt-10 sm:pb-24 lg:pt-12 lg:pb-28 bg-ivory">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left: Editorial Large Photography and Composition -->
                <div class="lg:col-span-6 relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-card border border-border/80 aspect-[4/3] sm:aspect-[16/11]">
                        <img src="{{ asset('images/fleet/jaipur-pink-city-hero.jpg') }}" 
                             alt="Sujata Tours Vehicle Fleet in Jaipur" 
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-charcoal-dark/50 via-transparent to-transparent"></div>
                    </div>

                    <!-- Subtle Overlapping Accent Badge -->
                    <div class="hidden sm:flex absolute -bottom-8 -right-6 bg-white p-5 rounded-xl shadow-float border border-border max-w-xs items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-sand-200 text-primary flex items-center justify-center font-serif text-xl font-bold flex-shrink-0">
                            15+
                        </div>
                        <div>
                            <span class="block text-xs font-bold text-charcoal uppercase tracking-wider">Years of Highway Trust</span>
                            <span class="text-[11px] text-charcoal-muted">Chauffeur-driven mobility across Rajasthan and North India</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Editorial Narrative Content -->
                <div class="lg:col-span-6 space-y-6 lg:pl-6 text-left">
                    <span class="inline-block text-[11px] uppercase tracking-[0.25em] font-bold text-primary">
                        SUJATA TOURS
                    </span>

                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal leading-[1.15] tracking-tight">
                        From Jaipur to Wherever the Road Takes You.
                    </h2>

                    <div class="space-y-4 text-sm sm:text-base text-charcoal-muted leading-relaxed font-light">
                        <p>
                            Vehicle rental is more than just booking wheels. It is the peace of mind knowing that your chauffeur knows the highway, your vehicle is mechanically immaculate, and your family or colleagues travel in absolute safety.
                        </p>
                        <p>
                            Headquartered in Jaipur, Sujata Tours provides executive sedans, spacious Toyota Innova Crystas, luxury pushback tempo travellers, and tourist coaches for local city assignments, airport arrivals, outstation Rajasthan circuits, and corporate delegations.
                        </p>
                    </div>

                    <!-- Simple Editorial Link -->
                    <div class="pt-4">
                        <a href="{{ route('about') }}" 
                           class="inline-flex items-center gap-2 text-xs uppercase tracking-widest font-bold text-charcoal hover:text-primary transition-colors group">
                            <span>About Sujata Tours</span>
                            <span class="transform group-hover:translate-x-1.5 transition-transform">→</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =========================================================================
         4. VEHICLE CATEGORIES ("Choose Your Way to Travel" - Large Dominant Images)
         ========================================================================= -->
    <section class="py-24 bg-sand-100 border-y border-border/70">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-16">
                <div>
                    <span class="block text-[11px] uppercase tracking-[0.25em] font-bold text-primary mb-2">
                        FLEET CLASSIFICATION
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal tracking-tight">
                        Choose Your Way to Travel
                    </h2>
                </div>
                <a href="{{ route('vehicles.index') }}" 
                   class="inline-flex items-center gap-2 text-xs uppercase tracking-wider font-bold text-charcoal hover:text-primary transition-colors group">
                    <span>Explore All Available Fleets</span>
                    <span class="transform group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>

            <!-- 3 Major Category Editorial Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Category 1: Cars -->
                <div class="group bg-white rounded-2xl overflow-hidden border border-border shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col">
                    <div class="relative aspect-[16/10] overflow-hidden bg-sand-200">
                        <img src="{{ asset('images/fleet/toyota-innova-crysta.jpg') }}" 
                             alt="Car Rental Sedans and SUVs" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-charcoal-dark/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                            4–7 Passengers
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="block text-[10px] uppercase font-bold tracking-widest text-primary mb-1">Sedans and Premium SUVs</span>
                            <h3 class="font-serif text-2xl font-bold text-charcoal mb-2">Car Rental</h3>
                            <p class="text-xs text-charcoal-muted leading-relaxed font-light mb-4">
                                Chauffeur-driven Swift Dzire, Toyota Innova Crysta, and Fortuner for local Jaipur running, airport pickups, and outstation Rajasthan trips.
                            </p>
                        </div>
                        <div class="pt-4 border-t border-border flex items-center justify-between">
                            <span class="text-xs font-semibold text-charcoal">Driver Included • Full AC</span>
                            <a href="{{ route('vehicles.cars') }}" class="text-xs font-bold text-primary hover:text-primary-hover flex items-center gap-1 group-hover:translate-x-1 transition-all">
                                <span>View Cars</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Category 2: Tempo Travellers -->
                <div class="group bg-white rounded-2xl overflow-hidden border border-border shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col">
                    <div class="relative aspect-[16/10] overflow-hidden bg-sand-200">
                        <img src="{{ asset('images/fleet/tempo-traveller-luxury.jpg') }}" 
                             alt="Luxury Tempo Traveller" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-charcoal-dark/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                            12–26 Passengers
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="block text-[10px] uppercase font-bold tracking-widest text-primary mb-1">Pushback and Maharaja</span>
                            <h3 class="font-serif text-2xl font-bold text-charcoal mb-2">Tempo Travellers</h3>
                            <p class="text-xs text-charcoal-muted leading-relaxed font-light mb-4">
                                Spacious 12, 17, and 26-seater Force Urbania and Maharaja tempo travellers equipped with reclining seats and generous luggage boot space.
                            </p>
                        </div>
                        <div class="pt-4 border-t border-border flex items-center justify-between">
                            <span class="text-xs font-semibold text-charcoal">High Roof • Long Distance</span>
                            <a href="{{ route('vehicles.tempo-travellers') }}" class="text-xs font-bold text-primary hover:text-primary-hover flex items-center gap-1 group-hover:translate-x-1 transition-all">
                                <span>View Travellers</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Category 3: Buses -->
                <div class="group bg-white rounded-2xl overflow-hidden border border-border shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col">
                    <div class="relative aspect-[16/10] overflow-hidden bg-sand-200">
                        <img src="{{ asset('images/fleet/luxury-coach-bus.jpg') }}" 
                             alt="Luxury Tourist Bus Coach" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute top-4 left-4 bg-charcoal-dark/80 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-full">
                            21–45 Passengers
                        </div>
                    </div>
                    <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between">
                        <div>
                            <span class="block text-[10px] uppercase font-bold tracking-widest text-primary mb-1">Mini and Luxury Coaches</span>
                            <h3 class="font-serif text-2xl font-bold text-charcoal mb-2">Bus Rental</h3>
                            <p class="text-xs text-charcoal-muted leading-relaxed font-light mb-4">
                                Reliable 21-seater mini buses and 45-seater luxury multi-axle coaches for marriage groups, corporate delegations, and large tour parties.
                            </p>
                        </div>
                        <div class="pt-4 border-t border-border flex items-center justify-between">
                            <span class="text-xs font-semibold text-charcoal">Air Suspension • PA System</span>
                            <a href="{{ route('vehicles.buses') }}" class="text-xs font-bold text-primary hover:text-primary-hover flex items-center gap-1 group-hover:translate-x-1 transition-all">
                                <span>View Buses</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- =========================================================================
         5. FEATURED VEHICLES (Horizontal Scroll / Carousel)
         ========================================================================= -->
    <section class="py-24 bg-ivory" x-data="{
        scrollLeft() {
            this.$refs.carousel.scrollBy({ left: -380, behavior: 'smooth' });
        },
        scrollRight() {
            this.$refs.carousel.scrollBy({ left: 380, behavior: 'smooth' });
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header and Controls -->
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-12">
                <div>
                    <span class="block text-[11px] uppercase tracking-[0.25em] font-bold text-primary mb-2">
                        HANDPICKED FLEET
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal tracking-tight">
                        Vehicles Ready for Your Journey
                    </h2>
                </div>

                <!-- Carousel Controls and View All -->
                <div class="flex items-center gap-4">
                    <a href="{{ route('vehicles.index') }}" 
                       class="hidden sm:inline-flex items-center gap-1.5 text-xs uppercase tracking-wider font-bold text-charcoal hover:text-primary transition-colors">
                        <span>View All Vehicles</span>
                        <span>→</span>
                    </a>
                    <div class="flex items-center gap-2">
                        <button @click="scrollLeft()" 
                                class="w-10 h-10 rounded-full border border-border bg-white hover:bg-sand-200 text-charcoal flex items-center justify-center transition-colors shadow-subtle focus:outline-none"
                                aria-label="Scroll left">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button @click="scrollRight()" 
                                class="w-10 h-10 rounded-full border border-border bg-white hover:bg-sand-200 text-charcoal flex items-center justify-center transition-colors shadow-subtle focus:outline-none"
                                aria-label="Scroll right">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Horizontal Scrollable Container -->
            <div x-ref="carousel" 
                 class="flex gap-6 overflow-x-auto pb-6 pt-2 snap-x snap-mandatory no-scrollbar -mx-4 px-4 sm:mx-0 sm:px-0">
                
                @foreach($featuredVehicles as $vehicle)
                    <div class="snap-start flex-shrink-0 w-[300px] sm:w-[360px] bg-white rounded-2xl border border-border shadow-card hover:shadow-card-hover transition-all duration-300 overflow-hidden flex flex-col justify-between">
                        
                        <!-- Vehicle Image -->
                        <div>
                            <div class="relative aspect-[16/10] overflow-hidden bg-sand-200">
                                <img src="{{ $vehicle->image_url }}" 
                                     alt="{{ $vehicle->name }}" 
                                     class="w-full h-full object-cover"
                                     loading="lazy"
                                     onerror="this.onerror=null;this.src='{{ asset('images/fleet/toyota-innova-crysta.jpg') }}';">
                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md px-2.5 py-1 rounded-full text-[10px] font-bold uppercase text-charcoal">
                                    {{ $vehicle->category ? $vehicle->category->name : 'Vehicle' }}
                                </div>
                            </div>

                            <div class="p-5 sm:p-6">
                                <h3 class="font-serif text-xl font-bold text-charcoal mb-2">
                                    {{ $vehicle->name }}
                                </h3>

                                <!-- Minimal Specs Strip -->
                                <div class="grid grid-cols-2 gap-2 text-[11px] text-charcoal-muted py-3 border-y border-border/80 my-3">
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                        <span>{{ $vehicle->seating_capacity }} Seater</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        <span>{{ $vehicle->ac_type }}</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                                        <span>{{ $vehicle->luggage_capacity }} Bags</span>
                                    </div>
                                    <div class="flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                        <span>Verified Driver</span>
                                    </div>
                                </div>

                                <p class="text-xs text-charcoal-muted line-clamp-2 font-light">
                                    {{ $vehicle->description }}
                                </p>
                            </div>
                        </div>

                        <!-- Card Footer -->
                        <div class="p-5 sm:p-6 pt-0 flex items-center justify-between">
                            <div>
                                @if($vehicle->starting_price)
                                    <span class="text-[10px] text-charcoal-muted uppercase tracking-wider block">From</span>
                                    <span class="font-serif text-lg font-bold text-charcoal">{{ $vehicle->starting_price }}</span>
                                @else
                                    <span class="text-xs font-semibold text-charcoal">Available on Request</span>
                                @endif
                            </div>
                            <a href="{{ route('vehicles.show', $vehicle->slug) }}" 
                               class="inline-flex items-center gap-1 text-xs font-bold uppercase tracking-wider text-primary hover:text-primary-hover transition-colors">
                                <span>Details</span>
                                <span>→</span>
                            </a>
                        </div>

                    </div>
                @endforeach

            </div>

            <!-- Mobile View All Link -->
            <div class="sm:hidden text-center mt-6">
                <a href="{{ route('vehicles.index') }}" 
                   class="btn-secondary w-full py-3 text-xs uppercase tracking-wider font-bold">
                    View All Vehicles →
                </a>
            </div>

        </div>
    </section>

    <!-- =========================================================================
         5B. SIGNATURE RAJASTHAN TOUR PACKAGES & SIGHTSEEING CIRCUITS
         ========================================================================= -->
    <section class="py-24 bg-surface-sand border-b border-border/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-14">
                <div>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-widest mb-3">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                        <span>Curated Holiday Circuits • Private Chauffeur Fleet</span>
                    </div>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal tracking-tight">
                        Popular Rajasthan Tour Packages
                    </h2>
                    <p class="text-xs sm:text-sm text-charcoal-muted mt-2 max-w-2xl font-light">
                        Fixed-price private vehicle tours with verified highway drivers, doorstep hotel pickup, flexible stops, and transparent pricing.
                    </p>
                </div>

                <a href="https://wa.me/919829012345?text=Namaste%20Sujata%20Tours!%20I%20want%20to%20customize%20a%20Rajasthan%20Tour%20Package." 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 text-xs uppercase tracking-wider font-bold text-primary hover:text-primary-hover transition-colors group self-start sm:self-auto">
                    <span>Customize Your Itinerary</span>
                    <span class="transform group-hover:translate-x-1 transition-transform">→</span>
                </a>
            </div>

            <!-- Tour Packages Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Package 1: Jaipur Local Heritage -->
                <div class="group bg-white rounded-3xl overflow-hidden border border-border shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[16/11] overflow-hidden bg-sand-200">
                            <img src="{{ asset('images/banners/banner-1-jaipur.jpg') }}" 
                                 alt="Jaipur Royal Heritage Tour" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <div class="absolute top-3.5 left-3.5 bg-emerald-600 text-white text-[9px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full shadow">
                                1 Day (8-10 Hrs)
                            </div>
                            <div class="absolute bottom-3 left-3.5 text-white">
                                <span class="text-[10px] text-sand-300 uppercase tracking-wider block font-semibold">City Circuit</span>
                                <h3 class="font-serif text-lg font-bold">Jaipur Royal Heritage</h3>
                            </div>
                        </div>

                        <div class="p-5 space-y-3.5 text-left">
                            <div class="text-[11px] text-charcoal-muted leading-relaxed space-y-1.5 border-b border-border pb-3">
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>Amber Fort, Jal Mahal, Hawa Mahal</span>
                                </p>
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>City Palace, Jantar Mantar, Nahargarh</span>
                                </p>
                            </div>

                            <ul class="text-[11px] text-charcoal space-y-1">
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Hotel / Railway Station Pickup</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Clean Chilled AC Vehicle</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Local Sightseeing Driver Guide</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-border/70 mt-2">
                        <div class="flex items-baseline justify-between mb-3 pt-3">
                            <span class="text-[10px] uppercase font-bold text-charcoal-muted tracking-wider">Starts From</span>
                            <div class="text-right">
                                <span class="font-serif text-xl font-black text-primary">₹2,200</span>
                                <span class="text-[10px] text-charcoal-muted block">per sedan car</span>
                            </div>
                        </div>

                        <a href="https://wa.me/919829012345?text=Namaste%20Sujata%20Tours!%20Mujhe%20Jaipur%20Royal%20Heritage%201-Day%20Tour%20package%20book%20karna%20hai." 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl bg-charcoal hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition-all duration-200">
                            <span>Book on WhatsApp</span>
                            <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Package 2: Khatu Shyam Ji & Salasar Balaji -->
                <div class="group bg-white rounded-3xl overflow-hidden border border-border shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col justify-between relative">
                    <span class="absolute top-3.5 right-3.5 z-20 bg-primary text-white text-[9px] font-bold uppercase tracking-wider px-2.5 py-0.5 rounded-full shadow">
                        Spiritual Special
                    </span>
                    <div>
                        <div class="relative aspect-[16/11] overflow-hidden bg-sand-200">
                            <img src="{{ asset('images/banners/banner-2-highway.jpg') }}" 
                                 alt="Khatu Shyam Ji and Salasar Balaji Yatra" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <div class="absolute top-3.5 left-3.5 bg-black/60 text-white text-[9px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full backdrop-blur-md">
                                Same-Day Tour
                            </div>
                            <div class="absolute bottom-3 left-3.5 text-white">
                                <span class="text-[10px] text-sand-300 uppercase tracking-wider block font-semibold">Devotional Circuit</span>
                                <h3 class="font-serif text-lg font-bold">Khatu Shyam & Salasar</h3>
                            </div>
                        </div>

                        <div class="p-5 space-y-3.5 text-left">
                            <div class="text-[11px] text-charcoal-muted leading-relaxed space-y-1.5 border-b border-border pb-3">
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>Jaipur ➔ Ringas ➔ Khatu Shyam Ji</span>
                                </p>
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>Salasar Balaji ➔ Jaipur Return</span>
                                </p>
                            </div>

                            <ul class="text-[11px] text-charcoal space-y-1">
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Early Morning 05:00 AM Departure</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Elder-Friendly Comfortable Ride</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Temple Wait Time Included</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-border/70 mt-2">
                        <div class="flex items-baseline justify-between mb-3 pt-3">
                            <span class="text-[10px] uppercase font-bold text-charcoal-muted tracking-wider">Starts From</span>
                            <div class="text-right">
                                <span class="font-serif text-xl font-black text-primary">₹3,800</span>
                                <span class="text-[10px] text-charcoal-muted block">round-trip cab</span>
                            </div>
                        </div>

                        <a href="https://wa.me/919829012345?text=Namaste%20Sujata%20Tours!%20Mujhe%20Khatu%20Shyam%20Ji%20aur%20Salasar%20Balaji%20same-day%20tour%20package%20book%20karna%20hai." 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl bg-charcoal hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition-all duration-200">
                            <span>Book on WhatsApp</span>
                            <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Package 3: Golden Triangle Odyssey -->
                <div class="group bg-white rounded-3xl overflow-hidden border border-border shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[16/11] overflow-hidden bg-sand-200">
                            <img src="{{ asset('images/fleet/intercity-highway-hero.jpg') }}" 
                                 alt="Golden Triangle India Tour" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <div class="absolute top-3.5 left-3.5 bg-charcoal-dark/90 text-white text-[9px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                                4 Days / 3 Nights
                            </div>
                            <div class="absolute bottom-3 left-3.5 text-white">
                                <span class="text-[10px] text-sand-300 uppercase tracking-wider block font-semibold">Flagship India Tour</span>
                                <h3 class="font-serif text-lg font-bold">Golden Triangle Classic</h3>
                            </div>
                        </div>

                        <div class="p-5 space-y-3.5 text-left">
                            <div class="text-[11px] text-charcoal-muted leading-relaxed space-y-1.5 border-b border-border pb-3">
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>Delhi ➔ Agra (Taj Mahal, Agra Fort)</span>
                                </p>
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>Fatehpur Sikri ➔ Jaipur (Pink City)</span>
                                </p>
                            </div>

                            <ul class="text-[11px] text-charcoal space-y-1">
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Dedicated Chauffeur for 4 Days</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>All Intercity Highway Driving</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Delhi Airport / Hotel Drop Included</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-border/70 mt-2">
                        <div class="flex items-baseline justify-between mb-3 pt-3">
                            <span class="text-[10px] uppercase font-bold text-charcoal-muted tracking-wider">Starts From</span>
                            <div class="text-right">
                                <span class="font-serif text-xl font-black text-primary">₹13,500</span>
                                <span class="text-[10px] text-charcoal-muted block">4 days sedan car</span>
                            </div>
                        </div>

                        <a href="https://wa.me/919829012345?text=Namaste%20Sujata%20Tours!%20Mujhe%20Golden%20Triangle%20(Delhi-Agra-Jaipur%204D/3N)%20package%20book%20karna%20hai." 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl bg-charcoal hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition-all duration-200">
                            <span>Book on WhatsApp</span>
                            <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Package 4: Royal Rajasthan Circuit -->
                <div class="group bg-white rounded-3xl overflow-hidden border border-border shadow-card hover:shadow-card-hover transition-all duration-300 flex flex-col justify-between">
                    <div>
                        <div class="relative aspect-[16/11] overflow-hidden bg-sand-200">
                            <img src="{{ asset('images/fleet/jaipur-pink-city-hero.jpg') }}" 
                                 alt="Royal Rajasthan Heritage Circuit" 
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent"></div>
                            <div class="absolute top-3.5 left-3.5 bg-navy-900 text-white text-[9px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">
                                5 Days / 4 Nights
                            </div>
                            <div class="absolute bottom-3 left-3.5 text-white">
                                <span class="text-[10px] text-sand-300 uppercase tracking-wider block font-semibold">Grand Heritage</span>
                                <h3 class="font-serif text-lg font-bold">Royal Rajasthan Circuit</h3>
                            </div>
                        </div>

                        <div class="p-5 space-y-3.5 text-left">
                            <div class="text-[11px] text-charcoal-muted leading-relaxed space-y-1.5 border-b border-border pb-3">
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>Jaipur ➔ Ajmer / Pushkar ➔ Jodhpur</span>
                                </p>
                                <p class="flex items-center gap-1.5">
                                    <span class="text-primary font-bold">📍</span>
                                    <span>Ranakpur Temples ➔ Udaipur Lake Pichola</span>
                                </p>
                            </div>

                            <ul class="text-[11px] text-charcoal space-y-1">
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Forts, Palaces & Desert Ghats</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Toyota Innova Crysta / Ertiga Choice</span>
                                </li>
                                <li class="flex items-center gap-1.5 text-emerald-700 font-medium">
                                    <span>✓</span> <span>Rajasthan Highway Mastery Driver</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="p-5 pt-0 border-t border-border/70 mt-2">
                        <div class="flex items-baseline justify-between mb-3 pt-3">
                            <span class="text-[10px] uppercase font-bold text-charcoal-muted tracking-wider">Starts From</span>
                            <div class="text-right">
                                <span class="font-serif text-xl font-black text-primary">₹21,500</span>
                                <span class="text-[10px] text-charcoal-muted block">5 days Ertiga/SUV</span>
                            </div>
                        </div>

                        <a href="https://wa.me/919829012345?text=Namaste%20Sujata%20Tours!%20Mujhe%20Royal%20Rajasthan%20Circuit%20(Jaipur-Jodhpur-Udaipur%205D/4N)%20package%20book%20karna%20hai." 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="w-full inline-flex items-center justify-center gap-2 py-2.5 px-3 rounded-xl bg-charcoal hover:bg-black text-white text-xs font-bold uppercase tracking-wider transition-all duration-200">
                            <span>Book on WhatsApp</span>
                            <svg class="w-3.5 h-3.5 text-emerald-400 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- =========================================================================
         6. JAIPUR / HERITAGE BRAND MOMENT (Single Cinematic Visual Section)
         ========================================================================= -->
    <section class="relative py-28 lg:py-36 bg-charcoal-dark overflow-hidden">
        
        <!-- Cinematic Sandstone Architecture Backdrop -->
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/fleet/jaipur-pink-city-hero.jpg') }}" 
                 alt="Born in the Pink City - Sujata Tours" 
                 class="w-full h-full object-cover object-center opacity-30 filter grayscale-[20%]">
            <div class="absolute inset-0 bg-gradient-to-r from-charcoal-dark via-charcoal-dark/80 to-charcoal-dark/60"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl space-y-6 text-left">
                
                <span class="inline-block text-[11px] uppercase tracking-[0.25em] font-bold text-primary">
                    ROYAL HERITAGE • MODERN RELIABILITY
                </span>

                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-white font-normal leading-[1.15] tracking-tight">
                    Born in the Pink City.<br>
                    <span class="italic font-light text-sand-200">Built for Every Journey.</span>
                </h2>

                <p class="text-sm sm:text-base text-sand-300 font-light leading-relaxed">
                    Rooted in Jaipur, Sujata Tours connects travellers to destinations across Rajasthan and beyond. From heritage city palaces to desert dunes and rapid intercity expressways, our vehicles are primed for the roads of India.
                </p>

                <!-- Minimalist Metrics Strip -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 pt-6 border-t border-white/10 text-white">
                    <div>
                        <span class="font-serif text-3xl font-bold text-white block">15+</span>
                        <span class="text-[10px] text-sand-400 uppercase tracking-wider">Years Experience</span>
                    </div>
                    <div>
                        <span class="font-serif text-3xl font-bold text-white block">65+</span>
                        <span class="text-[10px] text-sand-400 uppercase tracking-wider">Fleet Strength</span>
                    </div>
                    <div>
                        <span class="font-serif text-3xl font-bold text-white block">42k+</span>
                        <span class="text-[10px] text-sand-400 uppercase tracking-wider">Trips Completed</span>
                    </div>
                    <div>
                        <span class="font-serif text-3xl font-bold text-white block">24/7</span>
                        <span class="text-[10px] text-sand-400 uppercase tracking-wider">Dispatch Helpline</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- =========================================================================
         7. SERVICE COVERAGE ("Wherever You're Headed" - Editorial Map/Chips)
         ========================================================================= -->
    <section class="py-24 bg-sand-100 border-b border-border/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="max-w-3xl mb-12">
                <span class="block text-[11px] uppercase tracking-[0.25em] font-bold text-primary mb-2">
                    NORTH INDIA AND RAJASTHAN CORRIDORS
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal tracking-tight mb-4">
                    Wherever You're Headed
                </h2>
                <p class="text-sm sm:text-base text-charcoal-muted font-light leading-relaxed">
                    Whether you require a one-way highway transfer, an airport drop, or an extended multi-day family circuit, we cover all primary destinations with verified drivers.
                </p>
            </div>

            <!-- Minimalist Destination Chips / Links -->
            <div class="flex flex-wrap gap-3 sm:gap-4 mb-10">
                @php
                    $destinations = [
                        ['name' => 'Jaipur Hub', 'url' => url('/car-rental-jaipur'), 'type' => 'Local and Airport'],
                        ['name' => 'Delhi NCR', 'url' => url('/jaipur-to-delhi-taxi'), 'type' => 'Expressway Transfer'],
                        ['name' => 'Agra', 'url' => url('/outstation-cab-jaipur'), 'type' => 'Golden Triangle'],
                        ['name' => 'Jodhpur', 'url' => url('/jaipur-to-jodhpur-taxi'), 'type' => 'Sun City Express'],
                        ['name' => 'Udaipur', 'url' => url('/jaipur-to-udaipur-taxi'), 'type' => 'Lake City Route'],
                        ['name' => 'Jaisalmer', 'url' => url('/jaipur-to-jaisalmer-taxi'), 'type' => 'Thar Desert Circuit'],
                        ['name' => 'Ajmer and Pushkar', 'url' => url('/outstation-cab-jaipur'), 'type' => 'Day Pilgrimage'],
                        ['name' => 'Bikaner', 'url' => url('/outstation-cab-jaipur'), 'type' => 'Heritage Corridor'],
                        ['name' => 'Kota', 'url' => url('/outstation-cab-jaipur'), 'type' => 'Chambal Transit'],
                        ['name' => 'Ahmedabad', 'url' => url('/outstation-cab-jaipur'), 'type' => 'Western Transit'],
                        ['name' => 'Gurugram', 'url' => url('/jaipur-to-delhi-taxi'), 'type' => 'Corporate Direct'],
                        ['name' => 'Noida', 'url' => url('/jaipur-to-delhi-taxi'), 'type' => 'Expressway Direct'],
                    ];
                @endphp

                @foreach($destinations as $dest)
                    <a href="{{ $dest['url'] }}" 
                       class="group inline-flex items-center gap-3 px-5 py-3 rounded-xl bg-white border border-border shadow-subtle hover:border-primary hover:shadow-card transition-all">
                        <span class="w-2 h-2 rounded-full bg-primary/70 group-hover:scale-125 transition-transform"></span>
                        <div class="text-left">
                            <span class="block text-xs font-bold text-charcoal group-hover:text-primary transition-colors">{{ $dest['name'] }}</span>
                            <span class="block text-[10px] text-charcoal-muted font-light">{{ $dest['type'] }}</span>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pt-6 border-t border-border/80">
                <span class="text-xs text-charcoal-muted">
                    Need a custom multi-destination itinerary across Rajasthan? We build customized vehicle rental packages.
                </span>
                <a href="{{ url('/outstation-cab-jaipur') }}" 
                   class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-primary hover:text-primary-hover">
                    <span>Explore All Route Guides</span>
                    <span>→</span>
                </a>
            </div>

        </div>
    </section>

    <!-- =========================================================================
         8. WHY SUJATA TOURS (Split Editorial Layout - No 6-Card Grid)
         ========================================================================= -->
    <section class="py-24 lg:py-32 bg-ivory">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-start">
                
                <!-- Left: Big Statement -->
                <div class="lg:col-span-5 space-y-6 text-left">
                    <span class="inline-block text-[11px] uppercase tracking-[0.25em] font-bold text-primary">
                        THE SUJATA PROMISE
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal leading-[1.15] tracking-tight">
                        Transportation You Can Rely On.
                    </h2>
                    <p class="text-sm sm:text-base text-charcoal-muted font-light leading-relaxed">
                        We don't broker rides to unknown random cars. Every vehicle in our fleet is verified, mechanically maintained, and driven by a polite, seasoned highway professional.
                    </p>
                    <div class="pt-2">
                        <a href="tel:+919829012345" 
                           class="inline-flex items-center gap-2 text-xs uppercase tracking-wider font-bold text-primary hover:text-primary-hover">
                            <span>Speak With Our Fleet Manager</span>
                            <span>→</span>
                        </a>
                    </div>
                </div>

                <!-- Right: 4 Strong Benefits with Fine Line Icons -->
                <div class="lg:col-span-7 space-y-8">
                    
                    <div class="flex items-start gap-5">
                        <div class="w-11 h-11 rounded-xl bg-sand-200 text-primary flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-bold text-charcoal mb-1">Well-Maintained Vehicles</h3>
                            <p class="text-xs sm:text-sm text-charcoal-muted font-light leading-relaxed">
                                Regular mechanical servicing, tyre safety checks, high-performance air-conditioning, and hygienic seat upholstery prior to every assignment.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="w-11 h-11 rounded-xl bg-sand-200 text-primary flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-bold text-charcoal mb-1">Experienced Drivers</h3>
                            <p class="text-xs sm:text-sm text-charcoal-muted font-light leading-relaxed">
                                Professional chauffeurs with background checks, commercial licenses, polite demeanor, and mastery over desert highways and mountain ghats.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="w-11 h-11 rounded-xl bg-sand-200 text-primary flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-bold text-charcoal mb-1">Transparent Booking</h3>
                            <p class="text-xs sm:text-sm text-charcoal-muted font-light leading-relaxed">
                                Clear per-kilometer or package quotes. No unexpected driver fees, surge price hikes, or surprise deductions at the conclusion of your trip.
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-5">
                        <div class="w-11 h-11 rounded-xl bg-sand-200 text-primary flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div>
                            <h3 class="font-serif text-xl font-bold text-charcoal mb-1">Reliable Service</h3>
                            <p class="text-xs sm:text-sm text-charcoal-muted font-light leading-relaxed">
                                Punctual arrivals, 24x7 control room dispatch support, and real-time vehicle coordination for zero-stress departures.
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- =========================================================================
         9. HOW IT WORKS (Horizontal 4-Step Minimalist Timeline)
         ========================================================================= -->
    <section class="py-24 bg-sand-100 border-y border-border/80">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center max-w-2xl mx-auto mb-16">
                <span class="block text-[11px] uppercase tracking-[0.25em] font-bold text-primary mb-2">
                    SEAMLESS RENTAL PROCESS
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal tracking-tight">
                    How It Works
                </h2>
            </div>

            <!-- Horizontal 4-Step Sequence -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">
                
                <!-- Step 1 -->
                <div class="relative text-left">
                    <span class="font-serif text-5xl font-light text-primary/40 block mb-3">01</span>
                    <h3 class="font-serif text-lg font-bold text-charcoal mb-2">Choose Your Vehicle</h3>
                    <p class="text-xs text-charcoal-muted font-light leading-relaxed">
                        Pick the right car, tempo traveller, or coach according to your passenger count and travel style.
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="relative text-left">
                    <span class="font-serif text-5xl font-light text-primary/40 block mb-3">02</span>
                    <h3 class="font-serif text-lg font-bold text-charcoal mb-2">Share Your Journey</h3>
                    <p class="text-xs text-charcoal-muted font-light leading-relaxed">
                        Tell us your pickup address, dates, travel destinations, and special requirements.
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="relative text-left">
                    <span class="font-serif text-5xl font-light text-primary/40 block mb-3">03</span>
                    <h3 class="font-serif text-lg font-bold text-charcoal mb-2">Confirm Availability</h3>
                    <p class="text-xs text-charcoal-muted font-light leading-relaxed">
                        Receive a transparent fare quote and driver assignment confirmation from our dispatch desk.
                    </p>
                </div>

                <!-- Step 4 -->
                <div class="relative text-left">
                    <span class="font-serif text-5xl font-light text-primary/40 block mb-3">04</span>
                    <h3 class="font-serif text-lg font-bold text-charcoal mb-2">Travel Comfortably</h3>
                    <p class="text-xs text-charcoal-muted font-light leading-relaxed">
                        Your sanitized vehicle arrives on time with a courteous chauffeur ready for the highway.
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- =========================================================================
         10. CUSTOMER TESTIMONIALS (Premium Editorial Carousel)
         ========================================================================= -->
    <section class="py-24 lg:py-32 bg-ivory" x-data="{
        activeTestimonial: 0,
        total: {{ count($testimonials) }},
        next() {
            this.activeTestimonial = (this.activeTestimonial + 1) % this.total;
        },
        prev() {
            this.activeTestimonial = (this.activeTestimonial - 1 + this.total) % this.total;
        }
    }">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            
            <span class="inline-block text-[11px] uppercase tracking-[0.25em] font-bold text-primary mb-3">
                REAL CLIENT EXPERIENCES
            </span>

            <h2 class="font-serif text-3xl sm:text-4xl text-charcoal font-normal tracking-tight mb-12">
                What Travellers Say
            </h2>

            <div class="relative min-h-[220px] flex items-center justify-center">
                @foreach($testimonials as $index => $t)
                    <div x-show="activeTestimonial === {{ $index }}"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-3"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 -translate-y-3"
                         class="max-w-3xl mx-auto">
                        
                        <div class="text-primary text-2xl mb-4">★★★★★</div>
                        
                        <p class="font-serif text-xl sm:text-2xl md:text-3xl text-charcoal font-light italic leading-relaxed mb-6">
                            &ldquo;{{ $t->quote }}&rdquo;
                        </p>

                        <div>
                            <span class="block text-sm font-bold text-charcoal uppercase tracking-wider">{{ $t->customer_name }}</span>
                            <span class="text-xs text-charcoal-muted font-light">{{ $t->trip_type }} • {{ $t->customer_city }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <div class="flex items-center justify-center gap-4 mt-8">
                <button @click="prev()" 
                        class="w-10 h-10 rounded-full border border-border bg-white hover:bg-sand-200 text-charcoal flex items-center justify-center transition-colors shadow-subtle focus:outline-none"
                        aria-label="Previous review">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <div class="flex gap-1.5">
                    @foreach($testimonials as $idx => $t)
                        <span class="w-2 h-2 rounded-full cursor-pointer transition-all"
                              @click="activeTestimonial = {{ $idx }}"
                              :class="activeTestimonial === {{ $idx }} ? 'bg-primary w-6' : 'bg-border'"></span>
                    @endforeach
                </div>
                <button @click="next()" 
                        class="w-10 h-10 rounded-full border border-border bg-white hover:bg-sand-200 text-charcoal flex items-center justify-center transition-colors shadow-subtle focus:outline-none"
                        aria-label="Next review">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>

        </div>
    </section>

    <!-- =========================================================================
         11. FAQ SECTION (Clean Minimal Accordion)
         ========================================================================= -->
    <section class="py-24 bg-sand-100 border-t border-border/80">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-center mb-16">
                <span class="block text-[11px] uppercase tracking-[0.25em] font-bold text-primary mb-2">
                    CLEAR POLICIES
                </span>
                <h2 class="font-serif text-3xl sm:text-4xl text-charcoal font-normal tracking-tight">
                    Frequently Asked Questions
                </h2>
            </div>

            <div class="space-y-4" x-data="{ openFaq: 0 }">
                @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-xl border border-border overflow-hidden transition-all shadow-subtle">
                        <button type="button" 
                                @click="openFaq = (openFaq === {{ $index }} ? null : {{ $index }})" 
                                class="w-full py-4 px-6 text-left flex justify-between items-center gap-4 focus:outline-none">
                            <span class="font-serif text-base sm:text-lg font-bold text-charcoal"
                                  :class="openFaq === {{ $index }} ? 'text-primary' : 'text-charcoal'">
                                {{ $faq->question }}
                            </span>
                            <span class="w-6 h-6 rounded-full bg-sand-100 flex items-center justify-center flex-shrink-0 text-charcoal transition-transform"
                                  :class="openFaq === {{ $index }} ? 'rotate-180 bg-primary text-white' : ''">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                            </span>
                        </button>
                        <div x-show="openFaq === {{ $index }}" 
                             x-collapse
                             class="px-6 pb-5 pt-1 text-xs sm:text-sm text-charcoal-muted leading-relaxed font-light border-t border-border/40">
                            {{ $faq->answer }}
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-10">
                <p class="text-xs text-charcoal-muted">
                    Have additional questions regarding permits, expressway tolls, or multi-day itineraries? 
                    <a href="tel:+919829012345" class="text-primary font-bold hover:underline ml-1">Call our helpline (+91 98290 12345)</a>
                </p>
            </div>

        </div>
    </section>

    <!-- =========================================================================
         12. FINAL CALL TO ACTION (Cinematic Full-Width Section)
         ========================================================================= -->
    <section class="relative py-28 lg:py-36 bg-charcoal-dark overflow-hidden">
        
        <div class="absolute inset-0 w-full h-full">
            <img src="{{ asset('images/fleet/intercity-highway-hero.jpg') }}" 
                 alt="Ready for Your Next Journey - Sujata Tours" 
                 class="w-full h-full object-cover object-center opacity-30">
            <div class="absolute inset-0 bg-gradient-to-t from-charcoal-dark via-charcoal-dark/70 to-charcoal-dark/50"></div>
        </div>

        <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            
            <span class="inline-block text-[11px] uppercase tracking-[0.25em] font-bold text-primary">
                START YOUR JOURNEY TODAY
            </span>

            <h2 class="font-serif text-3xl sm:text-5xl lg:text-6xl text-white font-normal leading-[1.1] tracking-tight">
                Ready for Your Next Journey?
            </h2>

            <p class="text-sm sm:text-base md:text-lg text-sand-300 font-light max-w-2xl mx-auto leading-relaxed">
                Tell us where you're going and we'll help you choose the right vehicle with transparent pricing and verified chauffeurs.
            </p>

            <div class="flex flex-wrap items-center justify-center gap-4 pt-4">
                <a href="#quick-booking" 
                   class="btn-primary text-xs sm:text-sm uppercase tracking-wider font-bold px-8 py-4 rounded-lg shadow-float">
                    Book a Vehicle
                </a>

                <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20need%20a%20vehicle%20quote" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="inline-flex items-center gap-2 px-8 py-4 rounded-lg text-xs sm:text-sm uppercase tracking-wider font-bold text-white bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/25 transition-all">
                    <span>WhatsApp Us</span>
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>

            <div class="pt-6 text-xs text-sand-400/80">
                <span>Direct Dispatch Office: </span>
                <a href="tel:+919829012345" class="text-white font-bold hover:underline">+91 98290 12345</a>
                <span class="mx-2">•</span>
                <span>24x7 Fleet Assistance</span>
            </div>

        </div>
    </section>

@endsection
