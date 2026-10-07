@extends('layouts.app')

@section('title', 'Sujata Tours | Premium Car, Tempo Traveller & Bus Rentals')
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
         1. CINEMATIC FULL-WIDTH HERO SLIDER
         ========================================================================= -->
    <section class="relative bg-charcoal-dark overflow-hidden" 
             x-data="{
                 activeSlide: 0,
                 totalSlides: 4,
                 autoplayInterval: null,
                 slides: [
                     {
                         title: 'Your Journey.<br><span class=\"italic font-light text-sand-200\">Our Finest Vehicles.</span>',
                         subtitle: 'Premium cars, tempo travellers and buses for local, outstation and group travel.',
                         image: '{{ asset('images/fleet/jaipur-pink-city-hero.jpg') }}',
                         tag: 'SUJATA TOURS • FLEET & CHAUFFEUR',
                         cta1: 'Book a Vehicle',
                         cta1Action: 'openBooking',
                         cta2: 'Explore Vehicles',
                         cta2Link: '{{ route('vehicles.index') }}'
                     },
                     {
                         title: 'Go Further.<br><span class=\"italic font-light text-sand-200\">Travel Comfortably.</span>',
                         subtitle: 'Chauffeur-driven highway fleets across Rajasthan, Delhi NCR, Agra and North India.',
                         image: '{{ asset('images/fleet/intercity-highway-hero.jpg') }}',
                         tag: 'LONG DISTANCE & OUTSTATION CORRIDORS',
                         cta1: 'Explore Vehicles',
                         cta1Action: 'link',
                         cta1Link: '{{ route('vehicles.index') }}',
                         cta2: 'View Popular Routes',
                         cta2Link: '{{ url('/outstation-cab-jaipur') }}'
                     },
                     {
                         title: 'Travel Together.<br><span class=\"italic font-light text-sand-200\">Travel Better.</span>',
                         subtitle: 'Spacious 12 to 26-seater luxury tempo travellers engineered for group comfort.',
                         image: '{{ asset('images/fleet/tempo-traveller-luxury.jpg') }}',
                         tag: 'LUXURY GROUP MOBILITY',
                         cta1: 'Book a Vehicle',
                         cta1Action: 'openBooking',
                         cta2: 'View Tempo Travellers',
                         cta2Link: '{{ route('vehicles.tempo-travellers') }}'
                     },
                     {
                         title: 'Reliable Travel,<br><span class=\"italic font-light text-sand-200\">Wherever You Go.</span>',
                         subtitle: 'Punctual airport transfers, local city rentals, and executive business transit.',
                         image: '{{ asset('images/fleet/toyota-innova-crysta.jpg') }}',
                         tag: 'CHAUFFEUR SERVICE & AIRPORT TRANSFERS',
                         cta1: 'Get a Quote',
                         cta1Action: 'openBooking',
                         cta2: 'Explore Cars',
                         cta2Link: '{{ route('vehicles.cars') }}'
                     }
                 ],
                 next() {
                     this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
                 },
                 prev() {
                     this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides;
                 },
                 goTo(i) {
                     this.activeSlide = i;
                 },
                 startAutoplay() {
                     this.autoplayInterval = setInterval(() => { this.next(); }, 6500);
                 },
                 stopAutoplay() {
                     if (this.autoplayInterval) clearInterval(this.autoplayInterval);
                 }
             }"
             x-init="startAutoplay()"
             @mouseenter="stopAutoplay()"
             @mouseleave="startAutoplay()">

        <!-- Slider Images & Backdrop -->
        <div class="relative h-[85vh] sm:h-[88vh] lg:h-[90vh] min-h-[580px] w-full">
            <template x-for="(slide, index) in slides" :key="index">
                <div x-show="activeSlide === index"
                     x-transition:enter="transition ease-out duration-1000"
                     x-transition:enter-start="opacity-0 scale-105"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-700"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute inset-0 w-full h-full">
                    
                    <!-- Background Image with Cinematic Crop -->
                    <img :src="slide.image" 
                         :alt="slide.tag"
                         class="w-full h-full object-cover object-center transform transition-transform duration-[8000ms] ease-out scale-105"
                         :class="activeSlide === index ? 'scale-100' : 'scale-105'">
                    
                    <!-- Subtle Dark Gradient Vignette for Readability -->
                    <div class="absolute inset-0 bg-gradient-to-t from-charcoal-dark via-charcoal-dark/45 to-charcoal-dark/25"></div>
                    <div class="absolute inset-0 bg-gradient-to-r from-charcoal-dark/80 via-charcoal-dark/30 to-transparent"></div>
                </div>
            </template>

            <!-- Hero Slide Content Overlay -->
            <div class="relative z-20 h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-center">
                <div class="max-w-3xl pt-16 sm:pt-20">
                    
                    <!-- Eyebrow Badge -->
                    <div class="inline-flex items-center gap-2.5 px-3.5 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-sand-200 text-xs tracking-widest font-semibold uppercase mb-6">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                        <span x-text="slides[activeSlide].tag"></span>
                    </div>

                    <!-- Main Cinematic Heading -->
                    <h1 class="font-serif text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-normal text-white leading-[1.08] tracking-tight mb-6"
                        x-html="slides[activeSlide].title">
                    </h1>

                    <!-- Supporting Text -->
                    <p class="text-base sm:text-lg lg:text-xl text-sand-200/90 font-light leading-relaxed max-w-2xl mb-8"
                       x-text="slides[activeSlide].subtitle">
                    </p>

                    <!-- CTAs -->
                    <div class="flex flex-wrap items-center gap-4">
                        <template x-if="slides[activeSlide].cta1Action === 'openBooking'">
                            <a href="#quick-booking" 
                               class="btn-primary text-xs sm:text-sm uppercase tracking-wider font-bold px-7 py-3.5 rounded-lg shadow-float">
                                <span x-text="slides[activeSlide].cta1"></span>
                            </a>
                        </template>
                        <template x-if="slides[activeSlide].cta1Action === 'link'">
                            <a :href="slides[activeSlide].cta1Link" 
                               class="btn-primary text-xs sm:text-sm uppercase tracking-wider font-bold px-7 py-3.5 rounded-lg shadow-float">
                                <span x-text="slides[activeSlide].cta1"></span>
                            </a>
                        </template>

                        <a :href="slides[activeSlide].cta2Link" 
                           class="inline-flex items-center gap-2 px-6 py-3.5 rounded-lg text-xs sm:text-sm uppercase tracking-wider font-bold text-white bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 transition-all">
                            <span x-text="slides[activeSlide].cta2"></span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>

                </div>
            </div>

            <!-- Slider Navigation Controls & Numbering -->
            <div class="absolute bottom-16 sm:bottom-20 right-4 sm:right-8 lg:right-12 z-30 flex items-center gap-6">
                <!-- Slide Number Display -->
                <div class="text-sand-300 font-serif text-sm tracking-widest flex items-center gap-1.5">
                    <span class="text-white text-base font-bold" x-text="'0' + (activeSlide + 1)"></span>
                    <span class="text-sand-400/50">/</span>
                    <span class="text-sand-400 text-xs" x-text="'0' + totalSlides"></span>
                </div>

                <!-- Navigation Arrow Buttons -->
                <div class="flex items-center gap-2">
                    <button @click="prev()" 
                            class="w-10 h-10 rounded-full border border-white/25 bg-black/30 hover:bg-white hover:text-charcoal text-white flex items-center justify-center transition-all focus:outline-none"
                            aria-label="Previous Slide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                    <button @click="next()" 
                            class="w-10 h-10 rounded-full border border-white/25 bg-black/30 hover:bg-white hover:text-charcoal text-white flex items-center justify-center transition-all focus:outline-none"
                            aria-label="Next Slide">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>

            <!-- Progress Indicator Bar -->
            <div class="absolute bottom-0 left-0 right-0 z-30 h-1 bg-white/10 flex">
                <template x-for="i in totalSlides" :key="i">
                    <div class="h-full flex-1 transition-all duration-300 cursor-pointer"
                         @click="goTo(i - 1)"
                         :class="(activeSlide === i - 1) ? 'bg-primary' : 'bg-transparent hover:bg-white/20'">
                    </div>
                </template>
            </div>
        </div>

    </section>

    <!-- =========================================================================
         2. FLOATING QUICK BOOKING / AVAILABILITY BAR (Overlaps bottom of Hero)
         ========================================================================= -->
    <section id="quick-booking" 
             class="relative z-30 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 sm:-mt-14"
             x-data="{
                 pickup: 'Jaipur',
                 drop: '',
                 travelDate: '{{ date('Y-m-d', strtotime('+1 day')) }}',
                 vehicleType: 'Car Rental',
                 passengers: '4',
                 modalOpen: false
             }">
        
        <div class="bg-white rounded-2xl shadow-float border border-border p-5 sm:p-7 backdrop-blur-md">
            
            <form @submit.prevent="modalOpen = true" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3.5 items-end">
                    
                    <!-- 1. From (Pickup) -->
                    <div>
                        <label class="block text-[10px] uppercase font-bold tracking-wider text-charcoal-muted mb-1 flex items-center gap-1">
                            <svg class="w-3 h-3 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>From (Pickup)</span>
                        </label>
                        <input type="text" 
                               x-model="pickup" 
                               placeholder="e.g. Jaipur Airport / City" 
                               required
                               class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>

                    <!-- 2. To (Drop) -->
                    <div>
                        <label class="block text-[10px] uppercase font-bold tracking-wider text-charcoal-muted mb-1 flex items-center gap-1">
                            <svg class="w-3 h-3 text-secondary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            <span>To (Drop / Destination)</span>
                        </label>
                        <input type="text" 
                               x-model="drop" 
                               placeholder="e.g. Delhi, Udaipur, Local" 
                               required
                               class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>

                    <!-- 3. Travel Date -->
                    <div>
                        <label class="block text-[10px] uppercase font-bold tracking-wider text-charcoal-muted mb-1 flex items-center gap-1">
                            <svg class="w-3 h-3 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Travel Date</span>
                        </label>
                        <input type="date" 
                               x-model="travelDate" 
                               required
                               min="{{ date('Y-m-d') }}"
                               class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>

                    <!-- 4. Vehicle Type -->
                    <div>
                        <label class="block text-[10px] uppercase font-bold tracking-wider text-charcoal-muted mb-1">
                            Vehicle Category
                        </label>
                        <select x-model="vehicleType"
                                class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                            <option value="Car Rental">Cars & SUVs (4–7 Seats)</option>
                            <option value="Tempo Traveller">Tempo Traveller (12–26 Seats)</option>
                            <option value="Bus Rental">Tourist Bus (21–45 Seats)</option>
                        </select>
                    </div>

                    <!-- 5. CTA Button -->
                    <div>
                        <button type="submit" 
                                class="w-full btn-primary py-2.5 px-4 text-xs font-bold uppercase tracking-wider rounded-lg shadow-sm flex items-center justify-center gap-2">
                            <span>Check Availability</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>

                </div>
            </form>

        </div>

        <!-- Sleek Slide-over / Modal for Finalizing Details and Submitting to Laravel Backend -->
        <div x-show="modalOpen" 
             x-cloak
             class="fixed inset-0 z-50 overflow-y-auto bg-charcoal-dark/70 backdrop-blur-sm flex items-center justify-center p-4"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95">
            
            <div class="bg-white rounded-2xl max-w-lg w-full p-6 sm:p-8 shadow-card border border-border relative text-left"
                 @click.away="modalOpen = false">
                
                <button @click="modalOpen = false" 
                        class="absolute top-5 right-5 text-charcoal-muted hover:text-charcoal p-1.5 rounded-lg hover:bg-sand-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>

                <div class="mb-5 pb-4 border-b border-border">
                    <div class="inline-flex items-center gap-1.5 text-[10px] uppercase font-bold tracking-wider text-primary mb-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                        Direct Booking Desk
                    </div>
                    <h3 class="font-serif text-2xl font-bold text-charcoal">
                        Confirm Journey Availability
                    </h3>
                    <p class="text-xs text-charcoal-muted mt-1">
                        Route: <strong class="text-charcoal" x-text="pickup"></strong> to <strong class="text-charcoal" x-text="drop || 'Local Sightseeing'"></strong> on <strong class="text-charcoal" x-text="travelDate"></strong>
                    </p>
                </div>

                <!-- Form submitting directly to Laravel backend route('booking.store') -->
                <form action="{{ route('booking.store') }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Hidden synced fields from the floating bar -->
                    <input type="hidden" name="pickup_location" :value="pickup">
                    <input type="hidden" name="drop_location" :value="drop || 'Local Running'">
                    <input type="hidden" name="travel_date" :value="travelDate">
                    <input type="hidden" name="vehicle_type" :value="vehicleType">
                    <input type="hidden" name="passenger_count" :value="passengers">
                    <input type="hidden" name="trip_type" value="Outstation">

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                            Your Name <span class="text-primary">*</span>
                        </label>
                        <input type="text" 
                               name="customer_name" 
                               required 
                               placeholder="e.g. Ramesh Sharma" 
                               class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                                Mobile Number <span class="text-primary">*</span>
                            </label>
                            <input type="tel" 
                                   name="customer_phone" 
                                   required 
                                   placeholder="+91 98290 12345" 
                                   class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                                Email Address <span class="text-charcoal-subtle font-normal">(Optional)</span>
                            </label>
                            <input type="email" 
                                   name="customer_email" 
                                   placeholder="name@example.com" 
                                   class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3.5 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                                Passengers
                            </label>
                            <select name="passenger_count" 
                                    x-model="passengers"
                                    class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                                <option value="2">1–2 Passengers</option>
                                <option value="4">3–4 Passengers</option>
                                <option value="6">5–6 Passengers</option>
                                <option value="12">7–12 Passengers</option>
                                <option value="17">13–17 Passengers</option>
                                <option value="26">18–26 Passengers</option>
                                <option value="45">27+ Passengers (Bus)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                                Pickup Time
                            </label>
                            <input type="text" 
                                   name="pickup_time" 
                                   placeholder="e.g. 06:00 AM" 
                                   class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3 py-2.5 focus:ring-1 focus:ring-primary focus:border-primary">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">
                            Trip Notes / Vehicle Preference <span class="text-charcoal-subtle font-normal">(Optional)</span>
                        </label>
                        <input type="text" 
                               name="additional_requirements" 
                               placeholder="e.g. Innova Crysta required, airport pickup flight 6E-204" 
                               class="w-full text-xs font-semibold text-charcoal bg-sand-100 border border-border rounded-lg px-3 py-2 focus:ring-1 focus:ring-primary focus:border-primary">
                    </div>

                    <div class="pt-2">
                        <button type="submit" 
                                class="w-full btn-primary py-3 rounded-lg text-xs font-bold uppercase tracking-wider shadow-md">
                            Submit & Check Availability
                        </button>
                        <p class="text-[10px] text-center text-charcoal-muted mt-2">
                            No immediate payment required. Our dispatch team will confirm vehicle allotment promptly.
                        </p>
                    </div>
                </form>

            </div>
        </div>

    </section>

    <!-- =========================================================================
         3. INTRO / BRAND EDITORIAL SECTION (Asymmetrical Editorial Split)
         ========================================================================= -->
    <section class="py-24 lg:py-32 bg-ivory">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">
                
                <!-- Left: Editorial Large Photography & Composition -->
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
                            <span class="text-[11px] text-charcoal-muted">Chauffeur-driven mobility across Rajasthan & North India</span>
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
                            <span class="block text-[10px] uppercase font-bold tracking-widest text-primary mb-1">Sedans & Premium SUVs</span>
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
                            <span class="block text-[10px] uppercase font-bold tracking-widest text-primary mb-1">Pushback & Maharaja</span>
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
                            <span class="block text-[10px] uppercase font-bold tracking-widest text-primary mb-1">Mini & Luxury Coaches</span>
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
            
            <!-- Section Header & Controls -->
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6 mb-12">
                <div>
                    <span class="block text-[11px] uppercase tracking-[0.25em] font-bold text-primary mb-2">
                        HANDPICKED FLEET
                    </span>
                    <h2 class="font-serif text-3xl sm:text-4xl lg:text-5xl text-charcoal font-normal tracking-tight">
                        Vehicles Ready for Your Journey
                    </h2>
                </div>

                <!-- Carousel Controls & View All -->
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
                                <img src="{{ asset($vehicle->image_url) }}" 
                                     alt="{{ $vehicle->name }}" 
                                     class="w-full h-full object-cover">
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
                                        <svg class="w-3.5 h-3.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
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
                
                <span class="inline-block text-[11px] uppercase tracking-[0.25em] font-bold text-gold">
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
                        <span class="font-serif text-3xl font-bold text-gold block">15+</span>
                        <span class="text-[10px] text-sand-400 uppercase tracking-wider">Years Experience</span>
                    </div>
                    <div>
                        <span class="font-serif text-3xl font-bold text-gold block">65+</span>
                        <span class="text-[10px] text-sand-400 uppercase tracking-wider">Fleet Strength</span>
                    </div>
                    <div>
                        <span class="font-serif text-3xl font-bold text-gold block">42k+</span>
                        <span class="text-[10px] text-sand-400 uppercase tracking-wider">Trips Completed</span>
                    </div>
                    <div>
                        <span class="font-serif text-3xl font-bold text-gold block">24/7</span>
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
                    NORTH INDIA & RAJASTHAN CORRIDORS
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
                        ['name' => 'Jaipur Hub', 'url' => url('/car-rental-jaipur'), 'type' => 'Local & Airport'],
                        ['name' => 'Delhi NCR', 'url' => url('/jaipur-to-delhi-taxi'), 'type' => 'Expressway Transfer'],
                        ['name' => 'Agra', 'url' => url('/outstation-cab-jaipur'), 'type' => 'Golden Triangle'],
                        ['name' => 'Jodhpur', 'url' => url('/jaipur-to-jodhpur-taxi'), 'type' => 'Sun City Express'],
                        ['name' => 'Udaipur', 'url' => url('/jaipur-to-udaipur-taxi'), 'type' => 'Lake City Route'],
                        ['name' => 'Jaisalmer', 'url' => url('/jaipur-to-jaisalmer-taxi'), 'type' => 'Thar Desert Circuit'],
                        ['name' => 'Ajmer & Pushkar', 'url' => url('/outstation-cab-jaipur'), 'type' => 'Day Pilgrimage'],
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
                        
                        <div class="text-gold text-2xl mb-4">★★★★★</div>
                        
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
            
            <span class="inline-block text-[11px] uppercase tracking-[0.25em] font-bold text-gold">
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
