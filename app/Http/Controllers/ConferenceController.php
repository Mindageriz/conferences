<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $conferences = Conference::query()->orderBy('date', 'asc')->get();
        return view('conferences.index', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('conferences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'participantCount' => ['required', 'integer', 'min:0'],
        ]);
        $conference = Conference::factory()->create($validated);
        return redirect()->route('conferences.show', $conference)->with('success', 'Conference created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference): View
    {
        return view('conferences.show', compact('conference'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $conference): View
    {
        return view('conferences.edit', compact('conference'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conference $conference): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'country' => ['required', 'string'],
            'participantCount' => ['required', 'integer', 'min:0'],
        ]);
        $conference->update($validated);
        return redirect()->route('conferences.show', $conference)->with('success', 'Conference updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference): RedirectResponse
    {
        $conference->delete();
        return redirect()->route('conferences.index')->with('success', 'Conference deleted');
    }
}
