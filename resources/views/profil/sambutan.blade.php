@extends('layouts.main')

@section('title', 'Sambutan Kepala Sekolah - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Sambutan <span class="text-primary italic">Pimpinan</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Profile</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Sambutan</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Sambutan Content Start -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">
                <!-- Image Side -->
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-40 h-40 border-8 border-light z-0"></div>
                    <img src="{{ asset('images/kepala-sekolah.jpg') }}" onerror="this.src='/images/home/home1.png'" class="relative z-10 w-full shadow-2xl grayscale hover:grayscale-0 transition-all duration-1000" alt="Kepala Sekolah">
                    
                    <div class="bg-navy p-10 text-white mt-12 relative z-20 skew-x-[-2deg]">
                        <h4 class="text-xl font-black uppercase mb-1 tracking-tighter">Marselina J. Pandie, S.Pd., MM</h4>
                        <p class="text-primary text-xs font-black uppercase tracking-[0.2em]">Plt. Kepala SMA Negeri 11 Kupang</p>
                    </div>
                </div>

                <!-- Text Side -->
                <div>
                    <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">A MESSAGE FROM OUR PRINCIPAL</div>
                    <h2 class="text-4xl lg:text-5xl font-black text-navy uppercase tracking-tighter mb-8 leading-tight">Membangun Masa Depan Dengan <span class="text-primary italic">Integritas</span> & Cinta</h2>
                    
                    <div class="prose prose-lg max-w-none text-text leading-relaxed space-y-8">
                        <p class="font-bold text-xl italic text-navy/70 border-l-4 border-primary pl-6 py-2">
                            "Pendidikan adalah senjata paling ampuh yang bisa Anda gunakan untuk mengubah dunia. Di SMAN 11 Kupang, kami memastikan setiap anak memiliki senjata itu."
                        </p>
                        
                        <p>Salam sejahtera untuk kita semua, para orang tua, siswa, dan seluruh masyarakat Kota Kupang.</p>
                        
                        <p>Selamat datang di portal informasi resmi SMA Negeri 11 Kupang. Melalui platform ini, kami ingin memperkenalkan dedikasi kami dalam mencetak generasi emas bangsa yang tidak hanya cerdas secara kognitif, tetapi juga memiliki kedalaman spiritual dan karakter yang terpuji.</p>
                        
                        <p>Kami terus berupaya menyediakan lingkungan belajar yang aman, nyaman, dan dinamis, didukung oleh fasilitas modern dan tenaga pendidik yang profesional di bidangnya masing-masing.</p>

                        <p>Mari bergabung bersama kami dalam perjalanan transformatif menuju masa depan yang gemilang.</p>
                    </div>

                    <div class="mt-12">
                         <img src="https://upload.wikimedia.org/wikipedia/commons/3/3b/Signature_of_Zuzana_Caputova.png" class="h-20 grayscale brightness-0 opacity-50" alt="Signature">
                         <p class="text-xs font-black uppercase text-navy mt-4 tracking-widest">Hormat Kami, Kepala Sekolah</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sambutan Content End -->
@endsection