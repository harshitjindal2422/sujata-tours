@extends('layouts.app')

@section('title', 'Server Encountered an Issue (500) | Sujata Tours Jaipur')
@section('meta_description', 'Our system encountered a temporary glitch. Please contact our Jaipur dispatch desk directly.')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 sm:px-6 lg:px-8 py-20 bg-ivory">
    <div class="max-w-xl w-full text-center space-y-6">
        
        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-secondary/10 text-secondary border-2 border-secondary/20 shadow-inner">
            <span class="font-serif text-4xl font-black">500</span>
        </div>

        <div class="space-y-2">
            <span class="text-xs uppercase font-bold tracking-widest text-secondary block">
                Temporary Roadblock
            </span>
            <h1 class="font-serif text-3xl sm:text-4xl font-bold text-charcoal">
                Something Went Temporarily Wrong
            </h1>
            <p class="text-sm text-charcoal-muted max-w-md mx-auto leading-relaxed font-light">
                Our servers experienced a temporary issue. Don't worry, our 24/7 central dispatch desk is active. You can call or WhatsApp us directly.
            </p>
        </div>

        <!-- Direct Actions -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 pt-4">
            <a href="tel:+919829012345" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-primary hover:bg-primary-hover text-white text-xs font-bold uppercase tracking-wider shadow-md transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                <span>Call Dispatch: 098290 12345</span>
            </a>

            <a href="https://wa.me/919829012345?text=Namaste%20Sujata%20Tours!%20Need%20immediate%20vehicle%20booking." 
               target="_blank" 
               rel="noopener noreferrer"
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold uppercase tracking-wider shadow-sm transition-all duration-200">
                <span>WhatsApp Desk</span>
            </a>

            <a href="{{ route('home') }}" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-sand-200 hover:bg-sand-300 text-charcoal text-xs font-bold uppercase tracking-wider transition-all duration-200">
                <span>Back to Home</span>
            </a>
        </div>

    </div>
</div>
@endsection
