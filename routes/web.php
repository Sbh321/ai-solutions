<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
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

// Admin Routes

Route::get('/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin.services.create');
    Route::post('/admin/services', [ServiceController::class, 'store'])->name('admin.services.store');
    Route::get('/admin/services/{id}/edit', [ServiceController::class, 'edit'])->name('admin.services.edit');
    Route::post('/admin/services/{service}', [ServiceController::class, 'update'])->name('admin.services.update');
    Route::delete('/admin/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/events', [EventController::class, 'index'])->name('admin.events');
    Route::get('/admin/events/create', [EventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [EventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{id}/edit', [EventController::class, 'edit'])->name('admin.events.edit');
    Route::post('/admin/events/{event}', [EventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{id}', [EventController::class, 'destroy'])->name('admin.events.destroy');
});

Route::get('/admin/blogs', function () {
    return Inertia::render('Admin/Blogs/index');
})->middleware(['auth', 'verified'])->name('admin.blogs');

Route::get('/admin/gallery', function () {
    return Inertia::render('Admin/Gallery/index');
})->middleware(['auth', 'verified'])->name('admin.gallery');

Route::get('/admin/settings', function () {
    return Inertia::render('Admin/Settings/index');
})->middleware(['auth', 'verified'])->name('admin.settings');

Route::get('/admin-list', function () {
    return Inertia::render('Admin/Admins/index');
})->middleware(['auth', 'verified'])->name('admin.list');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
