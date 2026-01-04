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
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                <!-- Sidebar Nav -->
                <div class="lg:col-span-1">
                    <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">ADMISSION</div>
                    <h2 class="text-4xl font-black text-navy uppercase tracking-tighter leading-tight mb-8">Pendaftaran Tahun Pelajaran <span class="text-primary italic">2025/2026</span></h2>
                    
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
                            <div class="flex items-start bg-white p-6 shadow-sm group">
                                <div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary font-black mr-6 shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">01</div>
                                <p class="font-bold text-navy leading-relaxed">Berusia maksimal 21 tahun pada tanggal 1 Juli tahun berjalan.</p>
                            </div>
                            <div class="flex items-start bg-white p-6 shadow-sm group">
                                <div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary font-black mr-6 shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">02</div>
                                <p class="font-bold text-navy leading-relaxed">Memiliki Ijazah/STTB atau Surat Keterangan Lulus dari SMP/Sederajat.</p>
                            </div>
                            <div class="flex items-start bg-white p-6 shadow-sm group">
                                <div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary font-black mr-6 shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">03</div>
                                <p class="font-bold text-navy leading-relaxed">Fotocopy Akta Kelahiran & Kartu Keluarga (KK)Legalisir.</p>
                            </div>
                            <div class="flex items-start bg-white p-6 shadow-sm group">
                                <div class="w-10 h-10 bg-primary/10 flex items-center justify-center text-primary font-black mr-6 shrink-0 group-hover:bg-primary group-hover:text-white transition-colors">04</div>
                                <p class="font-bold text-navy leading-relaxed">Pas Foto berwarna ukuran 3x4 (4 lembar).</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Jadwal -->
                    <div x-show="tab === 'jadwal'" x-transition class="bg-light p-10 lg:p-20 shadow-xl border-t-8 border-secondary">
                        <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-10"><i class="fa fa-calendar-alt text-secondary mr-3"></i> Jadwal Pelaksanaan</h3>
                        <div class="space-y-4">
                            <div class="flex justify-between items-center p-6 bg-white border-b-2 border-light">
                                <span class="font-bold text-navy">Pendaftaran Gelombang I</span>
                                <span class="bg-secondary text-white px-4 py-1 text-xs font-black">1 - 15 JUNI 2025</span>
                            </div>
                            <div class="flex justify-between items-center p-6 bg-white border-b-2 border-light">
                                <span class="font-bold text-navy">Verifikasi Berkas</span>
                                <span class="bg-navy text-white px-4 py-1 text-xs font-black">16 - 20 JUNI 2025</span>
                            </div>
                            <div class="flex justify-between items-center p-6 bg-white border-b-2 border-light">
                                <span class="font-bold text-navy">Pengumuman Kelulusan</span>
                                <span class="bg-primary text-white px-4 py-1 text-xs font-black">22 JUNI 2025</span>
                            </div>
                            <div class="flex justify-between items-center p-6 bg-white border-b-2 border-light">
                                <span class="font-bold text-navy">Daftar Ulang</span>
                                <span class="bg-green-600 text-white px-4 py-1 text-xs font-black">23 - 30 JUNI 2025</span>
                            </div>
                        </div>
                    </div>

                    <!-- Tab: Brosur -->
                    <div x-show="tab === 'brosur'" x-transition class="bg-light p-10 lg:p-20 shadow-xl border-t-8 border-primary">
                        <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-10"><i class="fa fa-file-download text-primary mr-3"></i> Download Area</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-8 text-center group border border-transparent hover:border-primary transition-all">
                                <i class="fa fa-file-pdf text-5xl text-red-500 mb-6 group-hover:scale-110 transition-transform"></i>
                                <h5 class="font-bold text-navy uppercase mb-6">Brosur PPDB 2025</h5>
                                <a href="#" class="btn-edukate bg-navy text-white hover:bg-primary w-full py-2">Download PDF</a>
                            </div>
                            <div class="bg-white p-8 text-center group border border-transparent hover:border-primary transition-all">
                                <i class="fa fa-file-word text-5xl text-blue-500 mb-6 group-hover:scale-110 transition-transform"></i>
                                <h5 class="font-bold text-navy uppercase mb-6">Panduan Pendaftaran</h5>
                                <a href="#" class="btn-edukate bg-navy text-white hover:bg-primary w-full py-2">Download DOCX</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PPDB Section End -->
@endsection