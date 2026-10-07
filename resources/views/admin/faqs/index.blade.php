@extends('layouts.admin')

@section('title', 'Manage FAQs')
@section('page_title', 'Frequently Asked Questions (SEO & Customer Info)')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Manage FAQs that appear on the homepage and generate rich schema markup for search engines.</p>
        <a href="{{ route('admin.faqs.create') }}" class="btn-primary text-xs px-4 py-2.5">
            + Add Question
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-600 uppercase tracking-wider font-bold border-b border-slate-200">
                <tr>
                    <th class="p-4">Question</th>
                    <th class="p-4">Category</th>
                    <th class="p-4">Answer Excerpt</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($faqs as $faq)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="p-4 font-bold text-navy-900 max-w-xs">
                            {{ $faq->question }}
                        </td>
                        <td class="p-4">
                            <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-semibold text-[11px]">
                                {{ $faq->category }}
                            </span>
                        </td>
                        <td class="p-4 text-slate-600 max-w-md">
                            <p class="line-clamp-2">{{ $faq->answer }}</p>
                        </td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn-secondary text-xs px-2.5 py-1">Edit</a>
                            <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete this FAQ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 font-bold hover:underline ml-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-slate-400">No FAQs logged yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
