@extends('layouts.admin')

@section('title', 'Company Settings')
@section('page_title', 'Company & Contact Settings')

@section('content')
<div class="max-w-4xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200">
        <h2 class="text-lg font-bold text-slate-900">Company Information &amp; Direct Helplines</h2>
        <p class="text-xs text-slate-500">Update company phone numbers, WhatsApp, physical address, and GST details shown across the website.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-6 text-xs">
        @csrf

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
                <label for="company_name" class="block font-bold uppercase text-slate-600 mb-1">Company Name</label>
                <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $settings['company_name'] ?? 'Sujata Tours') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="gst_number" class="block font-bold uppercase text-slate-600 mb-1">GST Registration Number</label>
                <input type="text" id="gst_number" name="gst_number" value="{{ old('gst_number', $settings['gst_number'] ?? '08AALCS9821Q1ZU') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div class="sm:col-span-2">
                <label for="tagline" class="block font-bold uppercase text-slate-600 mb-1">Company Tagline</label>
                <input type="text" id="tagline" name="tagline" value="{{ old('tagline', $settings['tagline'] ?? 'Reliable Cars, Tempo Travellers & Buses for Every Journey') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="phone" class="block font-bold uppercase text-slate-600 mb-1">Primary Dispatch Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $settings['phone'] ?? '+91 98290 12345') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="whatsapp" class="block font-bold uppercase text-slate-600 mb-1">WhatsApp Direct Number</label>
                <input type="text" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $settings['whatsapp'] ?? '+91 98290 12345') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="secondary_phone" class="block font-bold uppercase text-slate-600 mb-1">Secondary Helpline</label>
                <input type="text" id="secondary_phone" name="secondary_phone" value="{{ old('secondary_phone', $settings['secondary_phone'] ?? '+91 94140 67890') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="email" class="block font-bold uppercase text-slate-600 mb-1">Bookings Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $settings['email'] ?? 'bookings@sujatatours.com') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div class="sm:col-span-2">
                <label for="address" class="block font-bold uppercase text-slate-600 mb-1">Office &amp; Garage Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $settings['address'] ?? 'Plot No. 18, Near Sindhi Camp Station Road, Gopalbari, Jaipur, Rajasthan 302001') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="working_hours" class="block font-bold uppercase text-slate-600 mb-1">Operating Hours</label>
                <input type="text" id="working_hours" name="working_hours" value="{{ old('working_hours', $settings['working_hours'] ?? '24 Hours / 7 Days Fleet Dispatch & Support') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="fleet_size" class="block font-bold uppercase text-slate-600 mb-1">Fleet Count Display</label>
                <input type="text" id="fleet_size" name="fleet_size" value="{{ old('fleet_size', $settings['fleet_size'] ?? '65+') }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>
        </div>

        <div class="pt-4 border-t border-slate-200 flex justify-end">
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">
                Save Company Settings
            </button>
        </div>
    </form>
</div>
@endsection
