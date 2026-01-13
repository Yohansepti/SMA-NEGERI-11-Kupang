<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{News, Announcement, Staff, Academic, Ppdb};

class PublicController extends Controller
{
    public function home()
    {
        $staff = Staff::limit(4)->get();
        $academics = Academic::limit(3)->get();
        $news = News::where('is_published', true)->latest()->limit(3)->get();
        $announcements = Announcement::where('is_active', true)->latest()->limit(3)->get();
        
        return view('home', compact('staff', 'academics', 'news', 'announcements'));
    }

    public function berita()
    {
        $news = News::where('is_published', true)->latest()->paginate(9);
        return view('berita', compact('news'));
    }

    public function pengumuman()
    {
        $announcements = Announcement::where('is_active', true)->latest()->get();
        return view('pengumuman', compact('announcements'));
    }

    public function guruPegawai()
    {
        $staff = Staff::all();
        return view('profil.gurupegawai', compact('staff'));
    }

    public function fasilitas()
    {
        $fasilitas = Academic::where('type', 'fasilitas')->get();
        return view('akademik.fasilitas', compact('fasilitas'));
    }

    public function kurikulum()
    {
        $kurikulum = Academic::where('type', 'kurikulum')->get();
        return view('kurikulum', compact('kurikulum'));
    }

    public function ekskul()
    {
        $ekskul = Academic::where('type', 'ekskul')->get();
        return view('akademik.ekskul', compact('ekskul'));
    }

    public function ppdb()
    {
        $ppdb = Ppdb::where('is_active', true)->first();
        return view('ppdb', compact('ppdb'));
    }
}
