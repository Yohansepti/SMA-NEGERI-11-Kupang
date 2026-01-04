@extends('layouts.main')

@section('title', 'Berita & Informasi - SMAN 11 KUPANG')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Berita & <span class="text-primary italic">Informasi</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="{{ route('home') }}" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Berita</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- News Section Start -->
    <section class="pb-16 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            @if($news->count() > 0)
            <!-- News Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($news as $item)
                <div class="bg-white group overflow-hidden shadow-xl">
                    <div class="relative h-64 overflow-hidden">
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $item->title }}">
                        @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->title) }}&background=2878eb&color=fff&size=500" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" alt="{{ $item->title }}">
                        @endif
                        <div class="absolute top-6 left-0 bg-primary text-white py-1 px-4 text-xs font-black uppercase tracking-widest">
                            {{ $item->created_at->format('d M Y') }}
                        </div>
                    </div>
                    <div class="p-10 border border-t-0 border-slate-100">
                        <div class="flex items-center text-xs font-bold text-primary uppercase mb-6 space-x-4">
                            <span><i class="fa fa-user mr-1"></i> Admin</span>
                            <span><i class="fa fa-tag mr-1 text-secondary"></i> {{ $item->category }}</span>
                        </div>
                        <h4 class="text-xl font-black text-navy mb-8 leading-tight group-hover:text-primary transition-colors min-h-[56px]">{{ $item->title }}</h4>
                        <div class="flex justify-between items-center pt-8 border-t border-light mt-auto">
                            <a href="#" class="font-black text-xs uppercase text-primary flex items-center group/btn">
                                Read More <i class="fa fa-angle-right ml-2 group-hover/btn:pl-2 transition-all"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($news->hasPages())
            <div class="mt-24 flex justify-center space-x-3">
                {{ $news->links() }}
            </div>
            @endif
            @else
            <!-- Empty State -->
            <div class="text-center py-32">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-light rounded-full mb-8">
                    <i class="fas fa-newspaper text-6xl text-slate-300"></i>
                </div>
                <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-4">Belum Ada Berita</h3>
                <p class="text-slate-500 text-lg max-w-md mx-auto">Berita dan informasi terbaru belum ditambahkan. Silakan kembali lagi nanti untuk update terkini.</p>
            </div>
            @endif
        </div>
    </section>
@endsection