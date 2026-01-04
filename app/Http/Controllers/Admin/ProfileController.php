<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title) . '-' . time();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('profiles', 'public');
        }

        Profile::create($data);

        return redirect()->back()->with('success', 'Profil berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        if ($request->title !== $profile->title) {
            $data['slug'] = Str::slug($request->title) . '-' . time();
        }

        if ($request->hasFile('image')) {
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            }
            $data['image'] = $request->file('image')->store('profiles', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        if ($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }
        $profile->delete();

        return redirect()->back()->with('success', 'Profil berhasil dihapus');
    }
}
