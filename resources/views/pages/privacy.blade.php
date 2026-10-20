@extends('layouts.app')

@section('title', 'Privacy Policy | Sujata Tours Jaipur')
@section('meta_description', 'Privacy policy of Sujata Tours regarding passenger contact details, booking information, and fleet coordination.')
@section('canonical_url', route('privacy'))

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="bg-white rounded-2xl border border-border p-8 sm:p-12 shadow-card space-y-6">
        <h1 class="text-3xl font-black text-navy-900 tracking-tight">Privacy Policy</h1>
        <p class="text-xs text-charcoal-muted border-b border-border pb-4">Last Updated: October 2026 • Sujata Tours</p>

        <div class="space-y-6 text-sm text-charcoal leading-relaxed">
            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">1. Information We Collect</h2>
                <p>When you enquire or book a vehicle on our website, we collect your name, phone/WhatsApp number, email address, travel dates, passenger count, and journey route to process vehicle availability and communicate driver dispatch details.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">2. How We Use Your Details</h2>
                <p>Your contact details are strictly used to coordinate your specific trip, send route quotation breakdowns, transmit driver telephone numbers, and confirm pickup location milestones. We do not sell, rent, or trade customer information to third-party telemarketers.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">3. Driver and Route Coordination</h2>
                <p>Your name, pickup address, and contact number are securely shared only with the assigned commercial chauffeur and fleet coordinator on duty for the purpose of meeting you punctually.</p>
            </section>

            <section class="space-y-2">
                <h2 class="text-lg font-bold text-navy-900">4. Contact and Data Inquiries</h2>
                <p>If you have any questions regarding your stored booking inquiries or wish to request data removal, please contact our dispatch desk at <a href="mailto:info@sujatatours.com" class="text-navy-900 underline font-semibold">info@sujatatours.com</a> or call +91 98290 12345.</p>
            </section>
        </div>
    </div>
</div>
@endsection
