@extends('layouts.main')

@section('title', 'Guru & Pegawai - SMAN 11 KUPANG')

@section('content')
    <div x-data="{ showStaffModal: false, selectedStaff: {} }">
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Guru & <span class="text-primary italic">Pegawai</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Profile</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Guru & Pegawai</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Team Section Start -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center mb-20">
                <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">FACULTY MEMBERS</div>
                <h2 class="text-4xl lg:text-5xl font-black text-navy uppercase tracking-tighter leading-tight">Berkenalan Dengan <span class="text-primary italic">Pendidik</span> Kami</h2>
            </div>

            @if($staff->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                @foreach($staff as $person)
                <div class="group">
                    <div class="relative overflow-hidden mb-8 shadow-xl cursor-pointer" @click="selectedStaff = {{ $person }}; showStaffModal = true">
                        @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" class="w-full h-80 object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100" alt="{{ $person->name }}">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($person->name) }}&background=f2f2f2&color=120f2d&size=500" class="w-full h-80 object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100" alt="{{ $person->name }}">
                        @endif
                        <div class="absolute inset-0 bg-navy/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="bg-primary text-white text-[10px] font-black uppercase tracking-widest px-6 py-2">Lihat Biodata</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="text-xl font-black text-navy uppercase mb-2">{{ $person->name }}</h5>
                        <p class="text-xs font-black text-primary uppercase tracking-[0.2em]">{{ $person->role }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-32">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-light rounded-full mb-8">
                    <i class="fas fa-users text-6xl text-slate-300"></i>
                </div>
                <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-4">Data Belum Tersedia</h3>
                <p class="text-slate-500 text-lg max-w-md mx-auto">Data guru dan pegawai belum ditambahkan oleh administrator. Silakan hubungi admin untuk informasi lebih lanjut.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Biodata Modal -->
    <div x-show="showStaffModal" x-transition.opacity class="fixed inset-0 z-[999] bg-navy/90 backdrop-blur-md flex items-center justify-center p-4" x-cloak>
        <div class="bg-white w-full max-w-4xl max-h-[90vh] overflow-y-auto relative shadow-2xl" @click.away="showStaffModal = false">
            <button @click="showStaffModal = false" class="absolute top-6 right-6 text-navy hover:text-primary transition-colors z-20">
                <i class="fa fa-times text-2xl"></i>
            </button>
            
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="bg-light p-0 lg:h-full">
                    <img :src="selectedStaff.image ? '/storage/' + selectedStaff.image : 'https://ui-avatars.com/api/?name=' + selectedStaff.name + '&background=f2f2f2&color=120f2d&size=800'" 
                         class="w-full h-full object-cover grayscale-0" :alt="selectedStaff.name">
                </div>
                <div class="p-10 lg:p-16">
                    <div class="mb-10">
                        <span class="text-primary text-[10px] font-black uppercase tracking-[0.3em] mb-2 block">Faculty Profile</span>
                        <h3 class="text-3xl lg:text-4xl font-black text-navy uppercase tracking-tighter leading-none" x-text="selectedStaff.name"></h3>
                        <p class="text-secondary font-bold uppercase tracking-widest text-xs mt-4" x-text="selectedStaff.role"></p>
                    </div>

                    <div class="space-y-6">
                        <div class="flex items-start justify-between border-b border-light pb-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">NIP</span>
                            <span class="font-bold text-navy" x-text="selectedStaff.nip || '-'"></span>
                        </div>
                        <div class="flex items-start justify-between border-b border-light pb-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">NUPTK</span>
                            <span class="font-bold text-navy" x-text="selectedStaff.nuptk || '-'"></span>
                        </div>
                        <div class="flex items-start justify-between border-b border-light pb-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Jenis Kelamin</span>
                            <span class="font-bold text-navy" x-text="selectedStaff.gender === 'L' ? 'Laki-laki' : 'Perempuan'"></span>
                        </div>
                        <div class="flex items-start justify-between border-b border-light pb-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">TTL</span>
                            <span class="font-bold text-navy" x-text="(selectedStaff.birth_place || '') + ', ' + (selectedStaff.birth_date || '')"></span>
                        </div>
                        <div class="flex items-start justify-between border-b border-light pb-4">
                            <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Jenis PTK</span>
                            <span class="font-bold text-navy" x-text="selectedStaff.ptk_type || '-'"></span>
                        </div>
                    </div>

                    <div class="mt-12">
                        <p class="text-sm text-slate-500 italic leading-relaxed">Berkomitmen untuk membimbing generasi muda SMAN 11 Kupang menjadi pemimpin masa depan yang berintegritas dan berwawasan luas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection