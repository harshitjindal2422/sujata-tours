@extends('layouts.app')

@section('title', 'Rental Terms and Conditions | Sujata Tours Jaipur')
@section('meta_description', 'Review Sujata Tours vehicle rental terms, billing rules, driver allowance, cancellation policy, and toll tax policies.')
@section('canonical_url', route('terms'))

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-2xl border border-border p-8 sm:p-12 shadow-card space-y-6">
        <h1 class="text-3xl font-black text-navy-900 tracking-tight">Terms and Conditions of Vehicle Rental</h1>
        <p class="text-xs text-charcoal-muted border-b border-border pb-4">Last Updated: October 2026 • Sujata Tours, Jaipur, Rajasthan</p>

        <div class="space-y-6 text-sm text-charcoal leading-relaxed">
            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">1. Commercial Rental Basis</h2>
                <p>All vehicles supplied by Sujata Tours are commercial tourist vehicles driven by professional, licensed chauffeurs. We do not provide self-drive vehicles under any circumstances.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">2. Outstation Distance and Time Calculation</h2>
                <p>Outstation kilometers are computed from garage to garage (Sindhi Camp / central depot, Jaipur). The minimum distance charged is 250 km per calendar day. Calendar day calculation begins at 00:00 hours and ends at 23:59 hours.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">3. Tolls, State Taxes and Parking</h2>
                <p>Unless an all-inclusive rate has been explicitly contracted in writing, all state passenger entry taxes (e.g. entry into Delhi, Uttar Pradesh, Haryana, or Gujarat), toll plaza receipts, and parking lot fees are payable at actuals against valid receipts.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">4. Driver Allowance and Night Charges</h2>
                <p>Driver allowance is charged on a daily basis (typically ₹300–₹500 for cars, ₹500–₹600 for tempo travellers, ₹700–₹800 for buses) to cover food and stay. On long-distance drives involving night travel between 22:00 and 06:00 hours, standard driver night allowance applies.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">5. Cancellation and Rescheduling Policy</h2>
                <p>Bookings may be cancelled or rescheduled up to 24 hours prior to scheduled departure time without penalty. In case of peak wedding / festive season (Pushkar Fair, New Year, Diwali), cancellation notice of 72 hours is required for refund of vehicle holding advances.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">6. Passenger Safety and Conduct</h2>
                <p>Carrying contraband, smoking, or consuming alcohol inside commercial tourist vehicles is strictly prohibited under Rajasthan Motor Vehicle rules. Maximum seating capacity as recorded in the vehicle registration certificate (RC) must not be exceeded.</p>
            </section>
        </div>
    </div>
</div>
@endsection
