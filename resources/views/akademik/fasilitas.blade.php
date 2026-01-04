@extends('layouts.main')

@section('title', 'Fasilitas Sekolah - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Fasilitas <span class="text-primary italic">Sekolah</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Akademik</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Fasilitas</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Fasilitas Grid Start -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6">INFRASTRUCTURE</div>
                <h2 class="text-4xl lg:text-5xl font-black text-navy uppercase tracking-tighter leading-tight">Mendukung Proses <span class="text-primary italic">Belajar</span> Yang Optimal</h2>
                <p class="mt-8 text-lg leading-relaxed text-text">Kami menyediakan berbagai sarana penunjang kelas dunia untuk memastikan setiap siswa dapat mengeksplorasi potensi akademis maupun non-akademis mereka dengan maksimal.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @forelse($fasilitas as $item)
                <div class="bg-white border border-light group hover:border-primary transition-all duration-500 overflow-hidden shadow-sm hover:shadow-2xl">
                    <div class="relative h-64 overflow-hidden">
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" alt="{{ $item->title }}">
                        @else
                        <img src="{{ asset('images/home/home1.png') }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700" alt="{{ $item->title }}">
                        @endif
                        <div class="absolute inset-0 bg-navy/20 group-hover:bg-navy/0 transition-colors"></div>
                    </div>
                    <div class="p-10 relative">
                        <!-- Floating Icon -->
                        <div class="absolute -top-10 right-10 w-20 h-20 bg-primary flex items-center justify-center text-white text-3xl shadow-xl transition-all group-hover:rotate-[360deg]">
                            <i class="fa fa-star"></i>
                        </div>
                        
                        <h4 class="text-2xl font-black text-navy uppercase mb-4 transition-colors group-hover:text-primary">{{ $item->title }}</h4>
                        <p class="text-sm leading-relaxed text-text mb-6">{{ $item->description }}</p>
                        
                        <div class="w-10 h-1 bg-light group-hover:w-full group-hover:bg-primary transition-all duration-500"></div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center py-20">
                    <p class="text-slate-400 text-lg">Belum ada data fasilitas.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Fasilitas Grid End -->

    <!-- Support Banner Start -->
    <section class="py-20 bg-navy">
        <div class="container mx-auto px-4 lg:px-10 flex flex-col lg:flex-row items-center justify-between gap-10">
            <h3 class="text-white text-2xl lg:text-3xl font-black uppercase tracking-tighter">Semua fasilitas kami terpantau Keamanan <span class="text-primary">24/7 CCTV</span></h3>
            <a href="{{ route('kontak') }}" class="btn-edukate border-2 border-primary text-primary hover:bg-primary hover:text-white px-12">Visit Our Campus</a>
        </div>
    </section>
@endsection
