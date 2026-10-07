<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Vehicle;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:120',
            'customer_phone' => 'required|string|min:10|max:20',
            'customer_email' => 'nullable|email|max:120',
            'vehicle_type' => 'required|string|max:100',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'specific_vehicle' => 'nullable|string|max:150',
            'pickup_location' => 'required|string|max:255',
            'drop_location' => 'required|string|max:255',
            'travel_date' => 'required|date',
            'pickup_time' => 'nullable|string|max:50',
            'return_date' => 'nullable|date|after_or_equal:travel_date',
            'passenger_count' => 'required|integer|min:1|max:70',
            'trip_type' => 'nullable|string|max:100',
            'additional_requirements' => 'nullable|string|max:2000',
        ]);

        if (!empty($validated['vehicle_id']) && empty($validated['specific_vehicle'])) {
            $vehicle = Vehicle::find($validated['vehicle_id']);
            if ($vehicle) {
                $validated['specific_vehicle'] = $vehicle->name;
            }
        }

        $booking = new Booking();
        $booking->booking_reference = Booking::generateReference();
        $booking->vehicle_id = $validated['vehicle_id'] ?? null;
        $booking->vehicle_type = $validated['vehicle_type'];
        $booking->specific_vehicle = $validated['specific_vehicle'] ?? null;
        $booking->customer_name = $validated['customer_name'];
        $booking->customer_phone = $validated['customer_phone'];
        $booking->customer_email = $validated['customer_email'] ?? null;
        $booking->pickup_location = $validated['pickup_location'];
        $booking->drop_location = $validated['drop_location'];
        $booking->travel_date = $validated['travel_date'];
        $booking->pickup_time = $validated['pickup_time'] ?? null;
        $booking->return_date = $validated['return_date'] ?? null;
        $booking->passenger_count = $validated['passenger_count'];
        $booking->trip_type = $validated['trip_type'] ?? 'Outstation';
        $booking->additional_requirements = $validated['additional_requirements'] ?? null;
        $booking->status = 'new';
        $booking->ip_address = $request->ip();
        $booking->save();

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'reference' => $booking->booking_reference,
                'message' => 'Thank you! Your vehicle inquiry has been received. Our dispatch team will contact you shortly.',
                'redirect' => route('booking.confirmation', ['reference' => $booking->booking_reference]),
            ]);
        }

        return redirect()->route('booking.confirmation', ['reference' => $booking->booking_reference])
            ->with('success', 'Your booking inquiry was submitted successfully!');
    }

    public function confirmation($reference)
    {
        $booking = Booking::where('booking_reference', $reference)->firstOrFail();
        return view('pages.booking-confirmation', compact('booking'));
    }
}
