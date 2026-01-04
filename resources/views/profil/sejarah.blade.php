@extends('layouts.main')

@section('title', 'Sejarah - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Sejarah <span class="text-primary italic">Sekolah</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Profile</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Sejarah</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Sejarah Content Start -->
    <section class="py-12 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">
                <div>
                    <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6">OUR STORY</div>
                    <h2 class="text-4xl font-black text-navy leading-tight mb-8 uppercase tracking-tighter">Perjalanan Panjang Membangun <span class="text-primary italic">Inspirasi</span></h2>
                    
                    <div class="space-y-8 text-lg leading-relaxed text-text">
                        <div class="p-8 border-l-4 border-primary bg-light">
                            <h5 class="text-xl font-bold text-navy mb-3 italic">"Awal Berdirinya"</h5>
                            <p>SMA Negeri 11 Kupang resmi didirikan pada tanggal 1 Desember 2011 sebagai jawaban atas kebutuhan mendesak akan institusi pendidikan berkualitas di wilayah Alak.</p>
                        </div>
                        
                        <p>Berawal dari semangat para tokoh masyarakat dan pemerintah daerah untuk memperluas akses pendidikan, sekolah ini mulai beroperasi dengan fasilitas yang sangat terbatas namun dengan dedikasi tenaga pendidik yang luar biasa.</p>
                        
                        <p>Seiring berjalannya waktu, sekolah ini terus mengalami perkembangan pesat, baik dari segi infrastruktur maupun prestasi siswa, menjadikannya salah satu sekolah yang diperhitungkan di Kota Kupang.</p>
                    </div>

                    <div class="mt-12 grid grid-cols-2 gap-8">
                        <div>
                            <div class="text-4xl font-black text-primary mb-2">2011</div>
                            <div class="text-xs font-black text-navy uppercase tracking-widest">Tahun Berdiri</div>
                        </div>
                        <div>
                            <div class="text-4xl font-black text-primary mb-2">A</div>
                            <div class="text-xs font-black text-navy uppercase tracking-widest">Akreditasi</div>
                        </div>
                    </div>
                </div>

                <!-- Timeline / Right Side -->
                <div class="space-y-12 relative before:absolute before:inset-y-0 before:left-[-2rem] before:w-1 before:bg-light hidden lg:block">
                    <div class="relative group">
                        <div class="absolute -left-[2.35rem] top-0 w-3 h-3 bg-primary rounded-full ring-8 ring-white"></div>
                        <h4 class="text-xl font-black text-navy uppercase mb-4">Dasar Hukum Dasar</h4>
                        <p class="text-sm leading-relaxed">Operasional sekolah ini didasarkan pada Keputusan Walikota Kupang Nomor: 177/KEP/HK/2011, yang menjadi tonggak sejarah dimulainya pengabdian kami.</p>
                    </div>

                    <div class="relative group">
                        <div class="absolute -left-[2.35rem] top-0 w-3 h-3 bg-secondary rounded-full ring-8 ring-white transition-all group-hover:scale-150"></div>
                        <h4 class="text-xl font-black text-navy uppercase mb-4">Evolusi Fasilitas</h4>
                        <p class="text-sm leading-relaxed">Dari gedung pinjaman hingga memiliki kampus mandiri dengan laboratorium sains terkini, perpustakaan digital, dan lapangan olahraga standar nasional.</p>
                    </div>

                    <div class="relative group">
                        <div class="absolute -left-[2.35rem] top-0 w-3 h-3 bg-primary rounded-full ring-8 ring-white transition-all group-hover:scale-150"></div>
                        <h4 class="text-xl font-black text-navy uppercase mb-4">Pencapaian Prestasi</h4>
                        <p class="text-sm leading-relaxed">SMAN 11 Kupang telah melahirkan ribuan lulusan yang kini berkontribusi di berbagai bidang, mulai dari akademisi, profesional, hingga wirausahawan sukses.</p>
                    </div>

                    <div class="bg-navy p-10 text-white shadow-2xl skew-x-[-2deg]">
                        <h3 class="text-2xl font-black mb-4 uppercase tracking-tighter">Vision Forward</h3>
                        <p class="text-sm leading-relaxed opacity-70">Kami tidak hanya bangga dengan masa lalu, tapi kami sangat bersemangat untuk membangun masa depan pendidikan yang lebih inklusif dan digital.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Sejarah Content End -->
@endsection