<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_reference',
        'vehicle_id',
        'vehicle_type',
        'specific_vehicle',
        'customer_name',
        'customer_phone',
        'customer_email',
        'pickup_location',
        'drop_location',
        'travel_date',
        'pickup_time',
        'return_date',
        'passenger_count',
        'trip_type',
        'additional_requirements',
        'status',
        'admin_notes',
        'ip_address',
    ];

    protected $casts = [
        'travel_date' => 'date',
        'return_date' => 'date',
        'passenger_count' => 'integer',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public static function generateReference()
    {
        $prefix = 'ST-' . date('Y');
        $random = strtoupper(bin2hex(random_bytes(3)));
        return "{$prefix}-{$random}";
    }

    public function getStatusBadgeClassAttribute()
    {
        return match ($this->status) {
            'new' => 'bg-amber-100 text-amber-800 border-amber-200',
            'contacted' => 'bg-blue-100 text-blue-800 border-blue-200',
            'confirmed' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
            'completed' => 'bg-gray-100 text-gray-800 border-gray-200',
            'cancelled' => 'bg-rose-100 text-rose-800 border-rose-200',
            default => 'bg-gray-100 text-gray-800 border-gray-200',
        };
    }
}
