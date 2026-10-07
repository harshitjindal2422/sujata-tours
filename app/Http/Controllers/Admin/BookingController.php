<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        $search = $request->query('search');

        $query = Booking::with('vehicle')->latest();

        if ($status && in_array($status, ['new', 'contacted', 'confirmed', 'completed', 'cancelled'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                  ->orWhere('customer_phone', 'like', "%{$search}%")
                  ->orWhere('booking_reference', 'like', "%{$search}%")
                  ->orWhere('pickup_location', 'like', "%{$search}%")
                  ->orWhere('drop_location', 'like', "%{$search}%");
            });
        }

        $bookings = $query->paginate(15)->withQueryString();

        $statusCounts = [
            'all' => Booking::count(),
            'new' => Booking::where('status', 'new')->count(),
            'contacted' => Booking::where('status', 'contacted')->count(),
            'confirmed' => Booking::where('status', 'confirmed')->count(),
            'completed' => Booking::where('status', 'completed')->count(),
            'cancelled' => Booking::where('status', 'cancelled')->count(),
        ];

        return view('admin.bookings.index', compact('bookings', 'statusCounts', 'status', 'search'));
    }

    public function show($id)
    {
        $booking = Booking::with('vehicle')->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'status' => 'required|in:new,contacted,confirmed,completed,cancelled',
            'admin_notes' => 'nullable|string|max:2000',
        ]);

        $booking->status = $validated['status'];
        if (isset($validated['admin_notes'])) {
            $booking->admin_notes = $validated['admin_notes'];
        }
        $booking->save();

        return back()->with('success', "Booking {$booking->booking_reference} status updated to " . ucfirst($booking->status));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $ref = $booking->booking_reference;
        $booking->delete();

        return redirect()->route('admin.bookings.index')->with('success', "Booking inquiry {$ref} deleted.");
    }
}
