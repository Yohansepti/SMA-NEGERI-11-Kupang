@extends('layouts.main')

@section('title', 'Kurikulum - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Kurikulum <span class="text-primary italic">Pendidikan</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Akademik</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Kurikulum</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Kurikulum Intro Start -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div class="order-2 lg:order-1">
                    <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">ACADEMIC STANDARDS</div>
                    <h2 class="text-4xl lg:text-5xl font-black text-navy uppercase tracking-tighter leading-tight mb-8">Pembelajaran Berbasis <span class="text-primary italic">Kompetensi</span> & Karakter</h2>
                    <p class="text-lg leading-relaxed mb-8">
                        SMA Negeri 11 Kupang menerapkan kurikulum terbaru (Kurikulum Merdeka) yang dirancang untuk memberikan kebebasan bagi siswa dalam mengeksplorasi minat dan bakat mereka, sambil tetap menjaga standar kompetensi nasional yang tinggi.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 bg-light border-l-4 border-primary">
                            <i class="fa fa-check-circle text-primary"></i>
                            <span class="font-bold text-navy uppercase">Integrasi Teknologi Digital</span>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-light border-l-4 border-secondary">
                            <i class="fa fa-check-circle text-secondary"></i>
                            <span class="font-bold text-navy uppercase">Berbasis Proyek (P5)</span>
                        </div>
                        <div class="flex items-center space-x-4 p-4 bg-light border-l-4 border-primary">
                            <i class="fa fa-check-circle text-primary"></i>
                            <span class="font-bold text-navy uppercase">Pengembangan Karakter Pancasila</span>
                        </div>
                    </div>
                </div>
                <div class="order-1 lg:order-2">
                    <div class="relative">
                        <img src="/images/home/home3.png" class="w-full grayscale brightness-75 shadow-2xl skew-y-3" alt="Curriculum">
                        <div class="absolute -bottom-10 -left-10 bg-primary p-12 text-white hidden md:block skew-x-[-10deg]">
                            <div class="text-3xl font-black">2024/2025</div>
                            <p class="text-xs uppercase font-bold tracking-widest mt-2">Newest Standard</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kurikulum Intro End -->

    <!-- Document Section Start -->
    <section class="py-24 bg-light">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                 <h2 class="text-4xl font-black text-navy uppercase tracking-tighter">Download <span class="text-primary italic">Dokumen</span> Kurikulum</h2>
                 <p class="mt-6 text-text font-semibold uppercase tracking-widest text-xs">Akses materi dan silabus pendidikan kami</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                    $docs = [
                        ['type' => 'PDF', 'name' => 'Kalender Akademik 2024/2025', 'color' => 'red'],
                        ['type' => 'PDF', 'name' => 'Struktur Kurikulum Merdeka', 'color' => 'blue'],
                        ['type' => 'PDF', 'name' => 'Silabus Pembelajaran Ganjil', 'color' => 'green'],
                    ];
                @endphp

                @foreach($docs as $doc)
                <div class="bg-white p-12 shadow-xl hover:shadow-2xl transition-all group overflow-hidden relative">
                    <div class="absolute top-0 right-0 w-16 h-16 bg-light flex items-center justify-center text-navy font-black text-xs uppercase -rotate-45 translate-x-6 -translate-y-6">NEW</div>
                    <i class="fa fa-file-pdf text-5xl text-{{ $doc['color'] }}-500 mb-8 block group-hover:scale-125 transition-transform duration-500"></i>
                    <h5 class="text-xl font-black text-navy uppercase mb-8 leading-tight">{{ $doc['name'] }}</h5>
                    <a href="#" class="btn-edukate bg-navy text-white hover:bg-primary w-full text-center">Download Sekarang</a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Document Section End -->
@endsection
