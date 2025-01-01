<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\AdminDeviceLogin;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Event;
use App\Models\Feedback;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    $services = Service::latest()->take(3)->get();
    $events = Event::latest()->take(3)->get();
    $feedbacks = Feedback::latest()->take(5)->get();

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'services' => $services,
        'events' => $events,
        'testimonials' => $feedbacks,
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
    $services = Service::all();
    $feedbacks = Feedback::latest()->take(5)->get();

    return Inertia::render('Services/index', [
        'services' => $services,
        'testimonials' => $feedbacks,
    ]);
})->name('about')->name('services');

Route::get('/services/{id}', function ($id) {
    $service = Service::findOrFail($id);

    return Inertia::render('Services/ServiceDetails', [
        'service' => $service,
    ]);
})->name('services.details');

Route::get('/events', function () {
    $events = Event::all();

    return Inertia::render('Events/index', [
        'events' => $events,
    ]);
})->name('about')->name('events'
);

Route::get('/blogs', function () {
    $blogs = Blog::all();

    return Inertia::render('Blogs/index',
        [
            'blogs' => $blogs,
        ]);
})->name('about')->name('blogs');

Route::get('/blogs/{id}', function ($id) {
    $blog = Blog::findOrFail($id);

    return Inertia::render('Blogs/BlogDetails', [
        'blog' => $blog,
    ]);
})->name('blogs.details');

Route::get('/contact', function () {
    return Inertia::render('Contact/index');
})->name('about')->name('contact');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'required|email|max:255',
        'company' => 'nullable|string|max:255',
        'country' => 'nullable|string|max:255',
        'subject' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    Contact::create([
        'name' => $validated['name'],
        'phone' => $validated['phone'],
        'email' => $validated['email'],
        'company' => $validated['company'],
        'country' => $validated['country'],
        'subject' => $validated['subject'],
        'description' => $validated['description'],
    ]);

    return response()->json([
        'message' => 'Contact form submitted successfully.',
    ], 201);
})->name('contact.store');

Route::post('/feedback', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string',
        'feedback' => 'required|string',
        'rating' => 'required|integer',
    ]);

    Feedback::create([
        'rating' => $validated['rating'],
        'feedback' => $validated['feedback'],
        'name' => $validated['name'],
    ]);

    return response()->json([
        'message' => 'Feedback submitted successfully.',
    ], 201);
})->name('feedback.store');

// Admin Routes
Route::get('/dashboard', function () {
    return Inertia::render('Admin/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/inbox', function () {
    $contacts = Contact::latest()->get();
    $feedbacks = Feedback::latest()->get();

    return Inertia::render('Admin/Inbox/index',
        [
            'contacts' => $contacts,
            'feedbacks' => $feedbacks,
        ]);
})->middleware(['auth', 'verified'])->name('admin.inbox');

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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/blogs', [BlogController::class, 'index'])->name('admin.blogs');
    Route::get('/admin/blogs/create', [BlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/admin/blogs', [BlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/admin/blogs/{id}/edit', [BlogController::class, 'edit'])->name('admin.blogs.edit');
    Route::post('/admin/blogs/{blog}', [BlogController::class, 'update'])->name('admin.blogs.update');
    Route::delete('/admin/blogs/{id}', [BlogController::class, 'destroy'])->name('admin.blogs.destroy');
});

Route::get('/admin/gallery', function () {
    return Inertia::render('Admin/Gallery/index');
})->middleware(['auth', 'verified'])->name('admin.gallery');

Route::get('/admin/settings', function () {
    return Inertia::render('Admin/Settings/index');
})->middleware(['auth', 'verified'])->name('admin.settings');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin-list', [AdminController::class, 'index'])->name('admin.list');
    Route::delete('/admin-delete/{id}', [AdminController::class, 'destroy'])->name('admin.user.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
