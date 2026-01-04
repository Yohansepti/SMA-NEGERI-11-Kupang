<!DOCTYPE html>
<html lang="id" class="scroll-smooth" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SMA NEGERI 11 KUPANG')</title>
    <link rel="icon" href="{{ asset('images/logo_sekolah.png') }}" type="image/png">
    
    <!-- Google Fonts: Jost & Open Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700;800;900&family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
        .nav-link {
            @apply font-bold uppercase text-[13px] tracking-wider transition-all duration-300;
        }
    </style>
</head>
<body class="bg-white dark:bg-gray-900 text-text dark:text-gray-100 font-sans transition-colors duration-300" 
      x-data="{ 
          mobileMenuOpen: false, 
          scrolled: false,
          darkMode: localStorage.getItem('darkMode') === 'true' || false
      }" 
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      @scroll.window="scrolled = (window.pageYOffset > 50)">



    <!-- Navbar Start -->
    <nav class="sticky top-0 z-50 transition-all duration-500 bg-white dark:bg-gray-800 border-b dark:border-gray-700" :class="scrolled ? 'shadow-xl py-2' : 'py-4'">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 lg:w-12 lg:h-12 flex items-center justify-center transition-transform group-hover:scale-110">
                        <img src="{{ asset('images/logo_sekolah.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-navy dark:text-white font-black text-base lg:text-lg uppercase tracking-tighter leading-none">SMAN 11</span>
                        <span class="text-primary font-black text-[11px] uppercase tracking-widest italic">KUPANG</span>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-6 xl:space-x-8">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'text-primary' : 'text-navy dark:text-white hover:text-primary' }}">Home</a>
                    
                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="nav-link text-navy dark:text-white group-hover:text-primary flex items-center">
                            Profile <i class="fa fa-angle-down ml-1 text-[10px]"></i>
                        </button>
                        <div x-show="open" x-cloak x-transition.origin.top class="absolute top-full left-0 w-56 bg-white dark:bg-gray-800 shadow-2xl border-t-4 border-primary py-4 mt-0 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                            <a href="{{ route('profil.sejarah') }}" class="block px-8 py-3 text-[13px] font-bold text-navy dark:text-white hover:bg-light dark:hover:bg-gray-700 hover:text-primary border-b border-light dark:border-gray-700 transition-colors uppercase tracking-wider">Sejarah</a>
                            <a href="{{ route('profil.visimisi') }}" class="block px-8 py-3 text-[13px] font-bold text-navy dark:text-white hover:bg-light dark:hover:bg-gray-700 hover:text-primary border-b border-light dark:border-gray-700 transition-colors uppercase tracking-wider">Visi & Misi</a>
                            <a href="{{ route('profil.sambutan') }}" class="block px-8 py-3 text-[13px] font-bold text-navy dark:text-white hover:bg-light dark:hover:bg-gray-700 hover:text-primary border-b border-light dark:border-gray-700 transition-colors uppercase tracking-wider">Sambutan</a>
                            <a href="{{ route('profil.gurupegawai') }}" class="block px-8 py-3 text-[13px] font-bold text-navy dark:text-white hover:bg-light dark:hover:bg-gray-700 hover:text-primary transition-colors uppercase tracking-wider">Guru & Pegawai</a>
                        </div>
                    </div>

                    <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="nav-link text-navy dark:text-white group-hover:text-primary flex items-center">
                            Akademik <i class="fa fa-angle-down ml-1 text-[10px]"></i>
                        </button>
                        <div x-show="open" x-cloak x-transition.origin.top class="absolute top-full left-0 w-56 bg-white dark:bg-gray-800 shadow-2xl border-t-4 border-primary py-4 mt-0 opacity-0 group-hover:opacity-100 transition-all duration-300 translate-y-2 group-hover:translate-y-0">
                            <a href="{{ route('akademik.fasilitas') }}" class="block px-8 py-3 text-[13px] font-bold text-navy dark:text-white hover:bg-light dark:hover:bg-gray-700 hover:text-primary border-b border-light dark:border-gray-700 transition-colors uppercase tracking-wider">Fasilitas</a>
                            <a href="{{ route('akademik.ekskul') }}" class="block px-8 py-3 text-[13px] font-bold text-navy dark:text-white hover:bg-light dark:hover:bg-gray-700 hover:text-primary border-b border-light dark:border-gray-700 transition-colors uppercase tracking-wider">Ekstrakurikuler</a>
                            <a href="{{ route('kurikulum') }}" class="block px-8 py-3 text-[13px] font-bold text-navy dark:text-white hover:bg-light dark:hover:bg-gray-700 hover:text-primary transition-colors uppercase tracking-wider">Kurikulum</a>
                        </div>
                    </div>

                    <a href="{{ route('berita') }}" class="nav-link {{ request()->routeIs('berita') ? 'text-primary' : 'text-navy dark:text-white hover:text-primary' }}">Berita</a>
                    <a href="{{ route('pengumuman') }}" class="nav-link {{ request()->routeIs('pengumuman') ? 'text-primary' : 'text-navy dark:text-white hover:text-primary' }}">Pengumuman</a>
                    <a href="{{ route('ppdb') }}" class="nav-link {{ request()->routeIs('ppdb') ? 'text-primary' : 'text-navy dark:text-white hover:text-primary' }}">PPDB</a>
                    <a href="{{ route('kontak') }}" class="nav-link {{ request()->routeIs('kontak') ? 'text-primary' : 'text-navy dark:text-white hover:text-primary' }}">Kontak</a>
                </div>

                <!-- CTA Buttons -->
                <div class="hidden lg:flex items-center space-x-3">
                    <!-- Dark Mode Toggle -->


                    <a href="{{ route('admin.login.form') }}" class="inline-flex items-center justify-center py-2.5 px-6 text-[10px] font-bold uppercase tracking-widest border-2 border-primary text-primary hover:bg-primary hover:text-white dark:border-white dark:text-white dark:hover:bg-white dark:hover:text-navy transition-all duration-300">
                        Portal Admin
                    </a>
                </div>

                <!-- Mobile Trigger -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-navy p-2 hover:bg-light transition-colors">
                    <i class="fa fa-bars text-2xl" x-show="!mobileMenuOpen"></i>
                    <i class="fa fa-times text-2xl" x-show="mobileMenuOpen" x-cloak></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0" class="lg:hidden bg-white border-t border-slate-100 py-8 px-8 flex flex-col space-y-6 shadow-2xl absolute top-full left-0 w-full">
            <a href="{{ route('home') }}" class="text-lg font-black uppercase text-navy hover:text-primary transition-colors">Home</a>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="text-lg font-black uppercase text-navy hover:text-primary flex items-center w-full justify-between">
                    Profile <i class="fa fa-angle-down transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-transition class="pl-6 mt-4 space-y-4 border-l-4 border-primary/20">
                    <a href="{{ route('profil.sejarah') }}" class="block text-sm font-bold text-text hover:text-primary uppercase tracking-widest">Sejarah</a>
                    <a href="{{ route('profil.visimisi') }}" class="block text-sm font-bold text-text hover:text-primary uppercase tracking-widest">Visi & Misi</a>
                    <a href="{{ route('profil.sambutan') }}" class="block text-sm font-bold text-text hover:text-primary uppercase tracking-widest">Sambutan</a>
                    <a href="{{ route('profil.gurupegawai') }}" class="block text-sm font-bold text-text hover:text-primary uppercase tracking-widest">Guru & Pegawai</a>
                </div>
            </div>
            <div x-data="{ open: false }">
                <button @click="open = !open" class="text-lg font-black uppercase text-navy hover:text-primary flex items-center w-full justify-between">
                    Akademik <i class="fa fa-angle-down transition-transform" :class="open ? 'rotate-180' : ''"></i>
                </button>
                <div x-show="open" x-transition class="pl-6 mt-4 space-y-4 border-l-4 border-primary/20">
                    <a href="{{ route('akademik.fasilitas') }}" class="block text-sm font-bold text-text hover:text-primary uppercase tracking-widest">Fasilitas</a>
                    <a href="{{ route('akademik.ekskul') }}" class="block text-sm font-bold text-text hover:text-primary uppercase tracking-widest">Ekstrakurikuler</a>
                    <a href="{{ route('kurikulum') }}" class="block text-sm font-bold text-text hover:text-primary uppercase tracking-widest">Kurikulum</a>
                </div>
            </div>
            <a href="{{ route('berita') }}" class="text-lg font-black uppercase text-navy hover:text-primary transition-colors">Berita</a>
            <a href="{{ route('pengumuman') }}" class="text-lg font-black uppercase text-navy hover:text-primary transition-colors">Pengumuman</a>
            <a href="{{ route('ppdb') }}" class="text-lg font-black uppercase text-navy hover:text-primary transition-colors">PPDB</a>
            <a href="{{ route('kontak') }}" class="text-lg font-black uppercase text-navy hover:text-primary transition-colors">Kontak</a>
            <a href="{{ route('admin.login.form') }}" class="btn-edukate bg-primary text-white text-center py-4">Login</a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Main Content -->
    @yield('content')



    <!-- Footer Start -->
    <footer class="bg-navy text-white/70 pt-32 pb-12 relative overflow-hidden">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full -mr-48 -mt-48"></div>
        
        <div class="container mx-auto px-4 lg:px-10 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-20">
                <!-- Branding -->
                <div class="space-y-10">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 flex items-center justify-center">
                            <img src="{{ asset('images/logo_sekolah.png') }}" alt="Logo" class="w-full h-full object-contain">
                        </div>
                        <div class="flex flex-col justify-center">
                            <span class="text-xl font-black text-white uppercase tracking-tighter leading-none">SMAN 11</span>
                            <span class="text-xs font-bold text-primary uppercase tracking-[0.2em] leading-none mt-2">KOTA KUPANG</span>
                        </div>
                    </div>
                    <p class="leading-relaxed text-sm font-medium">
                        Membangun masa depan cemerlang melalui pendidikan berkualitas, karakter yang kokoh, dan inovasi yang tak henti-hentinya.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-12 h-12 border border-white/10 flex items-center justify-center hover:bg-primary hover:border-primary transition-all duration-500 rounded-lg group"><i class="fab fa-facebook-f text-white group-hover:scale-110"></i></a>
                        <a href="#" class="w-12 h-12 border border-white/10 flex items-center justify-center hover:bg-primary hover:border-primary transition-all duration-500 rounded-lg group"><i class="fab fa-twitter text-white group-hover:scale-110"></i></a>
                        <a href="#" class="w-12 h-12 border border-white/10 flex items-center justify-center hover:bg-primary hover:border-primary transition-all duration-500 rounded-lg group"><i class="fab fa-instagram text-white group-hover:scale-110"></i></a>
                    </div>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-white text-xl font-black uppercase tracking-tighter mb-10 relative after:absolute after:bottom-[-8px] after:left-0 after:w-10 after:h-1 after:bg-primary">Contact</h4>
                    <ul class="space-y-6 text-sm font-medium">
                        <li class="flex items-start gap-4 hover:text-white transition-colors">
                            <i class="fa fa-map-marker-alt text-primary mt-1"></i>
                            <span>Jl. M. Praja, Alak, Kec. Alak, Kota Kupang, NTT</span>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <i class="fa fa-phone-alt text-primary"></i>
                            <span>+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center gap-4 hover:text-white transition-colors">
                            <i class="fa fa-envelope text-primary"></i>
                            <span>info@sman11kupang.sch.id</span>
                        </li>
                    </ul>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white text-xl font-black uppercase tracking-tighter mb-10 relative after:absolute after:bottom-[-8px] after:left-0 after:w-10 after:h-1 after:bg-primary">Links</h4>
                    <ul class="space-y-4 text-sm font-bold uppercase tracking-widest">
                        <li><a href="{{ route('home') }}" class="hover:text-primary transition-all hover:translate-x-2 inline-block"><i class="fa fa-chevron-right mr-3 text-[10px] text-primary"></i> Home</a></li>
                        <li><a href="{{ route('profil.sejarah') }}" class="hover:text-primary transition-all hover:translate-x-2 inline-block"><i class="fa fa-chevron-right mr-3 text-[10px] text-primary"></i> Profil</a></li>
                        <li><a href="{{ route('akademik.fasilitas') }}" class="hover:text-primary transition-all hover:translate-x-2 inline-block"><i class="fa fa-chevron-right mr-3 text-[10px] text-primary"></i> Fasilitas</a></li>
                        <li><a href="{{ route('berita') }}" class="hover:text-primary transition-all hover:translate-x-2 inline-block"><i class="fa fa-chevron-right mr-3 text-[10px] text-primary"></i> News</a></li>
                    </ul>
                </div>

                <!-- Map Location -->
                <div>
                    <h4 class="text-white text-xl font-black uppercase tracking-tighter mb-10 relative after:absolute after:bottom-[-8px] after:left-0 after:w-10 after:h-1 after:bg-primary">Location</h4>
                    <div class="rounded-xl overflow-hidden shadow-lg border-2 border-white/10 group">
                        <iframe 
                            src="https://maps.google.com/maps?q=-10.211925,123.636153&hl=id&z=17&output=embed"
                            width="100%" 
                            height="200" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade"
                            class="w-full grayscale group-hover:grayscale-0 transition-all duration-700"
                        ></iframe>
                    </div>
                </div>
            </div>

            <!-- Bottom Footer -->
            <div class="mt-32 pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center text-[11px] font-bold uppercase tracking-[0.2em]">
                <p>&copy; 2025 SMA NEGERI 11 KUPANG. DESIGNED FOR EXCELLENCE.</p>
                <div class="flex space-x-10 mt-6 md:mt-0 opacity-50">
                    <a href="#" class="hover:text-primary transition-colors">Privacy Policy</a>
                    <a href="#" class="hover:text-primary transition-colors">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    @stack('scripts')
</body>
</html>
