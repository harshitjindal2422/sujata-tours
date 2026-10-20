@extends('layouts.app')

@section('title', $seoPage->meta_title)
@section('meta_description', $seoPage->meta_description)
@section('canonical_url', $seoPage->canonical_url ?: url()->current())

@push('schema')
@if($seoPage->faqs && count($seoPage->faqs))
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($seoPage->faqs as $f)
    {
      "@type": "Question",
      "name": "{{ addslashes($f['q'] ?? '') }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ addslashes($f['a'] ?? '') }}"
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
  ]
}
</script>
@endif

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "{{ addslashes($seoPage->h1_title) }}",
  "provider": {
    "@type": "LocalBusiness",
    "name": "Sujata Tours",
    "telephone": "+919829012345",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "Plot No. 18, Near Sindhi Camp Station Road",
      "addressLocality": "Jaipur",
      "addressRegion": "Rajasthan",
      "postalCode": "302001",
      "addressCountry": "IN"
    }
  },
  "areaServed": "Rajasthan, India",
  "description": "{{ addslashes($seoPage->meta_description) }}"
}
</script>
@endpush

@section('content')

    <!-- SEO Page Header Banner -->
    <div class="bg-navy-900 text-white py-16 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl space-y-4">
                <!-- Breadcrumbs -->
                <nav class="flex items-center gap-2 text-xs text-slate-400" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                    <span>/</span>
                    <span class="text-slate-400 uppercase tracking-wider text-[11px]">{{ ucfirst($seoPage->page_type) }}</span>
                    <span>/</span>
                    <span class="text-white font-medium truncate">{{ $seoPage->h1_title }}</span>
                </nav>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white leading-tight">
                    {{ $seoPage->h1_title }}
                </h1>

                @if($seoPage->hero_subtitle)
                    <p class="text-slate-300 text-base sm:text-lg leading-relaxed max-w-3xl">
                        {{ $seoPage->hero_subtitle }}
                    </p>
                @endif

                <div class="pt-4 flex flex-wrap items-center gap-4">
                    <a href="#booking-section" class="btn-primary bg-white text-navy-900 hover:bg-slate-100 text-sm font-bold px-6 py-3">
                        Book This Service
                    </a>
                    <a href="tel:+919829012345" class="inline-flex items-center gap-2 text-sm text-slate-300 hover:text-white font-semibold">
                        <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Direct Booking: 098290 12345</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content and Booking Layout -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Content Column (7 cols) -->
            <div class="lg:col-span-7 space-y-8">
                
                <!-- Route / Service Highlights Card -->
                @if($seoPage->route_details && count($seoPage->route_details))
                    <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-4">
                        <h2 class="text-base font-bold uppercase tracking-wider text-charcoal-muted border-b border-border pb-2">
                            Key Details and Highway Logistics
                        </h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            @foreach($seoPage->route_details as $key => $val)
                                <div class="p-3.5 rounded-lg bg-surface-muted">
                                    <span class="block text-[11px] uppercase font-bold text-charcoal-muted">
                                        {{ ucwords(str_replace('_', ' ', $key)) }}
                                    </span>
                                    <span class="text-sm font-bold text-navy-900 mt-0.5 block">
                                        {{ $val }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Informative Summary -->
                @if($seoPage->summary)
                    <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-3">
                        <h2 class="text-xl font-bold text-navy-900">About This Service</h2>
                        <div class="text-sm text-charcoal leading-relaxed space-y-3">
                            <p>{{ $seoPage->summary }}</p>
                        </div>
                    </div>
                @endif

                <!-- Service Features -->
                @if($seoPage->features && count($seoPage->features))
                    <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-4">
                        <h2 class="text-xl font-bold text-navy-900">Service Standards and Inclusions</h2>
                        <div class="space-y-3 text-sm text-charcoal">
                            @foreach($seoPage->features as $feat)
                                <div class="flex items-start gap-3">
                                    <svg class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <span>{{ $feat }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Route Specific FAQs -->
                @if($seoPage->faqs && count($seoPage->faqs))
                    <div class="bg-white rounded-2xl border border-border p-6 shadow-subtle space-y-4" x-data="{ openFaq: 0 }">
                        <h2 class="text-xl font-bold text-navy-900">Frequently Asked Questions</h2>
                        <div class="space-y-3">
                            @foreach($seoPage->faqs as $fIndex => $f)
                                <div class="border border-border rounded-xl overflow-hidden">
                                    <button type="button" 
                                            @click="openFaq = (openFaq === {{ $fIndex }} ? null : {{ $fIndex }})"
                                            class="w-full text-left p-4 font-bold text-navy-900 text-sm flex items-center justify-between gap-3 hover:text-slate-700">
                                        <span>{{ $f['q'] ?? '' }}</span>
                                        <svg class="w-4 h-4 text-slate-400 transform transition-transform" :class="openFaq === {{ $fIndex }} ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </button>
                                    <div x-show="openFaq === {{ $fIndex }}" x-cloak class="p-4 pt-0 text-xs text-charcoal-muted leading-relaxed border-t border-slate-100">
                                        {{ $f['a'] ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <!-- Booking Sticky Sidebar (5 cols) -->
            <div class="lg:col-span-5 space-y-6">
                <div class="sticky top-24" id="booking-section">
                    <x-booking-form :vehicles="$allVehiclesForForm" :compact="true" id="seo-booking-form" />

                    <!-- Quick Support Helpline -->
                    <div class="mt-6 p-5 rounded-xl bg-navy-900 text-white shadow-subtle flex items-center justify-between">
                        <div>
                            <span class="block text-xs font-bold text-sand-200 uppercase tracking-wider">Fast Route Assistance</span>
                            <span class="text-sm font-semibold">Speak with Dispatch Team</span>
                        </div>
                        <a href="tel:+919829012345" class="px-4 py-2 bg-white text-navy-900 text-xs font-bold rounded-lg hover:bg-slate-100 transition-colors">
                            Call Now
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <!-- Recommended Vehicles For This Route -->
        @if($featuredVehicles->count())
            <div class="mt-20 pt-12 border-t border-border">
                <h2 class="text-2xl font-black text-navy-900 mb-8">
                    Recommended Vehicles for This Journey
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($featuredVehicles as $vehicle)
                        <x-vehicle-card :vehicle="$vehicle" />
                    @endforeach
                </div>
            </div>
        @endif

        <!-- Internal Links to Other Common Rajasthan Routes -->
        <div class="mt-16 p-8 bg-surface-subtle rounded-2xl border border-border">
            <h3 class="text-base font-bold text-navy-900 mb-4">
                Other Popular Intercity and Tourist Routes
            </h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 text-xs">
                <a href="{{ url('/jaipur-to-delhi-taxi') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Jaipur to Delhi Taxi</a>
                <a href="{{ url('/jaipur-to-jodhpur-taxi') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Jaipur to Jodhpur Cab</a>
                <a href="{{ url('/jaipur-to-udaipur-taxi') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Jaipur to Udaipur Cab</a>
                <a href="{{ url('/jaipur-to-jaisalmer-taxi') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Jaipur to Jaisalmer Taxi</a>
                <a href="{{ url('/car-rental-jaipur') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Car Rental in Jaipur</a>
                <a href="{{ url('/tempo-traveller-jaipur') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Tempo Traveller Jaipur</a>
                <a href="{{ url('/bus-rental-jaipur') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Bus Rental Jaipur</a>
                <a href="{{ url('/innova-rental-jaipur') }}" class="text-charcoal hover:text-navy-900 font-medium">&bull; Innova Rental Jaipur</a>
            </div>
        </div>

    </div>

@endsection
