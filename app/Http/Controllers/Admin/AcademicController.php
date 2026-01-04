<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Academic;
use Illuminate\Support\Facades\Storage;

class AcademicController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        if (in_array($request->type, ['fasilitas', 'ekskul'])) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif|max:2048';
        }

        $request->validate($rules);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academics', 'public');
        }

        Academic::create($data);

        return redirect()->back()->with('success', 'Data Akademik berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $academic = Academic::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($academic->image) {
                Storage::disk('public')->delete($academic->image);
            }
            $data['image'] = $request->file('image')->store('academics', 'public');
        }

        $academic->update($data);

        return redirect()->back()->with('success', 'Data Akademik berhasil diperbarui');
    }

    public function destroy($id)
    {
        $academic = Academic::findOrFail($id);
        if ($academic->image) {
            Storage::disk('public')->delete($academic->image);
        }
        $academic->delete();

        return redirect()->back()->with('success', 'Data Akademik berhasil dihapus');
    }
}
