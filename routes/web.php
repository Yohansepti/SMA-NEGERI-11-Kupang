<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

// Profil
Route::get('/profil/sejarah', function () {
    return view('profil.sejarah');
})->name('profil.sejarah');

Route::get('/profil/visi-misi', function () {
    return view('profil.visimisi');
})->name('profil.visimisi');

Route::get('/profil/sambutan', function () {
    return view('profil.sambutan');
})->name('profil.sambutan');

Route::get('/profil/guru-pegawai', function () {
    return view('profil.gurupegawai');
})->name('profil.gurupegawai');

// Akademik
Route::get('/akademik/fasilitas', function () {
    return view('akademik.fasilitas');
})->name('akademik.fasilitas');

Route::get('/akademik/ekskul', function () {
    return view('akademik.ekskul');
})->name('akademik.ekskul');

// Kurikulum
Route::get('/kurikulum', function () {
    return view('kurikulum');
})->name('kurikulum');

// PPDB
Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

// Berita
Route::get('/berita', function () {
    return view('berita');
})->name('berita');

// Kontak
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');