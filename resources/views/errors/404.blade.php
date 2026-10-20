@extends('layouts.app')

@section('title', 'Page Not Found (404) | Sujata Tours Jaipur')
@section('meta_description', 'The road you are looking for has taken a detour. Browse Sujata Tours fleet or return to home.')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 sm:px-6 lg:px-8 py-20 bg-ivory">
    <div class="max-w-xl w-full text-center space-y-6">
        
        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-primary/10 text-primary border-2 border-primary/20 shadow-inner">
            <span class="font-serif text-4xl font-black">404</span>
        </div>

        <div class="space-y-2">
            <span class="text-xs uppercase font-bold tracking-widest text-primary block">
                Destination Not Found
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-charcoal">
                Looks Like This Road Took a Detour
            </h1>
            <p class="text-sm text-charcoal-muted max-w-md mx-auto leading-relaxed font-light">
                The page you are looking for might have been moved, renamed, or is temporarily unavailable. Let us get you back on the right route.
            </p>
        </div>

        <!-- Quick Links / Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4">
            <a href="{{ route('home') }}" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-primary hover:bg-primary-hover text-white text-xs font-bold uppercase tracking-wider shadow-md hover:shadow-lg transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                <span>Return to Home</span>
            </a>

            <a href="{{ route('home') }}#fare-calculator" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-charcoal hover:bg-black text-white text-xs font-bold uppercase tracking-wider shadow-sm transition-all duration-200">
                <span>🧮 Fare Calculator</span>
            </a>

            <a href="https://wa.me/919829012345?text=Namaste%20Sujata%20Tours!%20Need%20help%20with%20booking." 
               target="_blank" 
               rel="noopener noreferrer"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-wider shadow-sm transition-all duration-200">
                <span>WhatsApp Desk</span>
            </a>
        </div>

        <!-- Popular Fleet Quick Shortcuts -->
        <div class="pt-8 border-t border-border text-left">
            <span class="block text-[11px] uppercase font-bold text-charcoal-muted tracking-wider mb-3 text-center sm:text-left">
                Popular Fleets & Circuits:
            </span>
            <div class="flex flex-wrap gap-2 justify-center sm:justify-start">
                <a href="{{ route('vehicles.cars') }}" class="text-xs px-3 py-1.5 rounded-lg bg-sand-200 hover:bg-primary hover:text-white transition-colors text-charcoal font-medium">Cars & Sedans</a>
                <a href="{{ route('vehicles.tempo-travellers') }}" class="text-xs px-3 py-1.5 rounded-lg bg-sand-200 hover:bg-primary hover:text-white transition-colors text-charcoal font-medium">Tempo Travellers</a>
                <a href="{{ route('vehicles.buses') }}" class="text-xs px-3 py-1.5 rounded-lg bg-sand-200 hover:bg-primary hover:text-white transition-colors text-charcoal font-medium">Tourist Buses</a>
                <a href="{{ url('/jaipur-to-delhi-taxi') }}" class="text-xs px-3 py-1.5 rounded-lg bg-sand-200 hover:bg-primary hover:text-white transition-colors text-charcoal font-medium">Jaipur to Delhi Cab</a>
                <a href="{{ route('contact') }}" class="text-xs px-3 py-1.5 rounded-lg bg-sand-200 hover:bg-primary hover:text-white transition-colors text-charcoal font-medium">Contact Office</a>
            </div>
        </div>

    </div>
</div>
@endsection
