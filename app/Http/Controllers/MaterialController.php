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
            'thumbnail' => 'nullable',
            'title' => 'nullable|string|max:255',
            'video' => 'nullable',
            'sound' => 'nullable',
            'content' => 'nullable|string',
            'type' => 'nullable|in:visual,auditory,kinesthetic',
            'admin_id' => 'nullable|string',
        ]);

        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            if ($thumbnailPath) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $videoPath = null;
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('videos', 'public');
        }

        $soundPath = null;
        if ($request->hasFile('sound')) {
            $soundPath = $request->file('sound')->store('sounds', 'public');
        }

        Material::create([
            'thumbnail' => $thumbnailPath,
            'title' => $request->input('title'),
            'video' => $videoPath,
            'sound' => $soundPath,
            'content' => $request->input('content'),
            'type' => $request->input('type'),
            'admin_id' => Auth::id() ?? $request->input('admin_id'),
        ]);

        return redirect()->route('materials.index')->with('success', 'Material created successfully.');
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'thumbnail' => 'nullable',
            'title' => 'nullable|string|max:255',
            'video' => 'nullable',
            'sound' => 'nullable',
            'content' => 'nullable|string',
            'type' => 'nullable|in:visual,auditory,kinesthetic',
            'admin_id' => 'nullable|string',
        ]);

        $thumbnailPath = $material->thumbnail;
        if ($request->hasFile('thumbnail')) {
            if ($thumbnailPath) {
                Storage::disk('public')->delete($thumbnailPath);
            }
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

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

        $adminId = Auth::user()->id;

        $material->update([
            'thumbnail' => $thumbnailPath,
            'title' => $request->input('title'),
            'video' => $videoPath, 
            'sound' => $soundPath, 
            'content' => $request->input('content'),
            'type' => $request->input('type', 'visual'),
            'admin_id' => $adminId,
        ]);

        return redirect()->route('materials.index')->with('success', 'Material updated successfully.');
    }

    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Material deleted successfully.');
    }
}
