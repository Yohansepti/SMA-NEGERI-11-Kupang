@extends('layouts.main')

@section('title', 'Visi & Misi - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Visi & <span class="text-primary italic">Misi</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Profile</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Visi & Misi</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Visi Start -->
    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full -mr-32 -mt-32"></div>
        <div class="container mx-auto px-4 lg:px-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-8 uppercase">OUR VISION</div>
                <h2 class="text-4xl lg:text-6xl font-black text-navy uppercase tracking-tighter mb-10 leading-tight">
                    "Unggul Dalam <span class="text-primary italic">Karakter</span>, Berwawasan Global, Dan Berbudaya Lingkungan"
                </h2>
                <div class="w-24 h-2 bg-primary mx-auto mb-10"></div>
                <p class="text-xl leading-relaxed text-text italic">
                    Kami percaya bahwa pendidikan bukan sekadar transfer ilmu, melainkan pembentukan jati diri yang kokoh agar setiap anak didik kami mampu bersaing di kancah internasional tanpa kehilangan akar budayanya.
                </p>
            </div>
        </div>
    </section>
    <!-- Visi End -->

    <!-- Misi Start -->
    <section class="py-24 bg-light">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="flex flex-col lg:flex-row gap-20">
                <div class="lg:w-1/3">
                    <div class="sticky top-32">
                        <div class="inline-block bg-primary text-white text-xs font-black px-4 py-1 mb-6">OUR MISSION</div>
                        <h2 class="text-4xl font-black text-navy uppercase tracking-tighter mb-8 leading-tight">Misi Strategis <span class="text-primary italic">Pendidikan</span></h2>
                        <p class="text-lg leading-relaxed mb-8">
                            Rangkaian langkah konkret yang kami ambil untuk mewujudkan visi besar sekolah sebagai pusat pendidikan unggulan di Nusa Tenggara Timur.
                        </p>
                        <img src="/images/home/home1.png" class="w-full grayscale opacity-50 contrast-125" alt="Vision Decoration">
                    </div>
                </div>
                <div class="lg:w-2/3">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @php
                            $missions = [
                                "Menyelenggarakan pembelajaran yang aktif, inovatif, kreatif, dan menyenangkan.",
                                "Menanamkan nilai-nilai keimanan dan ketaqwaan kepada Tuhan Yang Maha Esa.",
                                "Meningkatkan penguasaan teknologi informasi dan komunikasi dalam setiap aspek belajar.",
                                "Mendorong semangat kreativitas dan kemandirian dalam memecahkan masalah.",
                                "Membina kepedulian terhadap kelestarian lingkungan hidup dan sosial.",
                                "Menjalin kerjasama yang sinergis dengan orang tua dan pemangku kepentingan."
                            ];
                        @endphp

                        @foreach($missions as $index => $mission)
                        <div class="bg-white p-10 shadow-lg hover:shadow-2xl transition-all duration-500 border-b-4 border-transparent hover:border-primary group">
                            <div class="text-5xl font-black text-light group-hover:text-primary/20 transition-colors mb-4">0{{ $index + 1 }}</div>
                            <p class="font-bold text-navy leading-relaxed text-lg">{{ $mission }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Misi End -->

    <!-- Motto Support Start -->
    <section class="py-24 bg-navy text-white text-center">
        <div class="container mx-auto px-4 lg:px-10">
            <h3 class="text-3xl font-black uppercase tracking-widest mb-10">Motto Kami: <span class="text-primary italic">DISIPLIN, PRESTASI, RELIGIUS</span></h3>
            <div class="flex flex-wrap justify-center gap-12">
                <div class="flex items-center space-x-4">
                    <i class="fa fa-star text-primary text-2xl"></i>
                    <span class="font-bold uppercase tracking-widest">Integritas</span>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="fa fa-heart text-secondary text-2xl"></i>
                    <span class="font-bold uppercase tracking-widest">Gotong Royong</span>
                </div>
                <div class="flex items-center space-x-4">
                    <i class="fa fa-bolt text-yellow-400 text-2xl"></i>
                    <span class="font-bold uppercase tracking-widest">Inovasi</span>
                </div>
            </div>
        </div>
    </section>
@endsection
