@extends('layouts.main')

@section('title', 'Ekstrakurikuler - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Ekstrakurikuler <span class="text-primary italic">Siswa</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Akademik</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Ekskul</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Ekskul Intro Start -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-center">
                <div>
                    <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">TALENT & HOBBY</div>
                    <h2 class="text-4xl lg:text-5xl font-black text-navy leading-tight uppercase tracking-tighter mb-8">Eksplorasi <span class="text-primary italic">Bakat</span> Di Luar Ruang Kelas</h2>
                    <p class="text-lg leading-relaxed mb-8">
                        Kami percaya bahwa setiap individu memiliki potensi unik. Melalui program ekstrakurikuler, SMAN 11 Kupang menyediakan wadah bagi siswa untuk mengasah keterampilan kepemimpinan, kerja tim, dan kreativitas.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <div class="flex items-center space-x-4 bg-light p-6">
                            <i class="fa fa-users text-primary text-3xl"></i>
                            <div>
                                <h6 class="font-bold text-navy uppercase leading-none">15+ Klub</h6>
                                <p class="text-xs font-bold uppercase mt-1">Cabang Berbeda</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4 bg-light p-6">
                            <i class="fa fa-trophy text-secondary text-3xl"></i>
                            <div>
                                <h6 class="font-bold text-navy uppercase leading-none">50+ Medali</h6>
                                <p class="text-xs font-bold uppercase mt-1">Prestasi Ekskul</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative group">
                    <img src="/images/home/home2.png" class="w-full grayscale brightness-75 group-hover:grayscale-0 transition-all duration-700" alt="Student Activity">
                    <div class="absolute inset-4 border-2 border-primary translate-x-4 translate-y-4 -z-10 group-hover:translate-x-0 group-hover:translate-y-0 transition-transform"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Ekskul Intro End -->

    <!-- Ekskul Grid Start -->
    <section class="py-24 bg-light">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($ekskul as $item)
                <div class="bg-white p-12 text-center shadow-lg hover:shadow-2xl transition-all duration-500 group relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-2 h-0 bg-primary group-hover:h-full transition-all duration-500"></div>
                    <div class="w-24 h-24 bg-light mx-auto flex items-center justify-center rounded-0 text-navy text-4xl mb-8 group-hover:bg-primary group-hover:text-white transition-all transform group-hover:rotate-[360deg] overflow-hidden">
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0" alt="{{ $item->title }}">
                        @else
                        <i class="fa fa-star"></i>
                        @endif
                    </div>
                    <span class="text-xs font-black text-secondary uppercase tracking-[0.2em] mb-4 block">Ekstrakurikuler</span>
                    <h4 class="text-2xl font-black text-navy uppercase mb-6">{{ $item->title }}</h4>
                    <p class="text-sm leading-relaxed text-text mb-8">{{ $item->description }}</p>
                    <a href="#" class="btn-edukate border border-navy text-navy hover:bg-navy hover:text-white py-2 px-6">Join Club</a>
                </div>
                @empty
                <div class="col-span-3 text-center py-20">
                    <p class="text-slate-400 text-lg">Belum ada data ekstrakurikuler.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Ekskul Grid End -->

    <!-- Call to Action Start -->
    <section class="py-24 bg-white text-center">
        <div class="container mx-auto px-4 lg:px-10">
            <h2 class="text-4xl font-black text-navy uppercase tracking-tighter mb-8 leading-tight">Punya Ide <span class="text-primary italic">Klub Baru</span>?</h2>
            <p class="text-lg leading-relaxed mb-12 max-w-2xl mx-auto text-text">Kami sangat terbuka dengan inisiatif siswa untuk membangun komunitas baru yang positif. Silahkan hubungi Pembina OSIS kami!</p>
            <a href="{{ route('kontak') }}" class="btn-edukate bg-primary text-white hover:bg-navy shadow-xl shadow-primary/20 scale-110">Hubungi Pembina</a>
        </div>
    </section>
@endsection