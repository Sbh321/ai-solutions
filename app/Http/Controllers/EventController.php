<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();

        return Inertia::render('Admin/Events/index', [
            'events' => $events,
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Events/create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($validated);

        return response()->json([
            'status' => 200,
            'message' => 'Event created successfully.',
        ]);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);

        return Inertia::render('Admin/Events/show', [
            'event' => $event,
        ]);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);

        return Inertia::render('Admin/Events/edit', [
            'event' => $event,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }

            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($validated);

        return response()->json([
            'status' => 200,
            'message' => 'Event updated successfully.',
        ]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('admin.events')->with('success', 'Event deleted successfully!');
    }
}
