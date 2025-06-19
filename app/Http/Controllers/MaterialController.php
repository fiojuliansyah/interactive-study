<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::paginate(10);
        return view('materials.index', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'video' => 'nullable|file|mimes:mp4,avi,mov',
            'sound' => 'nullable|file|mimes:mp3,wav',
            'content' => 'nullable|string',
            'type' => 'nullable|in:visual,auditory,kinesthetic',
            'admin_id' => 'nullable|string',
        ]);

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        $soundPath = null;
        if ($request->hasFile('sound')) {
            $soundPath = $request->file('sound')->store('sounds', 'public');
        }

        Material::create([
            'title' => $request->input('title'),
            'video' => $videoPath,
            'sound' => $soundPath,
            'content' => $request->input('content'),
            'type' => $request->input('type', 'visual'),
            'admin_id' => Auth::id() ?? $request->input('admin_id'),
        ]);

        return redirect()->route('materials.index')->with('success', 'Material created successfully.');
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'video' => 'nullable|file|mimes:mp4,avi,mov',
            'sound' => 'nullable|file|mimes:mp3,wav',
            'content' => 'nullable|string',
            'type' => 'nullable|in:visual,auditory,kinesthetic',
            'admin_id' => 'nullable|string',
        ]);

        $videoPath = $material->video;
        if ($request->hasFile('video')) {
            if ($videoPath) {
                Storage::disk('public')->delete($videoPath);
            }
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        $soundPath = $material->sound;
        if ($request->hasFile('sound')) {
            if ($soundPath) {
                Storage::disk('public')->delete($soundPath);
            }
            $soundPath = $request->file('sound')->store('sounds', 'public');
        }

        $material->update([
            'title' => $request->input('title'),
            'video' => $videoPath, 
            'sound' => $soundPath, 
            'content' => $request->input('content'),
            'type' => $request->input('type', 'visual'),
            'admin_id' => $request->input('admin_id'),
        ]);

        return redirect()->route('materials.index')->with('success', 'Material updated successfully.');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material deleted successfully.');
    }
}
