<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\{Academic, News, Announcement, Staff, Ppdb};

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Split academics by type
        $academics = Academic::all(); // Keep original for total count or compatibility
        $fasilitas = Academic::where('type', 'fasilitas')->get();
        $ekskuls = Academic::where('type', 'ekskul')->get();
        $kurikulum = Academic::where('type', 'kurikulum')->get();
        // $others = Academic::whereNotIn('type', ['fasilitas', 'ekskul', 'kurikulum'])->get();

        $news = News::latest()->get();
        $announcements = Announcement::latest()->get();
        $staff = Staff::all();
        $ppdbs = Ppdb::latest()->get();

        return view('admin.dashboard', compact('academics', 'fasilitas', 'ekskuls', 'kurikulum', 'news', 'announcements', 'staff', 'ppdbs'));
    }
}
