<!DOCTYPE html>
<html lang="en" class="h-full bg-surface-muted text-charcoal">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sujata Tours | Reliable Cars, Tempo Travellers & Buses in Jaipur')</title>
    <meta name="description" content="@yield('meta_description', 'Sujata Tours offers reliable vehicle rentals in Jaipur. Book chauffeur-driven cars, luxury tempo travellers, and buses for local and outstation Rajasthan journeys.')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="@yield('canonical_url', url()->current())">
    <meta property="og:title" content="@yield('title', 'Sujata Tours | Vehicle Rental & Transportation Jaipur')">
    <meta property="og:description" content="@yield('meta_description', 'Book chauffeur-driven cars, tempo travellers, and buses for local and outstation Rajasthan journeys.')">
    <meta property="og:image" content="@yield('og_image', asset('images/fleet/hero-fleet.jpg'))">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'Sujata Tours | Vehicle Rental Jaipur')">
    <meta name="twitter:description" content="@yield('meta_description', 'Book chauffeur-driven cars, tempo travellers, and buses for local and outstation Rajasthan journeys.')">
    <meta name="twitter:image" content="@yield('og_image', asset('images/fleet/hero-fleet.jpg'))">

    <!-- Typography: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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
      },
      "sameAs": []
    }
    </script>
    @stack('schema')
