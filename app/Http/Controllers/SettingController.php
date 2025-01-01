<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::first();

        return response()->json([
            'setting' => $setting,
        ], 200);
    }

    public function update(Request $request)
    {
        $request->validate([
            'website_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|email',
        ]);

        $setting = Setting::first();

        $setting->location = $request->input('location');
        $setting->phone_number = $request->input('phone_number');
        $setting->email = $request->input('email');

        if ($request->hasFile('website_logo')) {
            $imagePath = $request->file('website_logo')->store('logos', 'public');
            $setting->website_logo = $imagePath;
        }

        $setting->save();

        return response()->json([
            'message' => 'Settings updated successfully.',
        ], 200);
    }
}
