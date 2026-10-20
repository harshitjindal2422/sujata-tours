@extends('layouts.app')

@section('title', 'Contact Sujata Tours | Jaipur Fleet Office and Booking Desk')
@section('meta_description', 'Contact Sujata Tours in Jaipur for vehicle bookings, quotes, and corporate transport inquiries. Call 098290 12345 or visit our Sindhi Camp office.')
@section('canonical_url', route('contact'))

@section('content')
    <!-- Contact Header -->
    <div class="bg-navy-900 text-white py-16 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <span class="text-xs font-bold uppercase tracking-widest text-primary-light">Get In Touch</span>
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black tracking-tight text-white mt-1">
                Contact Our Jaipur Fleet Desk
            </h1>
            <p class="text-slate-300 text-base sm:text-lg mt-3 max-w-2xl leading-relaxed">
                Have questions regarding vehicle availability, long-term rental rates, or wedding guest transport? Call our dispatch desk or send us a message.
            </p>
        </div>
    </div>

    <!-- Contact Info and Form -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Contact Details (5 cols) -->
            <div class="lg:col-span-5 space-y-8">
                <div>
                    <h2 class="text-2xl font-bold text-navy-900">Head Office and Fleet Garage</h2>
                    <p class="text-sm text-charcoal-muted mt-2 leading-relaxed">
                        Centrally located near Sindhi Camp bus station and Jaipur Railway Junction for quick dispatches to any city location or airport terminal.
                    </p>
                </div>

                <div class="space-y-6">
                    <div class="flex items-start gap-4 p-4 rounded-xl bg-white border border-border shadow-subtle">
                        <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div class="text-sm">
                            <strong class="block text-navy-900 font-bold">Physical Address:</strong>
                            <p class="text-charcoal-muted mt-0.5">Plot No. 18, Near Sindhi Camp Station Road, Gopalbari, Jaipur, Rajasthan 302001, India</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-white border border-border shadow-subtle">
                        <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div class="text-sm">
                            <strong class="block text-navy-900 font-bold">Dispatch Phone Numbers:</strong>
                            <p class="mt-0.5"><a href="tel:+919829012345" class="text-navy-900 font-bold hover:text-primary">+91 98290 12345</a></p>
                            <p><a href="tel:+919414067890" class="text-charcoal-muted hover:text-navy-900">+91 94140 67890 (Helpline)</a></p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-white border border-border shadow-subtle">
                        <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div class="text-sm">
                            <strong class="block text-navy-900 font-bold">Email Communication:</strong>
                            <p class="mt-0.5"><a href="mailto:bookings@sujatatours.com" class="text-charcoal-muted hover:text-navy-900">bookings@sujatatours.com</a></p>
                            <p><a href="mailto:info@sujatatours.com" class="text-charcoal-muted hover:text-navy-900">info@sujatatours.com</a></p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 p-4 rounded-xl bg-white border border-border shadow-subtle">
                        <div class="w-10 h-10 rounded-lg bg-navy-50 flex items-center justify-center text-navy-900 flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <div class="text-sm">
                            <strong class="block text-navy-900 font-bold">Operational Hours:</strong>
                            <p class="text-charcoal-muted mt-0.5">24 Hours / 7 Days On-Duty Fleet Dispatch</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Interactive Inquiry Form (7 cols) -->
            <div class="lg:col-span-7">
                <div class="bg-white rounded-2xl border border-border p-8 shadow-card">
                    <h2 class="text-2xl font-black text-navy-900 mb-2">Send an Inquiry</h2>
                    <p class="text-xs text-charcoal-muted mb-6">
                        For custom corporate contracts, multi-vehicle events, or feedback, submit your message below.
                    </p>

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">Your Name *</label>
                                <input type="text" id="name" name="name" required class="w-full text-sm rounded-lg border-border focus:border-navy-900 focus:ring-navy-900" placeholder="e.g. Vikram Singhal">
                            </div>

                            <div>
                                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">Phone Number *</label>
                                <input type="tel" id="phone" name="phone" required class="w-full text-sm rounded-lg border-border focus:border-navy-900 focus:ring-navy-900" placeholder="+91 98290 XXXXX">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full text-sm rounded-lg border-border focus:border-navy-900 focus:ring-navy-900" placeholder="vikram@example.com">
                            </div>

                            <div>
                                <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">Subject</label>
                                <input type="text" id="subject" name="subject" class="w-full text-sm rounded-lg border-border focus:border-navy-900 focus:ring-navy-900" placeholder="e.g. Corporate contract quote">
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-xs font-bold uppercase tracking-wider text-charcoal-muted mb-1">Message *</label>
                            <textarea id="message" name="message" rows="4" required class="w-full text-sm rounded-lg border-border focus:border-navy-900 focus:ring-navy-900" placeholder="Describe your vehicle needs, travel dates, passenger group, or questions..."></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="btn-primary w-full sm:w-auto px-8 py-3 text-sm">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
