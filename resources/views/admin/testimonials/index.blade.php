@extends('layouts.admin')

@section('title', 'Manage Customer Reviews')
@section('page_title', 'Reviews & Testimonials')

@section('content')
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <p class="text-xs text-slate-500">Manage real customer feedback displayed on the homepage and landing pages.</p>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary text-xs px-4 py-2.5">
            + Add Review
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-xs">
            <thead class="bg-slate-50 text-slate-600 uppercase tracking-wider font-bold border-b border-slate-200">
                <tr>
                    <th class="p-4">Customer</th>
                    <th class="p-4">Rating</th>
                    <th class="p-4">Review Excerpt</th>
                    <th class="p-4">Vehicle / Trip</th>
                    <th class="p-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($testimonials as $t)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="p-4">
                            <strong class="text-slate-900 block">{{ $t->customer_name }}</strong>
                            <span class="text-[10px] text-slate-400">{{ $t->customer_city }}</span>
                        </td>
                        <td class="p-4 text-amber-500 font-bold whitespace-nowrap">
                            {{ str_repeat('★', $t->rating) }}
                        </td>
                        <td class="p-4 text-slate-600 max-w-sm">
                            <p class="line-clamp-2">{{ $t->review_text }}</p>
                        </td>
                        <td class="p-4 text-slate-500 text-[11px]">
                            <div>{{ $t->vehicle_used }}</div>
                            <span class="text-slate-400 block">{{ $t->trip_details }}</span>
                        </td>
                        <td class="p-4 text-right space-x-2 whitespace-nowrap">
                            <a href="{{ route('admin.testimonials.edit', $t->id) }}" class="btn-secondary text-xs px-2.5 py-1">Edit</a>
                            <form action="{{ route('admin.testimonials.destroy', $t->id) }}" method="POST" class="inline" onsubmit="return confirm('Delete review?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-rose-600 font-bold hover:underline ml-1">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-400">No testimonials logged yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
