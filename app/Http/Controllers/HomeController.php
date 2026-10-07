<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Vehicle;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\ServiceArea;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('vehicles')
            ->orderBy('sort_order', 'asc')
            ->get();

        $featuredVehicles = Vehicle::with('category')
            ->available()
            ->featured()
            ->orderBy('sort_order', 'asc')
            ->take(8)
            ->get();

        $allVehiclesForForm = Vehicle::available()
            ->orderBy('category_id', 'asc')
            ->orderBy('sort_order', 'asc')
            ->get();

        $testimonials = Testimonial::active()
            ->take(5)
            ->get();

        $faqs = Faq::active()
            ->take(8)
            ->get();

        $serviceAreas = ServiceArea::active()
            ->get();

        return view('pages.home', compact(
            'categories',
            'featuredVehicles',
            'allVehiclesForForm',
            'testimonials',
            'faqs',
            'serviceAreas'
        ));
    }
}