</head>
<body class="flex flex-col min-h-full font-sans antialiased text-[#1F2933] bg-[#F8F9F7]" x-data="{ mobileMenuOpen: false }">

    <!-- Top Announcement Bar -->
    <div class="bg-navy-950 text-slate-300 text-xs border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4 text-center sm:text-left">
                <span class="inline-flex items-center gap-1.5 text-emerald-400 font-medium">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    24x7 Fleet Dispatch Active
                </span>
                <span class="hidden md:inline text-slate-400">|</span>
                <span class="hidden md:inline text-slate-300">Hub: Sindhi Camp Station Road, Jaipur</span>
            </div>
            <div class="flex items-center gap-5">
                <a href="tel:+919829012345" class="hover:text-white flex items-center gap-1.5 transition-colors">
                    <svg class="w-3.5 h-3.5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    <span>+91 98290 12345</span>
                </a>
                <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20need%20vehicle%20rental%20information" target="_blank" rel="noopener noreferrer" class="hover:text-emerald-400 flex items-center gap-1 transition-colors">
                    <span class="text-emerald-400 font-medium">WhatsApp Support</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Header (Sticky) -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-border transition-all">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Brand Logo -->
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="group flex flex-col">
                        <span class="text-2xl font-extrabold tracking-tight text-navy-900 group-hover:text-slate-800 transition-colors">
                            SUJATA TOURS
                        </span>
                        <span class="text-[10px] tracking-wider font-semibold uppercase text-charcoal-muted">
                            Vehicle Rental & Transportation • Jaipur
                        </span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-8">
                    <a href="{{ route('home') }}" class="text-sm font-semibold {{ request()->routeIs('home') ? 'text-navy-900 font-bold border-b-2 border-navy-900 pb-1' : 'text-charcoal hover:text-navy-900 transition-colors' }}">
                        Home
                    </a>
                    <a href="{{ route('vehicles.cars') }}" class="text-sm font-semibold {{ request()->routeIs('vehicles.cars') ? 'text-navy-900 font-bold border-b-2 border-navy-900 pb-1' : 'text-charcoal hover:text-navy-900 transition-colors' }}">
                        Cars
                    </a>
                    <a href="{{ route('vehicles.tempo-travellers') }}" class="text-sm font-semibold {{ request()->routeIs('vehicles.tempo-travellers') ? 'text-navy-900 font-bold border-b-2 border-navy-900 pb-1' : 'text-charcoal hover:text-navy-900 transition-colors' }}">
                        Tempo Travellers
                    </a>
                    <a href="{{ route('vehicles.buses') }}" class="text-sm font-semibold {{ request()->routeIs('vehicles.buses') ? 'text-navy-900 font-bold border-b-2 border-navy-900 pb-1' : 'text-charcoal hover:text-navy-900 transition-colors' }}">
                        Buses
                    </a>
                    <a href="{{ route('about') }}" class="text-sm font-semibold {{ request()->routeIs('about') ? 'text-navy-900 font-bold border-b-2 border-navy-900 pb-1' : 'text-charcoal hover:text-navy-900 transition-colors' }}">
                        About Us
                    </a>
                    <a href="{{ route('contact') }}" class="text-sm font-semibold {{ request()->routeIs('contact') ? 'text-navy-900 font-bold border-b-2 border-navy-900 pb-1' : 'text-charcoal hover:text-navy-900 transition-colors' }}">
                        Contact
                    </a>
                </nav>

                <!-- Header Actions -->
                <div class="hidden lg:flex items-center gap-4">
                    <a href="tel:+919829012345" class="inline-flex items-center gap-2 text-sm font-bold text-navy-900 hover:text-slate-700 transition-colors py-2 px-3 rounded-lg hover:bg-surface-subtle">
                        <span class="w-8 h-8 rounded-full bg-navy-50 flex items-center justify-center text-navy-900">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </span>
                        <span>098290 12345</span>
                    </a>
                    <a href="{{ route('home') }}#booking-section" class="btn-primary text-sm px-5 py-2.5 shadow-sm">
                        Book a Vehicle
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center gap-2 lg:hidden">
                    <a href="tel:+919829012345" class="p-2 rounded-lg bg-surface-subtle text-navy-900" aria-label="Call Sujata Tours">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    </a>
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 rounded-lg text-charcoal hover:bg-surface-subtle focus:outline-none" aria-label="Toggle Navigation">
                        <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Dropdown Menu -->
        <div x-show="mobileMenuOpen" x-cloak @click.away="mobileMenuOpen = false" class="lg:hidden border-t border-border bg-white px-4 pt-4 pb-6 space-y-3 shadow-lg">
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-charcoal hover:bg-surface-subtle">Home</a>
            <a href="{{ route('vehicles.cars') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-charcoal hover:bg-surface-subtle">Car Rental</a>
            <a href="{{ route('vehicles.tempo-travellers') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-charcoal hover:bg-surface-subtle">Tempo Travellers (12-26 Seater)</a>
            <a href="{{ route('vehicles.buses') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-charcoal hover:bg-surface-subtle">Bus Rental (21-45 Seater)</a>
            <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-charcoal hover:bg-surface-subtle">About Us</a>
            <a href="{{ route('contact') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-charcoal hover:bg-surface-subtle">Contact Us</a>
            
            <div class="pt-3 border-t border-border space-y-2">
                <a href="{{ route('home') }}#booking-section" @click="mobileMenuOpen = false" class="w-full btn-primary py-3 text-center text-base">
                    Book a Vehicle Now
                </a>
                <div class="grid grid-cols-2 gap-2 pt-1">
                    <a href="tel:+919829012345" class="inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-lg bg-navy-50 text-navy-900 font-semibold text-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Call Desk
                    </a>
                    <a href="https://wa.me/919829012345?text=Hello%20Sujata%20Tours,%20I%20need%20vehicle%20booking" target="_blank" class="inline-flex items-center justify-center gap-1.5 py-2.5 px-3 rounded-lg bg-emerald-50 text-emerald-800 font-semibold text-sm">
                        WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Global Flash Notification -->
    @if(session('success'))
        <div class="bg-emerald-600 text-white text-sm py-3 px-4 shadow-sm">
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
        <div class="bg-rose-600 text-white text-sm py-3 px-4 shadow-sm">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    <span>Please correct the errors in the form below before submitting.</span>
                </div>
                <button type="button" onclick="this.parentElement.parentElement.remove()" class="text-white hover:text-rose-100">&times;</button>
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
       class="fixed bottom-6 right-6 z-30 flex items-center gap-2.5 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-200 group focus:outline-none"
       aria-label="Contact Sujata Tours on WhatsApp">
        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
        <span class="text-sm font-semibold tracking-wide">WhatsApp Desk</span>
    </a>

    <!-- Footer -->
    <footer class="bg-navy-950 text-slate-300 border-t border-slate-800 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-slate-800">
                
                <!-- Col 1: Brand Info -->
                <div class="lg:col-span-2 space-y-4">
                    <span class="text-2xl font-black text-white tracking-tight">SUJATA TOURS</span>
                    <p class="text-slate-400 text-sm leading-relaxed max-w-sm">
                        Reliable vehicle rental and commercial transportation company based in Jaipur, Rajasthan. Specializing in chauffeur-driven cars, pushback tempo travellers, and luxury tourist buses for local city travel, outstation road trips, weddings, and group transfers.
                    </p>
                    <div class="pt-2 text-xs text-slate-400 space-y-1">
                        <p><strong class="text-slate-300">GST Registration:</strong> 08AALCS9821Q1ZU</p>
                        <p><strong class="text-slate-300">Dispatch Office:</strong> Plot No. 18, Near Sindhi Camp Station Road, Jaipur 302001</p>
                        <p><strong class="text-slate-300">Support Hours:</strong> 24 Hours / 7 Days On-Duty Dispatch</p>
                    </div>
                </div>

                <!-- Col 2: Fleet Categories -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Vehicle Fleet</h3>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="{{ route('vehicles.cars') }}" class="hover:text-white transition-colors">Car Rental (Sedans & SUVs)</a></li>
                        <li><a href="{{ route('vehicles.tempo-travellers') }}" class="hover:text-white transition-colors">Tempo Travellers (12-26 Seater)</a></li>
                        <li><a href="{{ route('vehicles.buses') }}" class="hover:text-white transition-colors">Bus Rental (21-45 Seater)</a></li>
                        <li><a href="{{ url('/innova-rental-jaipur') }}" class="hover:text-white transition-colors">Toyota Innova Crysta</a></li>
                        <li><a href="{{ url('/vehicles/maruti-swift-dzire') }}" class="hover:text-white transition-colors">Maruti Swift Dzire</a></li>
                        <li><a href="{{ route('vehicles.index') }}" class="hover:text-white transition-colors">Browse All Vehicles</a></li>
                    </ul>
                </div>

                <!-- Col 3: Popular Rajasthan Routes -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Popular Routes</h3>
                    <ul class="space-y-2.5 text-sm text-slate-400">
                        <li><a href="{{ url('/jaipur-to-delhi-taxi') }}" class="hover:text-white transition-colors">Jaipur to Delhi Taxi</a></li>
                        <li><a href="{{ url('/jaipur-to-jodhpur-taxi') }}" class="hover:text-white transition-colors">Jaipur to Jodhpur Cab</a></li>
                        <li><a href="{{ url('/jaipur-to-udaipur-taxi') }}" class="hover:text-white transition-colors">Jaipur to Udaipur Cab</a></li>
                        <li><a href="{{ url('/jaipur-to-jaisalmer-taxi') }}" class="hover:text-white transition-colors">Jaipur to Jaisalmer Taxi</a></li>
                        <li><a href="{{ url('/outstation-cab-jaipur') }}" class="hover:text-white transition-colors">Outstation Cab Jaipur</a></li>
                        <li><a href="{{ url('/car-rental-jaipur') }}" class="hover:text-white transition-colors">Jaipur City Car Rental</a></li>
                    </ul>
                </div>

                <!-- Col 4: Contact & Booking Desk -->
                <div>
                    <h3 class="text-white text-sm font-bold uppercase tracking-wider mb-4">Contact Desk</h3>
                    <div class="space-y-3 text-sm text-slate-400">
                        <div>
                            <span class="block text-xs text-slate-300 font-semibold uppercase">Phone Bookings</span>
                            <a href="tel:+919829012345" class="text-white font-bold hover:text-amber-400 transition-colors">+91 98290 12345</a>
                        </div>
                        <div>
                            <span class="block text-xs text-slate-300 font-semibold uppercase">Secondary Helpline</span>
                            <a href="tel:+919414067890" class="text-slate-300 hover:text-white transition-colors">+91 94140 67890</a>
                        </div>
                        <div>
                            <span class="block text-xs text-slate-300 font-semibold uppercase">Email Inquiries</span>
                            <a href="mailto:bookings@sujatatours.com" class="text-slate-300 hover:text-white transition-colors">bookings@sujatatours.com</a>
                        </div>
                        <div class="pt-2">
                            <a href="{{ route('home') }}#booking-section" class="inline-block px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-md text-xs font-semibold border border-slate-700 transition-colors">
                                Check Fleet Availability
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} Sujata Tours. All rights reserved. Commercial vehicle rental & transportation service.</p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('terms') }}" class="hover:text-slate-300 transition-colors">Terms of Rental</a>
                    <a href="{{ route('privacy') }}" class="hover:text-slate-300 transition-colors">Privacy Policy</a>
                    <a href="{{ route('seo.sitemap') }}" class="hover:text-slate-300 transition-colors">Sitemap</a>
                    <a href="{{ route('admin.login') }}" class="text-slate-400 hover:text-slate-300 transition-colors">Fleet Admin</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
