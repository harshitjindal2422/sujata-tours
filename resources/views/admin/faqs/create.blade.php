@extends('layouts.admin')

@section('title', 'Add FAQ')
@section('page_title', 'Add FAQ')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900">Add New Question</h2>
        <a href="{{ route('admin.faqs.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900">&larr; Back to FAQs</a>
    </div>

    <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-4 text-xs">
        @csrf

        <div>
            <label for="question" class="block font-bold uppercase text-slate-600 mb-1">Question *</label>
            <input type="text" id="question" name="question" required class="w-full text-xs rounded-lg border-slate-300" placeholder="e.g. Do all vehicles include a driver?">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="category" class="block font-bold uppercase text-slate-600 mb-1">Category *</label>
                <select id="category" name="category" class="w-full text-xs rounded-lg border-slate-300">
                    <option value="General">General</option>
                    <option value="Booking">Booking &amp; Availability</option>
                    <option value="Pricing">Pricing &amp; Fares</option>
                    <option value="Fleet">Vehicle Fleet</option>
                    <option value="Service Areas">Service Areas</option>
                </select>
            </div>

            <div>
                <label for="sort_order" class="block font-bold uppercase text-slate-600 mb-1">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" value="1" class="w-full text-xs rounded-lg border-slate-300">
            </div>
        </div>

        <div>
            <label for="answer" class="block font-bold uppercase text-slate-600 mb-1">Answer *</label>
            <textarea id="answer" name="answer" rows="5" required class="w-full text-xs rounded-lg border-slate-300" placeholder="Write comprehensive, helpful answer for customers..."></textarea>
        </div>

        <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.faqs.index') }}" class="btn-secondary text-xs px-4 py-2">Cancel</a>
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">Save FAQ</button>
        </div>
    </form>
</div>
@endsection
