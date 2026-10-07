<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'category_slug',
        'short_tagline',
        'image',
        'gallery',
        'seating_capacity',
        'ac_type',
        'luggage_capacity',
        'fuel_type',
        'driver_included',
        'local_availability',
        'outstation_availability',
        'starting_price',
        'price_per_km',
        'local_package_rate',
        'outstation_min_km',
        'driver_allowance_per_day',
        'description',
        'features',
        'ideal_for',
        'status',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'gallery' => 'array',
        'features' => 'array',
        'driver_included' => 'boolean',
        'local_availability' => 'boolean',
        'outstation_availability' => 'boolean',
        'is_featured' => 'boolean',
        'price_per_km' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'available');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getFormattedPriceAttribute()
    {
        if ($this->starting_price) {
            return $this->starting_price;
        }
        if ($this->price_per_km) {
            return '₹' . number_format($this->price_per_km, 0) . ' / km';
        }
        return 'Custom Quote';
    }
}
