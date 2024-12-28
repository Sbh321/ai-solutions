<?php

use App\Http\Controllers\ProfileController;
use App\Models\AdminDeviceLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
    ]);
})->name('welcome');

Route::post('/checkAdmin', function (Request $request
) {
    $request->validate([
        'device_fingerprint' => 'required|string',
    ]);

    $device_fingerprint = $request->device_fingerprint;

    $existingDevice = AdminDeviceLogin::where('devices', $device_fingerprint)->first();

    if ($existingDevice) {
        return response()->json([
            'status' => 200,
            'message' => 'Device is saved for admin.',
        ]);
    }

    return response()->json([
        'status' => 404,
        'message' => 'Device not found.',
    ]);

})->name('checkAdmin');

Route::get('/about', function () {
    return Inertia::render('About/index');
})->name('about')->name('about');

Route::get('/services', function () {
    return Inertia::render('Services/index');
})->name('about')->name('services');

Route::get('/services/{id}', function ($id) {
    return Inertia::render('Services/ServiceDetails', [
        'id' => $id,
    ]);
})->name('services.details');

Route::get('/events', function () {
    return Inertia::render('Events/index');
})->name('about')->name('events');

Route::get('/blogs', function () {
    return Inertia::render('Blogs/index');
})->name('about')->name('blogs');

Route::get('/blogs/{id}', function ($id) {
    return Inertia::render('Blogs/BlogDetails', [
        'id' => $id,
    ]);
})->name('blogs.details');

Route::get('/contact', function () {
    return Inertia::render('Contact/index');
})->name('about')->name('contact');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
