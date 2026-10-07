<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactInquiry;
use App\Models\Category;
use App\Models\Vehicle;
use App\Models\Testimonial;

class PageController extends Controller
{
    public function about()
    {
        $categories = Category::withCount('vehicles')->get();
        $fleetCount = Vehicle::available()->count();
        $testimonials = Testimonial::active()->take(3)->get();

        return view('pages.about', compact('categories', 'fleetCount', 'testimonials'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|min:10|max:20',
            'email' => 'nullable|email|max:100',
            'subject' => 'nullable|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        ContactInquiry::create($validated);

        return back()->with('success', 'Thank you for reaching out! Our Jaipur fleet desk will respond promptly.');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
}
