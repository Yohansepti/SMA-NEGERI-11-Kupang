@extends('layouts.main')

@section('title', 'Penerimaan Siswa Baru (PPDB) - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">PPDB <span class="text-primary italic">Online</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Akademik</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">PPDB</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- PPDB Section Start -->
    <section class="py-24 bg-white" x-data="{ tab: 'persyaratan' }">
        <div class="container mx-auto px-4 lg:px-10">
            @if($ppdb)
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                <!-- Sidebar Nav -->
                <div class="lg:col-span-1">
                    <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">ADMISSION</div>
                    <h2 class="text-4xl font-black text-navy uppercase tracking-tighter leading-tight mb-8">Pendaftaran Tahun Pelajaran <span class="text-primary italic">{{ $ppdb->academic_year }}</span></h2>
                    
                    <div class="flex flex-col space-y-2">
                        <button @click="tab = 'persyaratan'" :class="tab === 'persyaratan' ? 'bg-primary text-white border-primary' : 'bg-light text-navy border-transparent hover:border-primary'" class="w-full text-left p-6 font-black uppercase tracking-widest border-l-4 transition-all flex justify-between items-center group">
                            <span>Persyaratan</span>
                            <i class="fa fa-chevron-right text-xs group-hover:translate-x-2 transition-transform"></i>
                        </button>
                        <button @click="tab = 'jadwal'" :class="tab === 'jadwal' ? 'bg-primary text-white border-primary' : 'bg-light text-navy border-transparent hover:border-primary'" class="w-full text-left p-6 font-black uppercase tracking-widest border-l-4 transition-all flex justify-between items-center group">
                            <span>Jadwal Pendaftaran</span>
                            <i class="fa fa-chevron-right text-xs group-hover:translate-x-2 transition-transform"></i>
                        </button>
                        <button @click="tab = 'brosur'" :class="tab === 'brosur' ? 'bg-primary text-white border-primary' : 'bg-light text-navy border-transparent hover:border-primary'" class="w-full text-left p-6 font-black uppercase tracking-widest border-l-4 transition-all flex justify-between items-center group">
                            <span>Brosur & Panduan</span>
                            <i class="fa fa-chevron-right text-xs group-hover:translate-x-2 transition-transform"></i>
                        </button>
                    </div>

                    <div class="mt-12 bg-navy p-10 text-white">
                        <i class="fa fa-info-circle text-primary text-4xl mb-6"></i>
                        <h5 class="text-xl font-black uppercase mb-4 tracking-tighter">Butuh Bantuan?</h5>
                        <p class="text-sm leading-relaxed opacity-70 mb-8">Hubungi Panitia PPDB kami melalui WhatsApp untuk panduan pendaftaran.</p>
                        <a href="https://wa.me/628123456789" class="btn-edukate bg-primary text-white hover:bg-white hover:text-navy w-full text-center py-2">Chat Via WhatsApp</a>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Tab: Persyaratan -->
                    <div x-show="tab === 'persyaratan'" x-transition class="bg-light p-10 lg:p-20 shadow-xl border-t-8 border-primary">
                        <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-10"><i class="fa fa-check-circle text-primary mr-3"></i> Persyaratan Umum</h3>
                        <div class="space-y-6">
                            @php
                                $requirements = explode("\n", str_replace("\r", "", $ppdb->requirements));
                            @endphp
                            @foreach($requirements as $index => $req)
                                @if(trim($req))
                                <div class="flex items-start bg-white p-6 shadow-sm group">
                                    <div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary font-black mr-6 shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                                    <p class="font-bold text-navy leading-relaxed">{{ $req }}</p>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <!-- Tab: Jadwal -->
                    <div x-show="tab === 'jadwal'" x-transition class="bg-light p-10 lg:p-20 shadow-xl border-t-8 border-secondary">
                        <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-10"><i class="fa fa-calendar-alt text-secondary mr-3"></i> Jadwal Pelaksanaan</h3>
                        <div class="space-y-6">
                            @foreach($ppdb->schedule as $item)
                                <div class="bg-white p-8 shadow-sm border-l-4 border-secondary group hover:bg-secondary/5 transition-all">
                                    <div class="flex flex-col md:flex-row justify-between md:items-center gap-4 mb-4">
                                        <h4 class="text-xl font-black text-navy uppercase tracking-tight group-hover:text-secondary transition-colors">{{ $item['kegiatan'] }}</h4>
                                        <span class="bg-secondary text-white px-4 py-1 text-xs font-black w-fit uppercase tracking-widest whitespace-nowrap">{{ $item['waktu'] }}</span>
                                    </div>
                                    <p class="text-sm text-slate-600 leading-relaxed font-bold">
                                        <i class="fa fa-info-circle text-secondary/40 mr-2 text-xs"></i>
                                        {{ $item['keterangan'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Tab: Brosur -->
                    <div x-show="tab === 'brosur'" x-transition class="bg-light p-10 lg:p-20 shadow-xl border-t-8 border-primary">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12 gap-6">
                            <div>
                                <h3 class="text-3xl font-black text-navy uppercase tracking-tighter"><i class="fa fa-file-download text-primary mr-3"></i> Media & Publikasi</h3>
                                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mt-2">Dapatkan informasi lengkap dalam format visual.</p>
                            </div>
                            <div class="bg-navy px-6 py-3 border-l-4 border-primary">
                                <span class="text-[10px] font-black text-white uppercase tracking-widest block">Update Terbaru</span>
                                <span class="text-[9px] text-primary font-black uppercase tracking-tighter">{{ $ppdb->updated_at->format('d M Y') }}</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <!-- Card: Brosur -->
                            <div class="group relative bg-white p-4 shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100 flex flex-col">
                                <div class="relative overflow-hidden aspect-[3/4] bg-slate-900 border border-slate-200">
                                    @php
                                        $extB = strtolower(pathinfo($ppdb->brochure, PATHINFO_EXTENSION));
                                        $isImgB = in_array($extB, ['jpg', 'jpeg', 'png', 'webp']);
                                    @endphp
                                    
                                    @if($isImgB)
                                        <img src="{{ asset('storage/' . $ppdb->brochure) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Brosur">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center bg-navy text-white space-y-4">
                                            <i class="fa fa-file-pdf text-6xl text-primary/30"></i>
                                            <span class="text-[10px] font-black uppercase tracking-[0.3em] opacity-40">Dokumen PDF</span>
                                        </div>
                                    @endif

                                    <!-- Overlay Actions -->
                                    <div class="absolute inset-0 bg-navy/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-8 text-center space-y-6">
                                        <p class="text-white text-xs font-bold leading-relaxed">Klik untuk melihat file secara penuh atau download untuk mencetak.</p>
                                        <div class="flex gap-3">
                                            <a href="{{ asset('storage/' . $ppdb->brochure) }}" target="_blank" class="w-12 h-12 bg-white text-navy flex items-center justify-center hover:bg-primary hover:text-white transition-all transform hover:scale-110">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                            <a href="{{ asset('storage/' . $ppdb->brochure) }}" download class="w-12 h-12 bg-primary text-white flex items-center justify-center hover:bg-white hover:text-navy transition-all transform hover:scale-110">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-6 pb-2 text-center">
                                    <h5 class="text-lg font-black text-navy uppercase tracking-tighter mb-4">Brosur Resmi PPDB</h5>
                                    <a href="{{ asset('storage/' . $ppdb->brochure) }}" download class="inline-flex items-center gap-3 text-[10px] font-black text-primary uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform">
                                        Download Sekarang <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Card: Panduan -->
                            <div class="group relative bg-white p-4 shadow-2xl transition-all duration-500 hover:-translate-y-2 border border-slate-100 flex flex-col">
                                <div class="relative overflow-hidden aspect-[3/4] bg-slate-900 border border-slate-200">
                                    @php
                                        $extG = strtolower(pathinfo($ppdb->guide, PATHINFO_EXTENSION));
                                        $isImgG = in_array($extG, ['jpg', 'jpeg', 'png', 'webp']);
                                    @endphp
                                    
                                    @if($isImgG)
                                        <img src="{{ asset('storage/' . $ppdb->guide) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="Panduan">
                                    @else
                                        <div class="w-full h-full flex flex-col items-center justify-center bg-navy text-white space-y-4">
                                            <i class="fa fa-file-word text-6xl text-secondary/30"></i>
                                            <span class="text-[10px] font-black uppercase tracking-[0.3em] opacity-40">Dokumen Panduan</span>
                                        </div>
                                    @endif

                                    <!-- Overlay Actions -->
                                    <div class="absolute inset-0 bg-navy/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center p-8 text-center space-y-6">
                                        <p class="text-white text-xs font-bold leading-relaxed">Pelajari langkah-langkah pendaftaran melalui dokumen panduan ini.</p>
                                        <div class="flex gap-3">
                                            <a href="{{ asset('storage/' . $ppdb->guide) }}" target="_blank" class="w-12 h-12 bg-white text-navy flex items-center justify-center hover:bg-primary hover:text-white transition-all transform hover:scale-110">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                            <a href="{{ asset('storage/' . $ppdb->guide) }}" download class="w-12 h-12 bg-primary text-white flex items-center justify-center hover:bg-white hover:text-navy transition-all transform hover:scale-110">
                                                <i class="fa fa-download"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-6 pb-2 text-center">
                                    <h5 class="text-lg font-black text-navy uppercase tracking-tighter mb-4">Panduan Pendaftaran</h5>
                                    <a href="{{ asset('storage/' . $ppdb->guide) }}" download class="inline-flex items-center gap-3 text-[10px] font-black text-primary uppercase tracking-[0.2em] group-hover:translate-x-2 transition-transform">
                                        Download Sekarang <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="text-center py-20 bg-light shadow-xl border-t-8 border-primary">
                <i class="fa fa-clock text-6xl text-primary mb-6"></i>
                <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-4">PPDB Belum Dibuka</h3>
                <p class="text-slate-600 font-bold uppercase tracking-widest">Informasi pendaftaran siswa baru akan segera diperbarui. Silakan cek kembali nanti.</p>
            </div>
            @endif
        </div>
    </section>
    <!-- PPDB Section End -->
@endsection
