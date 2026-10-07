<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeoPage;
use App\Models\Vehicle;
use App\Models\Category;
use App\Models\Testimonial;

class SeoController extends Controller
{
    public function show($slug)
    {
        $seoPage = SeoPage::where('slug', $slug)->active()->firstOrFail();

        // Relevant vehicles based on page type / slug
        $vehiclesQuery = Vehicle::available()->orderBy('sort_order', 'asc');
        if (str_contains($slug, 'tempo-traveller')) {
            $vehiclesQuery->where('category_slug', 'tempo-travellers');
        } elseif (str_contains($slug, 'bus')) {
            $vehiclesQuery->where('category_slug', 'buses');
        } elseif (str_contains($slug, 'innova')) {
            $vehiclesQuery->where('slug', 'toyota-innova-crysta');
        } else {
            $vehiclesQuery->take(6);
        }
        $featuredVehicles = $vehiclesQuery->get();

        $testimonials = Testimonial::active()->take(3)->get();
        $allVehiclesForForm = Vehicle::available()->get();

        return view('pages.seo-landing', compact('seoPage', 'featuredVehicles', 'testimonials', 'allVehiclesForForm'));
    }

    public function sitemap()
    {
        $staticUrls = [
            url('/'),
            url('/cars'),
            url('/tempo-travellers'),
            url('/buses'),
            url('/vehicles'),
            url('/about'),
            url('/contact'),
            url('/terms'),
            url('/privacy'),
        ];

        $vehicles = Vehicle::available()->get();
        $seoPages = SeoPage::active()->get();

        $content = view('seo.sitemap', compact('staticUrls', 'vehicles', 'seoPages'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml');
    }

    public function robots()
    {
        $sitemapUrl = url('/sitemap.xml');
        $content = "User-agent: *\nAllow: /\nDisallow: /admin/\n\nSitemap: {$sitemapUrl}\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
