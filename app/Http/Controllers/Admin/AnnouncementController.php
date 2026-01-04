<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'priority' => 'required',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        Announcement::create($data);

        return redirect()->back()->with('success', 'Pengumuman berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $announcement = Announcement::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'priority' => 'required',
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        $announcement->update($data);

        return redirect()->back()->with('success', 'Pengumuman berhasil diperbarui');
    }

    public function destroy($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->back()->with('success', 'Pengumuman berhasil dihapus');
    }
}
