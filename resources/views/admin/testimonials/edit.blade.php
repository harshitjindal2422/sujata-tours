@extends('layouts.admin')

@section('title', 'Edit Review')
@section('page_title', 'Edit Review')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900">Edit Customer Feedback</h2>
        <a href="{{ route('admin.testimonials.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900">&larr; Back to list</a>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" class="space-y-4 text-xs">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="customer_name" class="block font-bold uppercase text-slate-600 mb-1">Customer Name *</label>
                <input type="text" id="customer_name" name="customer_name" value="{{ old('customer_name', $testimonial->customer_name) }}" required class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="customer_city" class="block font-bold uppercase text-slate-600 mb-1">City / Region</label>
                <input type="text" id="customer_city" name="customer_city" value="{{ old('customer_city', $testimonial->customer_city) }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div>
                <label for="rating" class="block font-bold uppercase text-slate-600 mb-1">Star Rating (1-5) *</label>
                <select id="rating" name="rating" class="w-full text-xs rounded-lg border-slate-300">
                    <option value="5" {{ $testimonial->rating == 5 ? 'selected' : '' }}>5 Stars (Excellent)</option>
                    <option value="4" {{ $testimonial->rating == 4 ? 'selected' : '' }}>4 Stars (Very Good)</option>
                    <option value="3" {{ $testimonial->rating == 3 ? 'selected' : '' }}>3 Stars (Average)</option>
                </select>
            </div>

            <div>
                <label for="vehicle_used" class="block font-bold uppercase text-slate-600 mb-1">Vehicle Used</label>
                <input type="text" id="vehicle_used" name="vehicle_used" value="{{ old('vehicle_used', $testimonial->vehicle_used) }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>

            <div>
                <label for="trip_details" class="block font-bold uppercase text-slate-600 mb-1">Trip Details</label>
                <input type="text" id="trip_details" name="trip_details" value="{{ old('trip_details', $testimonial->trip_details) }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>
        </div>

        <div>
            <label for="review_text" class="block font-bold uppercase text-slate-600 mb-1">Review Feedback *</label>
            <textarea id="review_text" name="review_text" rows="4" required class="w-full text-xs rounded-lg border-slate-300">{{ old('review_text', $testimonial->review_text) }}</textarea>
        </div>

        <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.testimonials.index') }}" class="btn-secondary text-xs px-4 py-2">Cancel</a>
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">Update Review</button>
        </div>
    </form>
</div>
@endsection
