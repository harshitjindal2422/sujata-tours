<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'subtitle',
        'description',
        'image',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class)->orderBy('sort_order', 'asc');
    }

    public function availableVehicles()
    {
        return $this->hasMany(Vehicle::class)->where('status', 'available')->orderBy('sort_order', 'asc');
    }
}
