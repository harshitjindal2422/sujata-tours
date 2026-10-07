<!DOCTYPE html>
<html lang="en" class="h-full bg-ivory text-charcoal scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sujata Tours | Premium Car, Tempo Traveller & Bus Rentals')</title>
    <meta name="description" content="@yield('meta_description', 'Sujata Tours offers premium chauffeur-driven cars, luxury tempo travellers, and buses for local running, outstation journeys, corporate travel, and airport transfers.')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical_url', url()->current())">
    <meta property="og:title" content="@yield('title', 'Sujata Tours | Premium Vehicle Rental & Transportation')">
    <meta property="og:description" content="@yield('meta_description', 'Premium cars, tempo travellers and buses for local, outstation and group travel.')">
    <meta property="og:image" content="@yield('og_image', asset('images/fleet/jaipur-pink-city-hero.jpg'))">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Sujata Tours | Premium Transportation')">
    <meta name="twitter:description" content="@yield('meta_description', 'Premium cars, tempo travellers and buses for local, outstation and group travel.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/fleet/jaipur-pink-city-hero.jpg'))">

    <!-- Typography: Playfair Display (Serif) & Plus Jakarta Sans (Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Sujata Tours",
      "image": "{{ asset('images/fleet/hero-fleet.jpg') }}",
      "@id": "{{ url('/') }}",
      "url": "{{ url('/') }}",
      "telephone": "+919829012345",
      "priceRange": "₹₹",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Plot No. 18, Near Sindhi Camp Station Road, Gopalbari",
        "addressLocality": "Jaipur",
        "addressRegion": "Rajasthan",
        "postalCode": "302001",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 26.9200,
        "longitude": 75.7950
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"
        ],
        "opens": "00:00",
        "closes": "23:59"
      }
    }
    </script>
    @stack('schema')
