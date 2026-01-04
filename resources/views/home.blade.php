@extends('layouts.main')

@section('title', 'SMA NEGERI 11 KUPANG - Masa Depan Cerah Dimulai Di Sini')

@section('content')
    <!-- Hero/Carousel Start -->
    <section class="relative h-[95vh] overflow-hidden group/hero" x-data="{ active: 0, slides: 3, interval: null }" x-init="interval = setInterval(() => { active = (active + 1) % slides }, 8000)">
        <!-- Slides -->
        <div class="absolute inset-0 z-0 scale-105 group-hover/hero:scale-100 transition-transform duration-[5s] ease-out">
            <!-- Slide 1 -->
            <div x-show="active === 0" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100" class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/home/home1.png');">
                <div class="absolute inset-0 bg-gradient-to-r from-navy/90 via-navy/50 to-transparent"></div>
            </div>
            <!-- Slide 2 -->
            <div x-show="active === 1" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100" x-cloak class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/home/home2.png');">
                <div class="absolute inset-0 bg-gradient-to-r from-navy/90 via-navy/50 to-transparent"></div>
            </div>
            <!-- Slide 3 -->
            <div x-show="active === 2" x-transition:enter="transition ease-out duration-1000" x-transition:enter-start="opacity-0 scale-110" x-transition:enter-end="opacity-100 scale-100" x-cloak class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/home/home3.png');">
                <div class="absolute inset-0 bg-gradient-to-r from-navy/90 via-navy/50 to-transparent"></div>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="container mx-auto px-4 lg:px-10 h-full flex items-center relative z-10">
            <div class="max-w-4xl text-left">
                <div class="flex items-center space-x-4 mb-8 overflow-hidden">
                    <span class="w-8 h-[2px] bg-primary block"></span>
                    <h5 class="uppercase font-bold tracking-[0.3em] text-primary/80 text-[10px] lg:text-xs">Education for Future Leaders</h5>
                </div>
                
                <h1 class="text-white text-3xl lg:text-5xl font-black leading-tight mb-10 uppercase tracking-tighter" x-show="active === 0" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0 text-white">Pendidikan Terbaik Untuk <span class="text-primary italic font-light tracking-normal">Masa Depan</span> Anak Anda</h1>
                <h1 class="text-white text-3xl lg:text-5xl font-black leading-tight mb-10 uppercase tracking-tighter" x-show="active === 1" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0 text-white" x-cloak>Membangun Karakter Unggul & <span class="text-primary italic font-light tracking-normal">Berdaya Saing</span> Global</h1>
                <h1 class="text-white text-3xl lg:text-5xl font-black leading-tight mb-10 uppercase tracking-tighter" x-show="active === 2" x-transition:enter="transition ease-out duration-700 delay-300" x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0 text-white" x-cloak>Inovasi Belajar Dalam <span class="text-primary italic font-light tracking-normal">Ekosistem</span> Digital 5.0</h1>
                
                <div class="flex flex-wrap gap-8">
                    <a href="{{ route('ppdb') }}" class="btn-edukate bg-primary text-white hover:bg-white hover:text-navy text-[13px] px-12 group/btn shadow-2xl shadow-primary/30">
                        Start Journey <i class="fa fa-arrow-right ml-3 transition-transform group-hover/btn:translate-x-2"></i>
                    </a>
                    <a href="{{ route('kontak') }}" class="btn-edukate border-2 border-white/20 text-white hover:bg-white hover:text-navy text-[13px] px-12 backdrop-blur-sm">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>

        <!-- Carousel Indicators -->
        <div class="absolute bottom-12 left-10 z-20 flex space-x-4">
            <template x-for="i in slides" :key="i-1">
                <button @click="active = i-1; clearInterval(interval)" :class="active === i-1 ? 'w-12 bg-primary' : 'w-4 bg-white/20'" class="h-1 transition-all duration-500 rounded-full"></button>
            </template>
        </div>
    </section>
    <!-- Hero/Carousel End -->

    <!-- Feature Cards Start -->
    <section class="relative z-20 -mt-20">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-0 shadow-2xl overflow-hidden group">
                <div class="bg-[#28A745] p-12 text-white flex flex-col justify-between min-h-[300px] border-r border-white/10 hover:brightness-110 transition-all duration-500">
                    <div class="flex justify-between items-start">
                        <i class="fa fa-medal text-5xl opacity-40"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest bg-black/10 px-3 py-1">Excellence</span>
                    </div>
                    <div>
                        <h5 class="text-2xl font-black uppercase leading-tight mb-2">Terakreditasi A</h5>
                        <p class="text-sm text-white/70 font-bold uppercase tracking-widest">Kualitas Pendidikan Terjamin</p>
                    </div>
                </div>
                <div class="bg-primary p-12 text-white flex flex-col justify-between min-h-[300px] border-r border-white/10 hover:brightness-110 transition-all duration-500">
                    <div class="flex justify-between items-start">
                        <i class="fa fa-user-graduate text-5xl opacity-40"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest bg-black/10 px-3 py-1">Expertise</span>
                    </div>
                    <div>
                        <h5 class="text-2xl font-black uppercase leading-tight mb-2">Guru Kompeten</h5>
                        <p class="text-sm text-white/70 font-bold uppercase tracking-widest">Pendidik Berpengalaman</p>
                    </div>
                </div>
                <div class="bg-secondary p-12 text-white flex flex-col justify-between min-h-[300px] border-r border-white/10 hover:brightness-110 transition-all duration-500">
                    <div class="flex justify-between items-start">
                        <i class="fa fa-university text-5xl opacity-40"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest bg-black/10 px-3 py-1">Facilities</span>
                    </div>
                    <div>
                        <h5 class="text-2xl font-black uppercase leading-tight mb-2">Fasilitas Lengkap</h5>
                        <p class="text-sm text-white/70 font-bold uppercase tracking-widest">Sarana Modern & Memadai</p>
                    </div>
                </div>
                <div class="bg-[#FFC107] p-12 text-navy flex flex-col justify-between min-h-[300px] hover:brightness-105 transition-all duration-500">
                    <div class="flex justify-between items-start">
                        <i class="fa fa-lightbulb text-5xl opacity-20"></i>
                        <span class="text-[10px] font-black uppercase tracking-widest bg-black/5 px-3 py-1">Innovation</span>
                    </div>
                    <div>
                        <h5 class="text-2xl font-black uppercase leading-tight mb-2">Kurikulum Baru</h5>
                        <p class="text-sm text-navy/40 font-bold uppercase tracking-widest">Adaptif Terhadap Zaman</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Cards End -->

    <!-- About Section Start -->
    <section class="py-40 bg-white relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-32 items-center">
                <div class="relative group">
                    <div class="absolute -top-12 -left-12 w-64 h-64 bg-primary/5 rounded-full z-0 group-hover:scale-150 transition-transform duration-[2s]"></div>
                    <div class="relative z-10">
                        <img src="/images/home/home1.png" class="w-full grayscale hover:grayscale-0 transition-all duration-1000 shadow-2xl border-white border-[12px]" alt="School">
                        <div class="absolute -bottom-16 -right-16 bg-navy p-16 text-white text-center transform hover:scale-110 transition-transform duration-500">
                            <span class="text-8xl font-black leading-none text-primary block">14+</span>
                            <span class="text-[10px] font-black uppercase tracking-[0.4em] mt-4 block leading-none">Years Service</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center space-x-4 mb-10">
                        <span class="w-10 h-1 bg-secondary block"></span>
                        <span class="text-secondary text-xs lg:text-sm font-black uppercase tracking-[0.3em]">Learn About Us</span>
                    </div>
                    <h2 class="text-4xl lg:text-6xl font-black text-navy leading-tight mb-12 uppercase tracking-tighter">Mencetak Generasi <span class="text-primary italic">Emas</span> Sejak 2011</h2>
                    
                    <div class="prose prose-lg text-text leading-relaxed mb-16 space-y-8 font-medium italic">
                        <p>SMA Negeri 11 Kupang bukan sekadar sekolah, melainkan wadah di mana setiap siswa diajak untuk berani bermimpi dan bertransformasi. Terletak strategis di kawasan Alak, kami berkomitmen menjadi mercusuar pendidikan di Nusa Tenggara Timur.</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-10 mb-16">
                        <div class="flex items-start space-x-6 group">
                            <div class="w-14 h-14 bg-light flex items-center justify-center text-primary text-2xl group-hover:bg-primary group-hover:text-white transition-all duration-500 shrink-0">
                                <i class="fa fa-fingerprint"></i>
                            </div>
                            <div>
                                <h6 class="font-black text-navy uppercase mb-2 tracking-tighter">Berdikari</h6>
                                <p class="text-xs font-bold text-text/60 leading-relaxed uppercase tracking-widest">Kemandirian Siswa</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-6 group">
                            <div class="w-14 h-14 bg-light flex items-center justify-center text-primary text-2xl group-hover:bg-primary group-hover:text-white transition-all duration-500 shrink-0">
                                <i class="fa fa-users"></i>
                            </div>
                            <div>
                                <h6 class="font-black text-navy uppercase mb-2 tracking-tighter">Berbudaya</h6>
                                <p class="text-xs font-bold text-text/60 leading-relaxed uppercase tracking-widest">Etika & Karakter</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('profil.sejarah') }}" class="btn-edukate bg-navy text-white hover:bg-primary shadow-xl shadow-navy/20">
                        Explore Full Profile <i class="fa fa-arrow-right ml-3"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Services Start -->
    <section class="py-40 bg-light relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[50vw] h-full bg-navy/[0.02] skew-x-12"></div>
        <div class="container mx-auto px-4 lg:px-10 relative z-10">
            <div class="flex flex-col lg:flex-row justify-between items-end mb-24 gap-12">
                <div class="max-w-3xl">
                    <div class="flex items-center space-x-4 mb-10">
                        <span class="w-10 h-1 bg-primary block"></span>
                        <span class="text-primary text-xs lg:text-sm font-black uppercase tracking-[0.3em]">Excellence Programs</span>
                    </div>
                    <h2 class="text-4xl lg:text-6xl font-black text-navy leading-none uppercase tracking-tighter">Ecosystem of <span class="text-primary italic">Learning</span></h2>
                </div>
                <div class="lg:mb-4">
                    <p class="text-right font-bold text-navy/40 uppercase tracking-widest text-[10px]">Scroll to see more</p>
                </div>
            </div>

            @if($academics->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
                @foreach($academics as $index => $academic)
                <div class="bg-{{ ($index % 3 === 2) ? 'navy' : 'white' }} group overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-700 border-b-[8px] border-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'white') }}">
                    <div class="relative h-72 overflow-hidden">
                        @if($academic->image)
                        <img src="{{ asset('storage/' . $academic->image) }}" class="w-full h-full object-cover {{ ($index % 3 === 2) ? 'grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100' : 'grayscale group-hover:grayscale-0' }} group-hover:scale-110 transition-all duration-1000" alt="{{ $academic->title }}">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($academic->title) }}&background=2878eb&color=fff&size=500" class="w-full h-full object-cover {{ ($index % 3 === 2) ? 'grayscale opacity-50 group-hover:grayscale-0 group-hover:opacity-100' : 'grayscale group-hover:grayscale-0' }} group-hover:scale-110 transition-all duration-1000" alt="{{ $academic->title }}">
                        @endif
                        <div class="absolute top-6 right-6 bg-{{ ($index % 3 === 2) ? 'primary' : 'white' }} w-14 h-14 flex items-center justify-center text-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'white') }} text-xl font-black">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    </div>
                    <div class="p-12">
                        <h4 class="text-2xl font-black text-{{ ($index % 3 === 2) ? 'white' : 'navy' }} mb-6 uppercase tracking-tighter group-hover:text-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'primary') }} transition-colors">{{ $academic->title }}</h4>
                        <p class="text-sm leading-relaxed mb-10 font-medium {{ ($index % 3 === 2) ? 'text-white/50' : '' }}">{{ $academic->description ?? Str::limit($academic->content, 100) }}</p>
                        @if($academic->type === 'fasilitas')
                        <a href="{{ route('akademik.fasilitas') }}" class="text-xs font-black uppercase tracking-[0.3em] text-{{ ($index % 3 === 2) ? 'primary' : 'navy' }} border-b-2 border-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'primary') }}/20 hover:border-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'primary') }} transition-all pb-2">Explore Facility</a>
                        @elseif($academic->type === 'ekskul')
                        <a href="{{ route('akademik.ekskul') }}" class="text-xs font-black uppercase tracking-[0.3em] text-{{ ($index % 3 === 2) ? 'primary' : 'navy' }} border-b-2 border-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'primary') }}/20 hover:border-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'primary') }} transition-all pb-2">View Activities</a>
                        @else
                        <a href="{{ route('kurikulum') }}" class="text-xs font-black uppercase tracking-[0.3em] text-{{ ($index % 3 === 2) ? 'primary' : 'navy' }} border-b-2 border-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'primary') }}/20 hover:border-{{ ($index % 3 === 0) ? 'primary' : (($index % 3 === 1) ? 'secondary' : 'primary') }} transition-all pb-2">See Curriculum</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-light rounded-full mb-6">
                    <i class="fas fa-graduation-cap text-5xl text-slate-300"></i>
                </div>
                <h3 class="text-2xl font-black text-navy uppercase tracking-tighter mb-3">Data Belum Tersedia</h3>
                <p class="text-slate-500 max-w-md mx-auto">Program akademik belum ditambahkan.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- Services End -->

    <!-- Announcements & News Start -->
    <section class="py-40 bg-light relative overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="flex flex-col lg:flex-row justify-between items-end mb-24 gap-8">
                <div>
                    <div class="flex items-center space-x-4 mb-10">
                        <span class="w-10 h-1 bg-secondary block"></span>
                        <span class="text-secondary text-xs lg:text-sm font-black uppercase tracking-[0.3em]">Latest Notices</span>
                    </div>
                    <h2 class="text-4xl lg:text-6xl font-black text-navy leading-none uppercase tracking-tighter">Pusat <span class="text-secondary italic">Pengumuman</span></h2>
                </div>
                <a href="{{ route('pengumuman') }}" class="btn-edukate border-2 border-navy text-navy hover:bg-navy hover:text-white mb-2 shadow-xl shadow-navy/5">Lihat Semua Pengumuman</a>
            </div>

            @if($announcements->count() > 0)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Highlight Announcement -->
                @php $featured = $announcements->first(); @endphp
                <div class="bg-navy p-12 lg:p-20 text-white relative overflow-hidden group border-b-[20px] border-{{ $featured->priority === 'Urgent' ? 'secondary' : 'primary' }} shadow-2xl">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full group-hover:scale-150 transition-transform duration-[3s]"></div>
                    <div class="relative z-10">
                        <div class="flex items-center space-x-4 mb-10">
                            @if($featured->priority === 'Urgent')
                            <span class="bg-secondary text-white text-[10px] font-black px-4 py-1 uppercase tracking-widest animate-pulse">Urgent Notice</span>
                            @endif
                            <span class="text-white/40 text-[10px] font-black uppercase tracking-[0.2em]">{{ $featured->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-3xl lg:text-4xl font-black uppercase tracking-tighter mb-8 leading-tight">{{ $featured->title }}</h3>
                        <p class="text-white/60 leading-relaxed font-medium mb-12 text-lg">{{ Str::limit($featured->content, 150) }}</p>
                        <a href="{{ route('pengumuman') }}" class="text-xs font-black uppercase tracking-[0.4em] text-{{ $featured->priority === 'Urgent' ? 'secondary' : 'primary' }} border-b-2 border-{{ $featured->priority === 'Urgent' ? 'secondary' : 'primary' }}/20 hover:border-{{ $featured->priority === 'Urgent' ? 'secondary' : 'primary' }} transition-all pb-2">Read Detail Announcement</a>
                    </div>
                </div>

                <!-- Small List -->
                <div class="space-y-8">
                    @foreach($announcements->skip(1)->take(2) as $item)
                    <div class="bg-white p-10 border border-slate-200 group hover:border-primary transition-all duration-500">
                        <div class="flex items-center space-x-4 mb-4">
                            <span class="text-navy/30 text-[9px] font-black uppercase tracking-[0.2em]">{{ $item->created_at->format('d M Y') }}</span>
                            @if($item->priority === 'Urgent')
                            <span class="bg-secondary text-white text-[9px] font-black px-2 py-1 uppercase">Urgent</span>
                            @endif
                        </div>
                        <h4 class="text-xl font-black text-navy uppercase tracking-tighter group-hover:text-primary transition-colors leading-tight mb-4">{{ $item->title }}</h4>
                        <p class="text-sm text-text font-medium mb-6 line-clamp-2">{{ Str::limit($item->content, 100) }}</p>
                        <a href="{{ route('pengumuman') }}" class="text-[10px] font-black uppercase tracking-widest text-navy border-b border-primary/20 hover:border-primary transition-all pb-1">Detail Info</a>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-32">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-light rounded-full mb-8">
                    <i class="fas fa-bullhorn text-6xl text-slate-300"></i>
                </div>
                <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-4">Belum Ada Pengumuman</h3>
                <p class="text-slate-500 text-lg max-w-md mx-auto">Pengumuman dan informasi penting belum ditambahkan. Administrator akan segera mengupdate informasi terbaru.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- Announcements & News End -->

    <!-- Team Section Start -->
    <section class="py-40 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center max-w-4xl mx-auto mb-32">
                 <div class="flex justify-center items-center space-x-4 mb-10">
                    <span class="w-10 h-1 bg-primary block"></span>
                    <span class="text-primary text-xs lg:text-sm font-black uppercase tracking-[0.3em]">Academic Council</span>
                    <span class="w-10 h-1 bg-primary block"></span>
                </div>
                <h2 class="text-4xl lg:text-6xl font-black text-navy leading-none uppercase tracking-tighter">Meet Our <span class="text-primary italic">Mentors</span></h2>
            </div>
            
            @if($staff->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                @foreach($staff as $person)
                <div class="group text-center">
                    <div class="mb-8 relative overflow-hidden grayscale group-hover:grayscale-0 transition-all duration-700 shadow-2xl skew-x-1 group-hover:skew-x-0">
                        @if($person->image)
                        <img src="{{ asset('storage/' . $person->image) }}" class="w-full aspect-square object-cover transform scale-110 group-hover:scale-100 transition-transform duration-1000" alt="{{ $person->name }}">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($person->name) }}&background=120f2d&color=fff&size=500" class="w-full aspect-square object-cover transform scale-110 group-hover:scale-100 transition-transform duration-1000" alt="{{ $person->name }}">
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 p-4 bg-navy/90 backdrop-blur-md translate-y-full group-hover:translate-y-0 transition-transform duration-500">
                             <div class="flex justify-center space-x-6 text-white text-sm">
                                <a href="#" class="hover:text-primary transition-colors"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="hover:text-primary transition-colors"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="hover:text-primary transition-colors"><i class="fab fa-linkedin-in"></i></a>
                             </div>
                        </div>
                    </div>
                    <h5 class="text-xl font-black text-navy uppercase tracking-tighter mb-1">{{ $person->name }}</h5>
                    <p class="text-[10px] font-black uppercase tracking-[0.3em] text-primary">{{ $person->role }}</p>
                </div>
                @endforeach
            </div>
            @else
            <!-- Empty State -->
            <div class="text-center py-20">
                <div class="inline-flex items-center justify-center w-24 h-24 bg-light rounded-full mb-6">
                    <i class="fas fa-users text-5xl text-slate-300"></i>
                </div>
                <h3 class="text-2xl font-black text-navy uppercase tracking-tighter mb-3">Data Belum Tersedia</h3>
                <p class="text-slate-500 max-w-md mx-auto">Data guru dan pegawai belum ditambahkan.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- Team Section End -->

@endsection
