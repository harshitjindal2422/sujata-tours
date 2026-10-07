<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'page_type',
        'h1_title',
        'meta_title',
        'meta_description',
        'canonical_url',
        'hero_subtitle',
        'summary',
        'content_body',
        'features',
        'route_details',
        'faqs',
        'is_active',
    ];

    protected $casts = [
        'features' => 'array',
        'route_details' => 'array',
        'faqs' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
