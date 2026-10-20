@extends('layouts.app')

@section('title', 'About Sujata Tours | Established Vehicle Rental and Transport in Jaipur')
@section('meta_description', 'Learn about Sujata Tours, a trusted vehicle rental and commercial transportation provider founded in Jaipur. Over 15 years operating cars, tempo travellers, and buses.')
@section('canonical_url', route('about'))

@section('content')
    <!-- About Header -->
    <div class="bg-navy-900 text-white py-16 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-primary-light">About Sujata Tours</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white mt-1">
                Reliable Transportation Grounded in Jaipur
            </h1>
            <p class="text-slate-300 text-base sm:text-lg mt-3 max-w-3xl leading-relaxed">
                We are a dedicated commercial fleet operator, not an anonymous aggregator. Our business was built on well-maintained vehicles and drivers who take pride in road safety.
            </p>
        </div>
    </div>

    <!-- Company Background and Values -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-16">
        
        <!-- Grid: Heritage and Reality -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <div class="lg:col-span-7 space-y-5 text-sm sm:text-base text-charcoal leading-relaxed">
                <span class="text-xs font-extrabold uppercase tracking-widest text-navy-900">Our Foundation</span>
                <h2 class="text-2xl sm:text-3xl font-black text-navy-900 tracking-tight">
                    Dedicated Vehicle Rental Since 2011
                </h2>
                <p>
                    Headquartered near Jaipur Junction and Sindhi Camp, Sujata Tours started with two cars and a simple premise: Indian travel should not involve broken air conditioning, misleading quotes, or drivers who force unwanted shopping detours.
                </p>
                <p>
                    Over 15 years of steady operation, we have grown our fleet to over 65 commercial vehicles including sedans, Toyota Innova Crysta MUVs, customized 12 to 26-seater Force Tempo Travellers, and large BharatBenz tourist buses.
                </p>
                <p>
                    We serve joint families traveling on vacation, foreign delegations visiting Rajasthan forts, couples taking airport cabs, and event planners managing 300-guest wedding shuttles.
                </p>
            </div>

            <div class="lg:col-span-5">
                <div class="rounded-2xl overflow-hidden border border-border shadow-card bg-white p-2">
                    <img src="{{ asset('images/fleet/hero-fleet.jpg') }}" alt="Sujata Tours fleet in Jaipur" class="rounded-xl w-full h-[320px] object-cover">
                    <div class="p-4 text-xs text-charcoal-muted">
                        Central Fleet Depot: Plot No. 18, Near Sindhi Camp Station Road, Jaipur
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 Pillars of Service -->
        <div class="pt-8 border-t border-border">
            <h2 class="text-2xl font-black text-navy-900 mb-8 text-center">
                Our Operating Principles
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 rounded-2xl bg-white border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900 font-bold">
                        01
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">Mechanically Sound Fleet</h3>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        Every vehicle undergoes regular mechanical checkups. Tyres, brake pads, suspension bushings, and dual cooling units are checked before every highway trip.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900 font-bold">
                        02
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">Chauffeur Discipline</h3>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        Our drivers are seasoned professionals who know highway conditions, rest stops with clean washrooms, and local city approaches. No speeding, no smoking, and no commission traps.
                    </p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-border shadow-subtle space-y-3">
                    <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900 font-bold">
                        03
                    </div>
                    <h3 class="text-lg font-bold text-navy-900">Accountability and Direct Support</h3>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        You speak with an actual fleet manager who knows which car is assigned to you. If your flight arrives early or late, we adapt without leaving you stranded.
                    </p>
                </div>
            </div>
        </div>

        <!-- Stats Bar -->
        <div class="bg-navy-900 text-white rounded-2xl p-8 sm:p-12 shadow-card grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div>
                <span class="block text-4xl font-black text-white">15+</span>
                <span class="text-xs text-slate-300 font-medium uppercase tracking-wider mt-1 block">Years in Operation</span>
            </div>
            <div>
                <span class="block text-4xl font-black text-white">42,000+</span>
                <span class="text-xs text-slate-300 font-medium uppercase tracking-wider mt-1 block">Trips Completed</span>
            </div>
            <div>
                <span class="block text-4xl font-black text-white">65+</span>
                <span class="text-xs text-slate-300 font-medium uppercase tracking-wider mt-1 block">Commercial Vehicles</span>
            </div>
            <div>
                <span class="block text-4xl font-black text-white">24/7</span>
                <span class="text-xs text-slate-300 font-medium uppercase tracking-wider mt-1 block">Dispatch Desk</span>
            </div>
        </div>

    </div>
@endsection
