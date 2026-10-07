<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $totalVehicles = Vehicle::count();
        $availableVehicles = Vehicle::where('status', 'available')->count();
        $totalBookings = Booking::count();
        $newBookings = Booking::where('status', 'new')->count();
        $contactedBookings = Booking::where('status', 'contacted')->count();
        $confirmedBookings = Booking::where('status', 'confirmed')->count();
        $completedBookings = Booking::where('status', 'completed')->count();

        $recentBookings = Booking::with('vehicle')
            ->latest()
            ->take(8)
            ->get();

        $fleetSummary = Category::withCount('vehicles')->get();

        return view('admin.dashboard', compact(
            'totalVehicles',
            'availableVehicles',
            'totalBookings',
            'newBookings',
            'contactedBookings',
            'confirmedBookings',
            'completedBookings',
            'recentBookings',
            'fleetSummary'
        ));
    }
}
