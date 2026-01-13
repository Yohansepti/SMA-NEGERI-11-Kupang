<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'home'])->name('home');

// Profil routes
Route::prefix('profil')->name('profil.')->group(function () {
    Route::view('sejarah', 'profil.sejarah')->name('sejarah');
    Route::view('visi-misi', 'profil.visimisi')->name('visimisi');
    Route::view('sambutan', 'profil.sambutan')->name('sambutan');
    Route::get('guru-pegawai', [App\Http\Controllers\PublicController::class, 'guruPegawai'])->name('gurupegawai');
});

// Akademik routes
Route::prefix('akademik')->name('akademik.')->group(function () {
    Route::get('fasilitas', [App\Http\Controllers\PublicController::class, 'fasilitas'])->name('fasilitas');
    Route::get('ekskul', [App\Http\Controllers\PublicController::class, 'ekskul'])->name('ekskul');
});

// Lainnya
Route::get('kurikulum', [PublicController::class, 'kurikulum'])->name('kurikulum');
Route::get('berita', [App\Http\Controllers\PublicController::class, 'berita'])->name('berita');
Route::get('pengumuman', [App\Http\Controllers\PublicController::class, 'pengumuman'])->name('pengumuman');
Route::get('ppdb', [PublicController::class, 'ppdb'])->name('ppdb');
Route::view('kontak', 'kontak')->name('kontak');

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout');
    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', [App\Http\Controllers\AdminDashboardController::class, 'index'])->name('dashboard');
        
        // Change Password
        Route::post('password/change', [App\Http\Controllers\Admin\PasswordController::class, 'change'])->name('password.change');
        
        // Profile Management
        Route::post('profiles', [App\Http\Controllers\Admin\ProfileController::class, 'store'])->name('profiles.store');
        Route::put('profiles/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profiles.update');
        Route::delete('profiles/{id}', [App\Http\Controllers\Admin\ProfileController::class, 'destroy'])->name('profiles.destroy');
        
        // Academic Management
        Route::post('academics', [App\Http\Controllers\Admin\AcademicController::class, 'store'])->name('academics.store');
        Route::put('academics/{id}', [App\Http\Controllers\Admin\AcademicController::class, 'update'])->name('academics.update');
        Route::delete('academics/{id}', [App\Http\Controllers\Admin\AcademicController::class, 'destroy'])->name('academics.destroy');
        
        // News Management
        Route::post('news', [App\Http\Controllers\Admin\NewsController::class, 'store'])->name('news.store');
        Route::put('news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'update'])->name('news.update');
        Route::delete('news/{id}', [App\Http\Controllers\Admin\NewsController::class, 'destroy'])->name('news.destroy');
        
        // Announcement Management
        Route::post('announcements', [App\Http\Controllers\Admin\AnnouncementController::class, 'store'])->name('announcements.store');
        Route::put('announcements/{id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'update'])->name('announcements.update');
        Route::delete('announcements/{id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'destroy'])->name('announcements.destroy');
        
        // Staff Management
        Route::post('staff', [App\Http\Controllers\Admin\StaffController::class, 'store'])->name('staff.store');
        Route::put('staff/{id}', [App\Http\Controllers\Admin\StaffController::class, 'update'])->name('staff.update');
        Route::delete('staff/{id}', [App\Http\Controllers\Admin\StaffController::class, 'destroy'])->name('staff.destroy');

        // PPDB Management
        Route::post('ppdb', [App\Http\Controllers\Admin\PpdbController::class, 'store'])->name('ppdb.store');
        Route::put('ppdb/{id}', [App\Http\Controllers\Admin\PpdbController::class, 'update'])->name('ppdb.update');
        Route::delete('ppdb/{id}', [App\Http\Controllers\Admin\PpdbController::class, 'destroy'])->name('ppdb.destroy');
    });
});



