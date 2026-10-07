<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'company_name',
            'tagline',
            'phone',
            'whatsapp',
            'secondary_phone',
            'email',
            'address',
            'gst_number',
            'working_hours',
            'experience_years',
            'total_trips',
            'fleet_size',
        ];

        foreach ($keys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
            }
        }

        return back()->with('success', 'Company details and contact settings updated successfully.');
    }
}