</head>
<body class="flex flex-col min-h-full font-sans antialiased text-charcoal bg-ivory" 
      x-data="{ 
          scrolled: false, 
          mobileMenuOpen: false,
          isHome: {{ request()->routeIs('home') ? 'true' : 'false' }}
      }" 
      @scroll.window="scrolled = (window.pageYOffset > 40)">

    <!-- Top Contact Bar (Subtle Luxury Strip) -->
    <div class="hidden md:block transition-all duration-300 {{ request()->routeIs('home') ? 'bg-charcoal-dark/95 text-sand-300 border-b border-white/10' : 'bg-charcoal-dark text-sand-300 border-b border-charcoal' }} text-xs py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex items-center gap-6">
                <span class="inline-flex items-center gap-2 text-sand-200">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    Premium Vehicle Rental & Chauffeur Services
                </span>
                <span class="text-sand-400/40">|</span>
                <span class="text-sand-400">Serving Rajasthan, Delhi NCR & Intercity Routes</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="tel:+919829012345" class="hover:text-white flex items-center gap-2 transition-colors">
                    <svg class="w-3.5 h-3.5 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>+91 98290 12345</span>
                </a>
                <span class="text-sand-400/40">|</span>
                <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20need%20vehicle%20rental%20information" target="_blank" rel="noopener noreferrer" class="hover:text-emerald-400 flex items-center gap-1.5 transition-colors">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    <span>WhatsApp Support</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header (Sticky & Overlay on Home) -->
    <header class="sticky top-0 z-50 transition-all duration-300 {{ request()->routeIs('home') ? '' : 'bg-white/95 backdrop-blur-md shadow-subtle border-b border-border' }}"
            :class="{
                'bg-white/95 backdrop-blur-md shadow-subtle border-b border-border text-charcoal': scrolled || !isHome,
                'bg-charcoal-dark/30 backdrop-blur-sm text-white border-b border-white/10': !scrolled && isHome
            }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Brand Identity -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="group flex flex-col">
                        <span class="font-serif text-2xl font-bold tracking-wider transition-colors"
                              :class="(scrolled || !isHome) ? 'text-charcoal' : 'text-white'">
                            SUJATA<span class="font-light italic ml-1 text-primary">TOURS</span>
                        </span>
                        <span class="text-[9px] uppercase tracking-[0.25em] font-medium transition-colors"
                              :class="(scrolled || !isHome) ? 'text-charcoal-muted' : 'text-sand-300'">
                            Premium Mobility & Chauffeur Fleet
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-7">
                    <a href="{{ route('home') }}" 
                       class="text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 {{ request()->routeIs('home') ? 'border-primary' : 'border-transparent' }}"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                        Home
                    </a>

                    <!-- Vehicles Dropdown / Link -->
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="{{ route('vehicles.index') }}" 
                           class="inline-flex items-center gap-1 text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 {{ request()->routeIs('vehicles.*') ? 'border-primary' : 'border-transparent' }}"
                           :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                            <span>Vehicles</span>
                            <svg class="w-3.5 h-3.5 opacity-60 group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </a>
                        <div x-show="open" 
                             x-transition:enter="transition ease-out duration-150"
                             x-transition:enter-start="opacity-0 translate-y-1"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 translate-y-0"
                             x-transition:leave-end="opacity-0 translate-y-1"
                             class="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-card border border-border py-2 text-charcoal z-50">
                            <a href="{{ route('vehicles.cars') }}" class="flex flex-col px-4 py-2 hover:bg-sand-100 transition-colors">
                                <span class="text-xs font-bold text-charcoal">Cars & Premium SUVs</span>
                                <span class="text-[10px] text-charcoal-muted">Swift Dzire, Innova Crysta, Fortuner</span>
                            </a>
                            <a href="{{ route('vehicles.tempo-travellers') }}" class="flex flex-col px-4 py-2 hover:bg-sand-100 transition-colors border-t border-border/50">
                                <span class="text-xs font-bold text-charcoal">Tempo Travellers</span>
                                <span class="text-[10px] text-charcoal-muted">12, 17, 26 Seater Maharaja & Urbania</span>
                            </a>
                            <a href="{{ route('vehicles.buses') }}" class="flex flex-col px-4 py-2 hover:bg-sand-100 transition-colors border-t border-border/50">
                                <span class="text-xs font-bold text-charcoal">Luxury Tourist Coaches</span>
                                <span class="text-[10px] text-charcoal-muted">21 to 45 Seater AC Buses</span>
                            </a>
                            <a href="{{ route('vehicles.index') }}" class="block px-4 py-2 text-xs font-semibold text-primary hover:bg-sand-100 transition-colors border-t border-border">
                                Browse Complete Fleet →
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('vehicles.cars') }}" 
                       class="text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 {{ request()->routeIs('vehicles.cars') ? 'border-primary' : 'border-transparent' }}"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                        Cars
                    </a>

                    <a href="{{ route('vehicles.tempo-travellers') }}" 
                       class="text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 {{ request()->routeIs('vehicles.tempo-travellers') ? 'border-primary' : 'border-transparent' }}"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                        Tempo Travellers
                    </a>

                    <a href="{{ route('vehicles.buses') }}" 
                       class="text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 {{ request()->routeIs('vehicles.buses') ? 'border-primary' : 'border-transparent' }}"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                        Buses
                    </a>

                    <a href="{{ url('/outstation-cab-jaipur') }}" 
                       class="text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 border-transparent"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                        Routes
                    </a>

                    <a href="{{ route('about') }}" 
                       class="text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 {{ request()->routeIs('about') ? 'border-primary' : 'border-transparent' }}"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                        About
                    </a>

                    <a href="{{ route('contact') }}" 
                       class="text-xs uppercase tracking-wider font-semibold transition-colors pb-1 border-b-2 {{ request()->routeIs('contact') ? 'border-primary' : 'border-transparent' }}"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white/90 hover:text-white'">
                        Contact
                    </a>
                </nav>

                <!-- Header Actions -->
                <div class="hidden lg:flex items-center gap-4">
                    <a href="tel:+919829012345" 
                       class="inline-flex items-center gap-2 text-xs font-bold tracking-wide transition-colors py-2 px-3 rounded-lg"
                       :class="(scrolled || !isHome) ? 'text-charcoal hover:text-primary' : 'text-white hover:text-sand-200'">
                        <span class="w-7 h-7 rounded-full flex items-center justify-center transition-colors"
                              :class="(scrolled || !isHome) ? 'bg-primary/10 text-primary' : 'bg-white/20 text-white'">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                        <span>098290 12345</span>
                    </a>

                    <a href="{{ route('home') }}#quick-booking" 
                       class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg text-xs font-bold uppercase tracking-wider text-white shadow-sm transition-all duration-200"
                       :class="(scrolled || !isHome) ? 'bg-primary hover:bg-primary-hover' : 'bg-primary hover:bg-primary-hover shadow-lg'">
                        Book a Vehicle
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center gap-2 lg:hidden">
                    <a href="tel:+919829012345" 
                       class="p-2 rounded-lg transition-colors"
                       :class="(scrolled || !isHome) ? 'bg-sand-200 text-charcoal' : 'bg-white/20 text-white'"
                       aria-label="Call Sujata Tours">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            type="button" 
                            class="p-2 rounded-lg transition-colors focus:outline-none"
                            :class="(scrolled || !isHome) ? 'text-charcoal hover:bg-sand-200' : 'text-white hover:bg-white/20'"
                            aria-label="Toggle Navigation">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div x-show="mobileMenuOpen" 
             x-cloak 
             @click.away="mobileMenuOpen = false" 
             class="lg:hidden border-t border-border bg-white px-5 pt-4 pb-6 space-y-3 shadow-float text-charcoal">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">Home</a>
            <a href="{{ route('vehicles.index') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">All Vehicles</a>
            <a href="{{ route('vehicles.cars') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">Cars & SUVs</a>
            <a href="{{ route('vehicles.tempo-travellers') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">Tempo Travellers (12-26 Seater)</a>
            <a href="{{ route('vehicles.buses') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">Luxury Buses (21-45 Seater)</a>
            <a href="{{ url('/outstation-cab-jaipur') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">Popular Routes</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">About Sujata Tours</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-sm font-semibold hover:bg-sand-100">Contact Desk</a>
            
            <div class="pt-3 border-t border-border space-y-2">
                <a href="{{ route('home') }}#quick-booking" @click="mobileMenuOpen = false" class="w-full btn-primary py-3 text-center text-sm font-bold uppercase tracking-wider block">
                    Book a Vehicle Now
                </a>
                <div class="grid grid-cols-2 gap-2 pt-1">
                    <a href="tel:+919829012345" class="inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-lg bg-sand-200 text-charcoal font-semibold text-xs">
                        <svg class="w-3.5 h-3.5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Call Hotline
                    </a>
                    <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20need%20vehicle%20booking" target="_blank" class="inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-lg bg-emerald-50 text-emerald-800 font-semibold text-xs border border-emerald-200">
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Global Flash Notification -->
    @if(session('success'))
        <div class="bg-emerald-700 text-white text-sm py-3 px-4 shadow-sm relative z-40">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-white hover:text-emerald-100">&times;</button>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="bg-primary text-white text-sm py-3 px-4 shadow-sm relative z-40">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Please correct the errors in the form below before submitting.</span>
                </div>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-white hover:text-sand-100">&times;</button>
            </div>
        </div>
    @endif

    <!-- Main Content Slot -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Floating Direct WhatsApp Button -->
    <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20am%20interested%20in%20booking%20a%20vehicle" 
       target="_blank" 
       rel="noopener noreferrer"
       class="fixed bottom-6 right-6 z-40 flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-full shadow-card-hover transition-all duration-300 group focus:outline-none"
       aria-label="Contact Sujata Tours on WhatsApp">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span class="text-xs font-bold tracking-wide">WhatsApp Desk</span>
    </a>

    <!-- Footer (Premium Deep Charcoal / Dark Burgundy) -->
    <footer class="bg-charcoal-dark text-sand-300 border-t border-charcoal pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-white/10">
                
                <!-- Col 1: Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <span class="font-serif text-2xl font-bold text-white tracking-wider">
                        SUJATA<span class="font-light italic text-primary ml-1">TOURS</span>
                    </span>
                    <p class="text-sand-400 text-xs leading-relaxed max-w-sm">
                        Premium vehicle rental and commercial transportation company. Specializing in chauffeur-driven sedans, luxury pushback tempo travellers, and tourist coaches for local travel, outstation road journeys, corporate movement, and group transport across Rajasthan and North India.
                    </p>
                    <div class="pt-2 text-xs text-sand-400/80 space-y-1">
                        <p><strong class="text-sand-300">GST Registration:</strong> 08AALCS9821Q1ZU</p>
                        <p><strong class="text-sand-300">Head Office:</strong> Sindhi Camp Station Road, Jaipur, Rajasthan</p>
                        <p><strong class="text-sand-300">Dispatch Operations:</strong> 24 Hours / 7 Days On-Duty Support</p>
                    </div>
                </div>

                <!-- Col 2: Vehicles -->
                <div>
                    <h3 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Vehicles</h3>
                    <ul class="space-y-2.5 text-xs text-sand-400">
                        <li><a href="{{ route('vehicles.cars') }}" class="hover:text-primary transition-colors">Car Rental (Sedans & SUVs)</a></li>
                        <li><a href="{{ route('vehicles.tempo-travellers') }}" class="hover:text-primary transition-colors">Tempo Travellers (12-26 Seater)</a></li>
                        <li><a href="{{ route('vehicles.buses') }}" class="hover:text-primary transition-colors">Luxury Buses (21-45 Seater)</a></li>
                        <li><a href="{{ url('/innova-rental-jaipur') }}" class="hover:text-primary transition-colors">Toyota Innova Crysta</a></li>
                        <li><a href="{{ url('/vehicles/maruti-swift-dzire') }}" class="hover:text-primary transition-colors">Maruti Swift Dzire</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="hover:text-primary transition-colors">Browse Full Fleet</a></li>
                    </ul>
                </div>

                <!-- Col 3: Popular Routes -->
                <div>
                    <h3 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Popular Routes</h3>
                    <ul class="space-y-2.5 text-xs text-sand-400">
                        <li><a href="{{ url('/jaipur-to-delhi-taxi') }}" class="hover:text-primary transition-colors">Jaipur to Delhi Taxi</a></li>
                        <li><a href="{{ url('/jaipur-to-jodhpur-taxi') }}" class="hover:text-primary transition-colors">Jaipur to Jodhpur Cab</a></li>
                        <li><a href="{{ url('/jaipur-to-udaipur-taxi') }}" class="hover:text-primary transition-colors">Jaipur to Udaipur Cab</a></li>
                        <li><a href="{{ url('/jaipur-to-jaisalmer-taxi') }}" class="hover:text-primary transition-colors">Jaipur to Jaisalmer Taxi</a></li>
                        <li><a href="{{ url('/outstation-cab-jaipur') }}" class="hover:text-primary transition-colors">Outstation Cab Hire</a></li>
                        <li><a href="{{ url('/car-rental-jaipur') }}" class="hover:text-primary transition-colors">Local City Rental</a></li>
                    </ul>
                </div>

                <!-- Col 4: Company & Contact -->
                <div>
                    <h3 class="text-white text-xs font-bold uppercase tracking-widest mb-4">Contact Desk</h3>
                    <div class="space-y-3 text-xs text-sand-400">
                        <div>
                            <span class="block text-[10px] text-sand-400 font-semibold uppercase tracking-wider">Bookings & Dispatch</span>
                            <a href="tel:+919829012345" class="text-white font-bold hover:text-gold transition-colors text-sm">+91 98290 12345</a>
                        </div>
                        <div>
                            <span class="block text-[10px] text-sand-400 font-semibold uppercase tracking-wider">Helpline</span>
                            <a href="tel:+919414067890" class="text-sand-300 hover:text-white transition-colors">+91 94140 67890</a>
                        </div>
                        <div>
                            <span class="block text-[10px] text-sand-400 font-semibold uppercase tracking-wider">Email</span>
                            <a href="mailto:bookings@sujatatours.com" class="text-sand-300 hover:text-white transition-colors">bookings@sujatatours.com</a>
                        </div>
                        <div class="pt-2">
                            <a href="{{ route('home') }}#quick-booking" class="inline-block px-4 py-2 bg-charcoal hover:bg-black text-sand-200 rounded-md text-xs font-semibold border border-white/10 transition-colors">
                                Check Fleet Availability
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-sand-400/70 gap-4">
                <p>&copy; {{ date('Y') }} Sujata Tours. All rights reserved. Commercial vehicle rental & transportation service.</p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('about') }}" class="hover:text-sand-300 transition-colors">About Us</a>
                    <a href="{{ route('terms') }}" class="hover:text-sand-300 transition-colors">Terms of Rental</a>
                    <a href="{{ route('privacy') }}" class="hover:text-sand-300 transition-colors">Privacy Policy</a>
                    <a href="{{ route('seo.sitemap') }}" class="hover:text-sand-300 transition-colors">Sitemap</a>
                    <a href="{{ route('admin.login') }}" class="text-sand-400/50 hover:text-sand-300 transition-colors">Fleet Admin</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
