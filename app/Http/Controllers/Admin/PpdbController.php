<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'academic_year' => 'required|string',
            'requirements' => 'required|string',
            'schedule' => 'required|array',
            'schedule.*.kegiatan' => 'required|string',
            'schedule.*.waktu' => 'required|string',
            'schedule.*.keterangan' => 'required|string',
            'brochure' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
            'guide' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        $data = $request->except(['brochure', 'guide']);

        if ($request->hasFile('brochure')) {
            $data['brochure'] = $request->file('brochure')->store('ppdb', 'public');
        }

        if ($request->hasFile('guide')) {
            $data['guide'] = $request->file('guide')->store('ppdb', 'public');
        }

        // Deactivate others if this one is active
        if ($request->has('is_active')) {
            Ppdb::where('id', '>', 0)->update(['is_active' => false]);
            $data['is_active'] = true;
        }

        Ppdb::create($data);

        return redirect()->back()->with('success', 'Data PPDB berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        $request->validate([
            'academic_year' => 'required|string',
            'requirements' => 'required|string',
            'schedule' => 'required|array',
            'schedule.*.kegiatan' => 'required|string',
            'schedule.*.waktu' => 'required|string',
            'schedule.*.keterangan' => 'required|string',
            'brochure' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
            'guide' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:5120',
        ]);

        $data = $request->except(['brochure', 'guide']);

        if ($request->hasFile('brochure')) {
            if ($ppdb->brochure) {
                Storage::disk('public')->delete($ppdb->brochure);
            }
            $data['brochure'] = $request->file('brochure')->store('ppdb', 'public');
        }

        if ($request->hasFile('guide')) {
            if ($ppdb->guide) {
                Storage::disk('public')->delete($ppdb->guide);
            }
            $data['guide'] = $request->file('guide')->store('ppdb', 'public');
        }

        if ($request->has('is_active')) {
            Ppdb::where('id', '!=', $id)->update(['is_active' => false]);
            $data['is_active'] = true;
        } else {
            $data['is_active'] = false;
        }

        $ppdb->update($data);

        return redirect()->back()->with('success', 'Data PPDB berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        
        if ($ppdb->brochure) {
            Storage::disk('public')->delete($ppdb->brochure);
        }
        
        if ($ppdb->guide) {
            Storage::disk('public')->delete($ppdb->guide);
        }

        $ppdb->delete();

        return redirect()->back()->with('success', 'Data PPDB berhasil dihapus.');
    }
}
