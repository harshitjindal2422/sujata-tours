@props([
    'vehicles' => null,
    'selectedVehicle' => null,
    'id' => 'quick-booking-form',
    'compact' => false
])

<form action="{{ route('booking.store') }}" 
      method="POST" 
      id="{{ $id }}"
      class="bg-white rounded-2xl border border-border p-6 sm:p-8 shadow-card transition-all"
      x-data="{
          vehicleType: '{{ old('vehicle_type', $selectedVehicle ? ($selectedVehicle->category ? $selectedVehicle->category->name : 'Car Rental') : 'Car Rental') }}',
          selectedVehicleId: '{{ old('vehicle_id', $selectedVehicle ? $selectedVehicle->id : '') }}',
          passengers: '{{ old('passenger_count', $selectedVehicle ? $selectedVehicle->seating_capacity : 4) }}',
          tripType: '{{ old('trip_type', 'Outstation') }}',
          submitting: false
      }"
      @submit="submitting = true">
    @csrf

    <div class="mb-6 pb-4 border-b border-border flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
        <div>
            <h3 class="text-xl sm:text-2xl font-black text-navy-900 tracking-tight">
                {{ $compact ? 'Reserve This Vehicle' : 'Check Vehicle Availability & Fare' }}
            </h3>
            <p class="text-xs sm:text-sm text-charcoal-muted mt-0.5">
                Instant response from our Jaipur dispatch desk with commercial driver & transparent rates.
            </p>
        </div>
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-800 border border-emerald-200 self-start sm:self-auto">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            No Advance Obligation
        </div>
    </div>

    <!-- Trip Type Selector -->
    <div class="mb-6">
        <label class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-2">Trip Type</label>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
            @foreach(['Outstation Round Trip' => 'Outstation Round Trip', 'One-way Drop' => 'One-way Drop', 'Jaipur Local (8h/80km)' => 'Jaipur Local', 'Airport Transfer' => 'Airport Transfer'] as $label => $val)
                <label class="cursor-pointer border text-xs font-semibold rounded-lg p-2.5 text-center transition-all flex items-center justify-center gap-1.5"
                       :class="tripType === '{{ $val }}' ? 'bg-navy-900 text-white border-navy-900 shadow-sm' : 'bg-surface-muted text-charcoal border-border hover:bg-white'">
                    <input type="radio" name="trip_type" value="{{ $val }}" x-model="tripType" class="sr-only">
                    <span>{{ $label }}</span>
                </label>
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        
        <!-- 1. Vehicle Category -->
        <div>
            <label for="{{ $id }}_vehicle_type" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Vehicle Category <span class="text-rose-500">*</span>
            </label>
            <select id="{{ $id }}_vehicle_type" 
                    name="vehicle_type" 
                    x-model="vehicleType"
                    required
                    class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
                <option value="Car Rental">Car Rental (Sedan / SUV)</option>
                <option value="Tempo Traveller">Tempo Traveller (12 to 26 Seater)</option>
                <option value="Bus Rental">Bus & Coach Rental (21 to 45 Seater)</option>
            </select>
            @error('vehicle_type') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 2. Specific Vehicle (Optional / Preselected) -->
        <div>
            <label for="{{ $id }}_specific_vehicle" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Specific Preferred Vehicle
            </label>
            <select id="{{ $id }}_vehicle_id" 
                    name="vehicle_id" 
                    x-model="selectedVehicleId"
                    class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
                <option value="">Any vehicle fitting my group</option>
                @if(isset($vehicles) && count($vehicles))
                    @foreach($vehicles as $v)
                        <option value="{{ $v->id }}">{{ $v->name }} ({{ $v->seating_capacity }} Seater - {{ $v->formatted_price }})</option>
                    @endforeach
                @elseif($selectedVehicle)
                    <option value="{{ $selectedVehicle->id }}" selected>{{ $selectedVehicle->name }} ({{ $selectedVehicle->seating_capacity }} Seater)</option>
                @endif
            </select>
            @error('vehicle_id') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 3. Number of Passengers -->
        <div>
            <label for="{{ $id }}_passenger_count" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Passengers <span class="text-rose-500">*</span>
            </label>
            <input type="number" 
                   id="{{ $id }}_passenger_count" 
                   name="passenger_count" 
                   x-model="passengers"
                   min="1" 
                   max="70"
                   required
                   class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5"
                   placeholder="e.g. 4 or 12">
            @error('passenger_count') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 4. Pickup Location -->
        <div>
            <label for="{{ $id }}_pickup_location" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Pickup Location <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
                <input type="text" 
                       id="{{ $id }}_pickup_location" 
                       name="pickup_location" 
                       value="{{ old('pickup_location') }}"
                       required
                       placeholder="e.g. Jaipur Airport / Vaishali Nagar" 
                       class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5 pl-9">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            @error('pickup_location') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 5. Drop Location / Destination -->
        <div>
            <label for="{{ $id }}_drop_location" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Drop / Destination <span class="text-rose-500">*</span>
            </label>
            <div class="relative">
                <input type="text" 
                       id="{{ $id }}_drop_location" 
                       name="drop_location" 
                       value="{{ old('drop_location') }}"
                       required
                       placeholder="e.g. Udaipur / Delhi Airport / Local Jaipur" 
                       class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5 pl-9">
                <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            </div>
            @error('drop_location') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 6. Travel Date -->
        <div>
            <label for="{{ $id }}_travel_date" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Travel Date <span class="text-rose-500">*</span>
            </label>
            <input type="date" 
                   id="{{ $id }}_travel_date" 
                   name="travel_date" 
                   value="{{ old('travel_date', date('Y-m-d', strtotime('+1 day'))) }}"
                   min="{{ date('Y-m-d') }}"
                   required
                   class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
            @error('travel_date') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 7. Pickup Time -->
        <div>
            <label for="{{ $id }}_pickup_time" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Pickup Time
            </label>
            <input type="text" 
                   id="{{ $id }}_pickup_time" 
                   name="pickup_time" 
                   value="{{ old('pickup_time', '08:00 AM') }}"
                   placeholder="e.g. 08:30 AM or 11:00 PM"
                   class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
            @error('pickup_time') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 8. Return Date (Optional for round trips) -->
        <div>
            <label for="{{ $id }}_return_date" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Return Date (If Round Trip)
            </label>
            <input type="date" 
                   id="{{ $id }}_return_date" 
                   name="return_date" 
                   value="{{ old('return_date') }}"
                   min="{{ date('Y-m-d') }}"
                   class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
            @error('return_date') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 9. Customer Name -->
        <div>
            <label for="{{ $id }}_customer_name" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Your Full Name <span class="text-rose-500">*</span>
            </label>
            <input type="text" 
                   id="{{ $id }}_customer_name" 
                   name="customer_name" 
                   value="{{ old('customer_name') }}"
                   required
                   placeholder="e.g. Rajesh Sharma"
                   class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
            @error('customer_name') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 10. Phone Number -->
        <div>
            <label for="{{ $id }}_customer_phone" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Phone / WhatsApp Number <span class="text-rose-500">*</span>
            </label>
            <input type="tel" 
                   id="{{ $id }}_customer_phone" 
                   name="customer_phone" 
                   value="{{ old('customer_phone') }}"
                   required
                   placeholder="+91 98290 XXXXX"
                   class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
            @error('customer_phone') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 11. Email (Optional) -->
        <div>
            <label for="{{ $id }}_customer_email" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Email Address (Optional)
            </label>
            <input type="email" 
                   id="{{ $id }}_customer_email" 
                   name="customer_email" 
                   value="{{ old('customer_email') }}"
                   placeholder="rajesh@example.com"
                   class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">
            @error('customer_email') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- 12. Additional Requirements -->
        <div class="md:col-span-2 lg:col-span-3">
            <label for="{{ $id }}_additional_requirements" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1.5">
                Special Travel Requirements / Notes
            </label>
            <textarea id="{{ $id }}_additional_requirements" 
                      name="additional_requirements" 
                      rows="2"
                      placeholder="e.g. Flight 6E-204 arrival at Jaipur Airport, traveling with 2 elderly parents, need roof luggage carrier, GST invoice needed..."
                      class="w-full text-sm font-medium rounded-lg border-border focus:border-navy-900 focus:ring-navy-900 bg-white py-2.5">{{ old('additional_requirements') }}</textarea>
            @error('additional_requirements') <p class="text-rose-600 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <!-- Submit CTA & Trust Strip -->
    <div class="mt-8 pt-6 border-t border-border flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3 text-xs text-charcoal-muted text-center sm:text-left">
            <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            <span>Verified driver details and exact quote sent to your phone within 15 minutes.</span>
        </div>

        <button type="submit" 
                :disabled="submitting"
                class="w-full sm:w-auto btn-primary px-8 py-3.5 text-base shadow-md hover:shadow-lg gap-2 cursor-pointer">
            <span x-show="!submitting">Check Availability &amp; Get Quote</span>
            <span x-show="submitting" x-cloak class="inline-flex items-center gap-2">
                <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                Checking Fleet...
            </span>
            <svg x-show="!submitting" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </button>
    </div>
</form>

<script>
window.selectVehicleForBooking = function(vehicleId, vehicleName, categoryName) {
    const el = document.getElementById('{{ $id }}');
    if (!el) return;
    
    const catSelect = document.getElementById('{{ $id }}_vehicle_type');
    const vehSelect = document.getElementById('{{ $id }}_vehicle_id');
    
    if (categoryName && catSelect) {
        if (categoryName.includes('Car')) catSelect.value = 'Car Rental';
        else if (categoryName.includes('Tempo')) catSelect.value = 'Tempo Traveller';
        else if (categoryName.includes('Bus')) catSelect.value = 'Bus Rental';
        catSelect.dispatchEvent(new Event('change'));
    }
    
    if (vehicleId && vehSelect) {
        vehSelect.value = vehicleId;
        vehSelect.dispatchEvent(new Event('change'));
    }
    
    el.scrollIntoView({ behavior: 'smooth', block: 'center' });
};
</script>
