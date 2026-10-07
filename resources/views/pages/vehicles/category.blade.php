@extends('layouts.app')

@section('title', $pageTitle)
@section('meta_description', $metaDescription)
@section('canonical_url', url()->current())

@section('content')
    <!-- Category Hero Banner -->
    <div class="bg-navy-900 text-white py-16 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl">
                <!-- Breadcrumbs -->
                <nav class="flex items-center gap-2 text-xs text-slate-400 mb-3" aria-label="Breadcrumb">
                    <a href="{{ route('home') }}" class="hover:text-white">Home</a>
                    <span>/</span>
                    <a href="{{ route('vehicles.index') }}" class="hover:text-white">Vehicles</a>
                    <span>/</span>
                    <span class="text-white font-medium">{{ $category->name }}</span>
                </nav>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white">
                    {{ $category->name }} in Jaipur
                </h1>
                
                @if($category->subtitle)
                    <p class="text-amber-400 font-bold text-sm uppercase tracking-wider mt-2">
                        {{ $category->subtitle }}
                    </p>
                @endif

                <p class="text-slate-300 text-base mt-3 leading-relaxed">
                    {{ $category->description }}
                </p>

                <div class="flex items-center gap-4 mt-6">
                    <a href="#category-booking" class="btn-primary bg-white text-navy-900 hover:bg-slate-100 text-xs px-5 py-2.5">
                        Book {{ $category->name }}
                    </a>
                    <a href="tel:+919829012345" class="text-xs text-slate-300 hover:text-white font-bold flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>Direct Booking: 098290 12345</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Vehicles Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="flex items-center justify-between mb-8 pb-4 border-b border-border">
            <h2 class="text-xl sm:text-2xl font-bold text-navy-900">
                Available {{ $category->name }} Fleet
            </h2>
            <span class="text-xs text-charcoal-muted font-semibold">
                {{ $vehicles->count() }} Models Configured
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($vehicles as $vehicle)
                <x-vehicle-card :vehicle="$vehicle" />
            @endforeach
        </div>
    </div>

    <!-- Embedded Booking Form -->
    <div id="category-booking" class="bg-surface-subtle py-16 border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-booking-form :vehicles="$vehicles" />
        </div>
    </div>
@endsection
