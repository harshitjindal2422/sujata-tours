<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category_slug')->default('cars');
            $table->string('short_tagline')->nullable();
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->integer('seating_capacity')->default(4);
            $table->string('ac_type')->default('Air Conditioned (AC)');
            $table->string('luggage_capacity')->nullable();
            $table->string('fuel_type')->default('Diesel');
            $table->boolean('driver_included')->default(true);
            $table->boolean('local_availability')->default(true);
            $table->boolean('outstation_availability')->default(true);
            $table->string('starting_price')->nullable();
            $table->decimal('price_per_km', 8, 2)->nullable();
            $table->string('local_package_rate')->nullable();
            $table->integer('outstation_min_km')->default(250);
            $table->integer('driver_allowance_per_day')->default(400);
            $table->longText('description')->nullable();
            $table->json('features')->nullable();
            $table->string('ideal_for')->nullable();
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->boolean('is_featured')->default(true);
            $table->integer('sort_order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference')->unique();
            $table->foreignId('vehicle_id')->nullable()->constrained('vehicles')->nullOnDelete();
            $table->string('vehicle_type')->default('Car Rental');
            $table->string('specific_vehicle')->nullable();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email')->nullable();
            $table->string('pickup_location');
            $table->string('drop_location');
            $table->date('travel_date');
            $table->string('pickup_time')->nullable();
            $table->date('return_date')->nullable();
            $table->integer('passenger_count')->default(1);
            $table->string('trip_type')->default('Outstation');
            $table->text('additional_requirements')->nullable();
            $table->enum('status', ['new', 'contacted', 'confirmed', 'completed', 'cancelled'])->default('new');
            $table->text('admin_notes')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_city')->nullable();
            $table->integer('rating')->default(5);
            $table->text('review_text');
            $table->string('vehicle_used')->nullable();
            $table->string('trip_details')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->string('category')->default('General');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('service_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('headline')->nullable();
            $table->text('description')->nullable();
            $table->string('distance_from_jaipur')->nullable();
            $table->json('popular_routes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('seo_pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('page_type')->default('service'); // service, route, city
            $table->string('h1_title');
            $table->string('meta_title');
            $table->text('meta_description');
            $table->string('canonical_url')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('summary')->nullable();
            $table->longText('content_body')->nullable();
            $table->json('features')->nullable();
            $table->json('route_details')->nullable(); // distance, duration, toll_estimate, best_route
            $table->json('faqs')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('contact_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('subject')->nullable();
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->string('group')->default('general');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
        Schema::dropIfExists('contact_inquiries');
        Schema::dropIfExists('seo_pages');
        Schema::dropIfExists('service_areas');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('categories');
    }
};
