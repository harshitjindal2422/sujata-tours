<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\ServiceAreaController as AdminServiceAreaController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Fleet & Vehicle Categories
Route::get('/cars', [VehicleController::class, 'cars'])->name('vehicles.cars');
Route::get('/tempo-travellers', [VehicleController::class, 'tempoTravellers'])->name('vehicles.tempo-travellers');
Route::get('/buses', [VehicleController::class, 'buses'])->name('vehicles.buses');
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehicles/{slug}', [VehicleController::class, 'show'])->name('vehicles.show');

// Bookings & Inquiries
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
Route::get('/booking-confirmation/{reference}', [BookingController::class, 'confirmation'])->name('booking.confirmation');

// Informational Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'contactStore'])->name('contact.store');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

// Technical SEO
Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('seo.robots');

/*
|--------------------------------------------------------------------------
| Dedicated SEO Landing Pages
|--------------------------------------------------------------------------
*/
$seoRoutes = [
    'car-rental-jaipur',
    'taxi-service-jaipur',
    'tempo-traveller-jaipur',
    'bus-rental-jaipur',
    'innova-rental-jaipur',
    'outstation-cab-jaipur',
    'jaipur-to-delhi-taxi',
    'jaipur-to-jodhpur-taxi',
    'jaipur-to-udaipur-taxi',
    'jaipur-to-jaisalmer-taxi',
];

foreach ($seoRoutes as $slug) {
    Route::get("/{$slug}", function () use ($slug) {
        return app(\App\Http\Controllers\SeoController::class)->show($slug);
    })->name("seo.{$slug}");
}

/*
|--------------------------------------------------------------------------
| Admin Authentication & Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Bookings
        Route::get('/bookings', [AdminBookingController::class, 'index'])->name('bookings.index');
        Route::get('/bookings/{id}', [AdminBookingController::class, 'show'])->name('bookings.show');
        Route::post('/bookings/{id}/status', [AdminBookingController::class, 'updateStatus'])->name('bookings.status');
        Route::delete('/bookings/{id}', [AdminBookingController::class, 'destroy'])->name('bookings.destroy');

        // Vehicles
        Route::get('/vehicles', [AdminVehicleController::class, 'index'])->name('vehicles.index');
        Route::get('/vehicles/create', [AdminVehicleController::class, 'create'])->name('vehicles.create');
        Route::post('/vehicles', [AdminVehicleController::class, 'store'])->name('vehicles.store');
        Route::get('/vehicles/{id}/edit', [AdminVehicleController::class, 'edit'])->name('vehicles.edit');
        Route::put('/vehicles/{id}', [AdminVehicleController::class, 'update'])->name('vehicles.update');
        Route::post('/vehicles/{id}/toggle-status', [AdminVehicleController::class, 'toggleStatus'])->name('vehicles.toggle');
        Route::delete('/vehicles/{id}', [AdminVehicleController::class, 'destroy'])->name('vehicles.destroy');

        // Testimonials
        Route::resource('testimonials', AdminTestimonialController::class);

        // FAQs
        Route::resource('faqs', AdminFaqController::class);

        // Service Areas
        Route::resource('service-areas', AdminServiceAreaController::class);

        // Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
    });
});
