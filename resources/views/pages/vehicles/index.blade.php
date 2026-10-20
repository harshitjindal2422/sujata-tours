@extends('layouts.app')

@section('title', 'Vehicle Fleet and Rental Options in Jaipur | Sujata Tours')
@section('meta_description', 'Browse our full vehicle fleet for rent in Jaipur. Chauffeur-driven sedans, SUVs, 12 to 26 seater tempo travellers, and 21 to 45 seater luxury tourist buses.')
@section('canonical_url', route('vehicles.index'))

@section('content')
    <!-- Header Banner -->
    <div class="bg-navy-900 text-white py-14 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-primary">Our Commercial Fleet</span>
            <h1 class="text-3xl sm:text-4xl font-black tracking-tight mt-1">
                Browse Rental Vehicles
            </h1>
            <p class="text-slate-300 text-sm sm:text-base mt-2 max-w-2xl leading-relaxed">
                All vehicles are clean, sanitized, and dispatched with experienced commercial drivers. Select your preferred class below:
            </p>
        </div>
    </div>

    <!-- Filter Bar and Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Category Filter Tabs -->
        <div class="flex flex-wrap items-center justify-between gap-4 mb-10 pb-6 border-b border-border">
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('vehicles.index') }}" 
                    class="px-4 py-2 rounded-lg text-xs font-bold transition-all {{ empty($selectedCategory) ? 'bg-navy-900 text-white shadow-sm' : 'bg-white text-charcoal border border-border hover:bg-surface-subtle' }}">
                    All Vehicles
                </a>
                <a href="{{ route('vehicles.cars') }}" 
                    class="px-4 py-2 rounded-lg text-xs font-bold transition-all {{ $selectedCategory === 'cars' ? 'bg-navy-900 text-white shadow-sm' : 'bg-white text-charcoal border border-border hover:bg-surface-subtle' }}">
                    Cars (Sedan and SUV)
                </a>
                <a href="{{ route('vehicles.tempo-travellers') }}" 
                    class="px-4 py-2 rounded-lg text-xs font-bold transition-all {{ $selectedCategory === 'tempo-travellers' ? 'bg-navy-900 text-white shadow-sm' : 'bg-white text-charcoal border border-border hover:bg-surface-subtle' }}">
                    Tempo Travellers (12-26 Seater)
                </a>
                <a href="{{ route('vehicles.buses') }}" 
                    class="px-4 py-2 rounded-lg text-xs font-bold transition-all {{ $selectedCategory === 'buses' ? 'bg-navy-900 text-white shadow-sm' : 'bg-white text-charcoal border border-border hover:bg-surface-subtle' }}">
                    Buses and Coaches (21-45 Seater)
                </a>
            </div>

            <!-- Passenger Count Filter -->
            <form method="GET" action="{{ route('vehicles.index') }}" class="flex items-center gap-2">
                @if($selectedCategory)
                    <input type="hidden" name="category" value="{{ $selectedCategory }}">
                @endif
                <label for="passengers-filter" class="text-xs font-semibold text-charcoal-muted">Min Seats:</label>
                <select id="passengers-filter" name="passengers" onchange="this.form.submit()" class="text-xs rounded-md border-border py-1.5 pl-2 pr-7">
                    <option value="">Any</option>
                    <option value="4" {{ $minPassengers == '4' ? 'selected' : '' }}>4+ Seats</option>
                    <option value="6" {{ $minPassengers == '6' ? 'selected' : '' }}>6+ Seats</option>
                    <option value="12" {{ $minPassengers == '12' ? 'selected' : '' }}>12+ Seats</option>
                    <option value="20" {{ $minPassengers == '20' ? 'selected' : '' }}>20+ Seats</option>
                    <option value="35" {{ $minPassengers == '35' ? 'selected' : '' }}>35+ Seats</option>
                </select>
            </form>
        </div>

        <!-- Vehicles Grid -->
        @if($vehicles->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($vehicles as $vehicle)
                    <x-vehicle-card :vehicle="$vehicle" />
                @endforeach
            </div>

            <div class="mt-12">
                {{ $vehicles->links() }}
            </div>
        @else
            <div class="text-center py-16 bg-white rounded-2xl border border-border p-8">
                <p class="text-lg font-bold text-navy-900">No vehicles matching your current filter.</p>
                <p class="text-xs text-charcoal-muted mt-1">Please reset filters or contact our dispatch team directly.</p>
                <a href="{{ route('vehicles.index') }}" class="btn-primary mt-4 text-xs">Reset Filters</a>
            </div>
        @endif

    </div>

    <!-- Quick Booking Strip -->
    <div class="bg-surface-subtle py-16 border-t border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-booking-form :vehicles="$vehicles" />
        </div>
    </div>
@endsection
