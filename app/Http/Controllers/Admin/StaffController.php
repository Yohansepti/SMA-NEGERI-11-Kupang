<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staff;
use Illuminate\Support\Facades\Storage;

class StaffController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nuptk' => 'nullable',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'nip' => 'nullable',
            'ptk_type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        // Since role is required in DB but we are using ptk_type now, fill role with ptk_type
        $data['role'] = $request->ptk_type;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        Staff::create($data);

        return redirect()->back()->with('success', 'Data Guru/Pegawai berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);
        
        $request->validate([
            'name' => 'required',
            'nuptk' => 'nullable',
            'gender' => 'required',
            'birth_place' => 'required',
            'birth_date' => 'required|date',
            'nip' => 'nullable',
            'ptk_type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();
        $data['role'] = $request->ptk_type;

        if ($request->hasFile('image')) {
            if ($staff->image) {
                Storage::disk('public')->delete($staff->image);
            }
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        $staff->update($data);

        return redirect()->back()->with('success', 'Data Guru/Pegawai berhasil diperbarui');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        if ($staff->image) {
            Storage::disk('public')->delete($staff->image);
        }
        $staff->delete();

        return redirect()->back()->with('success', 'Data Guru/Pegawai berhasil dihapus');
    }
}
