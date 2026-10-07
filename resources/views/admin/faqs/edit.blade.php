@extends('layouts.admin')

@section('title', 'Edit FAQ')
@section('page_title', 'Edit FAQ')

@section('content')
<div class="max-w-3xl bg-white rounded-2xl border border-slate-200 p-8 shadow-sm">
    <div class="mb-6 pb-4 border-b border-slate-200 flex items-center justify-between">
        <h2 class="text-lg font-bold text-slate-900">Edit Question</h2>
        <a href="{{ route('admin.faqs.index') }}" class="text-xs font-bold text-slate-600 hover:text-navy-900">&larr; Back to FAQs</a>
    </div>

    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" class="space-y-4 text-xs">
        @csrf
        @method('PUT')

        <div>
            <label for="question" class="block font-bold uppercase text-slate-600 mb-1">Question *</label>
            <input type="text" id="question" name="question" value="{{ old('question', $faq->question) }}" required class="w-full text-xs rounded-lg border-slate-300">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label for="category" class="block font-bold uppercase text-slate-600 mb-1">Category *</label>
                <select id="category" name="category" class="w-full text-xs rounded-lg border-slate-300">
                    <option value="General" {{ $faq->category === 'General' ? 'selected' : '' }}>General</option>
                    <option value="Booking" {{ $faq->category === 'Booking' ? 'selected' : '' }}>Booking &amp; Availability</option>
                    <option value="Pricing" {{ $faq->category === 'Pricing' ? 'selected' : '' }}>Pricing &amp; Fares</option>
                    <option value="Fleet" {{ $faq->category === 'Fleet' ? 'selected' : '' }}>Vehicle Fleet</option>
                    <option value="Service Areas" {{ $faq->category === 'Service Areas' ? 'selected' : '' }}>Service Areas</option>
                </select>
            </div>

            <div>
                <label for="sort_order" class="block font-bold uppercase text-slate-600 mb-1">Sort Order</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $faq->sort_order) }}" class="w-full text-xs rounded-lg border-slate-300">
            </div>
        </div>

        <div>
            <label for="answer" class="block font-bold uppercase text-slate-600 mb-1">Answer *</label>
            <textarea id="answer" name="answer" rows="5" required class="w-full text-xs rounded-lg border-slate-300">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div class="pt-4 border-t border-slate-200 flex justify-end gap-3">
            <a href="{{ route('admin.faqs.index') }}" class="btn-secondary text-xs px-4 py-2">Cancel</a>
            <button type="submit" class="btn-primary text-xs px-6 py-2.5">Update FAQ</button>
        </div>
    </form>
</div>
@endsection
