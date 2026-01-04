<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - SMA NEGERI 11 KUPANG</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts: Jost & Open Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        :root {
            --primary: #2878eb;
            --secondary: #f14d5d;
            --navy: #120f2d;
        }
        body { font-family: 'Open Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Jost', sans-serif; }
        .login-mesh {
            background-color: var(--navy);
            background-image: 
                radial-gradient(at 0% 0%, hsla(217, 83%, 54%, 0.3) 0, transparent 50%), 
                radial-gradient(at 100% 100%, hsla(354, 87%, 62%, 0.2) 0, transparent 50%);
        }
        .text-primary { color: var(--primary); }
        .bg-primary { background-color: var(--primary); }
    </style>
</head>
<body class="login-mesh min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-md">
        <!-- Logo/Header -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 mb-6 group hover:scale-110 transition-transform duration-500">
                <img src="{{ asset('images/logo_sekolah.png') }}" alt="Logo" class="w-full h-full object-contain">
            </div>
            <h1 class="text-4xl font-black text-white uppercase tracking-tighter">Admin <span class="text-primary italic">Portal</span></h1>
            <p class="text-white/50 text-xs mt-3 font-bold uppercase tracking-widest">SMA NEGERI 11 KUPANG</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white/5 backdrop-blur-2xl p-10 rounded-0 border border-white/10 shadow-2xl relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-primary/20 blur-3xl -mr-16 -mt-16"></div>
            
            @if($errors->any())
                <div class="bg-red-500/20 border border-red-500/50 backdrop-blur-md p-4 mb-8">
                    <ul class="text-red-200 text-xs font-bold uppercase tracking-tighter">
                        @foreach($errors->all() as $error)
                            <li class="flex items-center gap-2">
                                <i class="fas fa-circle-exclamation"></i> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login') }}" class="space-y-8">
                @csrf
                <div>
                    <label class="block text-white/70 text-xs font-bold uppercase tracking-[0.2em] mb-4">Email Address</label>
                    <div class="relative group">
                        <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-white/30 group-focus-within:text-primary transition-colors"></i>
                        <input type="email" name="email" required class="w-full h-14 bg-white/5 border border-white/10 rounded-0 pl-12 pr-6 text-white placeholder-white/20 focus:outline-none focus:border-primary transition-all font-semibold" placeholder="name@school.id">
                    </div>
                </div>

                <div>
                    <label class="block text-white/70 text-xs font-bold uppercase tracking-[0.2em] mb-4">Secure Password</label>
                    <div class="relative group" x-data="{ show: false }">
                        <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-white/30 group-focus-within:text-primary transition-colors"></i>
                        <input :type="show ? 'text' : 'password'" name="password" required class="w-full h-14 bg-white/5 border border-white/10 rounded-0 pl-12 pr-12 text-white placeholder-white/20 focus:outline-none focus:border-primary transition-all font-semibold" placeholder="••••••••">
                        <button type="button" @click="show = !show" class="absolute right-5 top-1/2 -translate-y-1/2 text-white/30 hover:text-white transition-colors">
                            <i class="fas" :class="show ? 'fa-eye-slash' : 'fa-eye'"></i>
                        </button>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full h-14 bg-primary text-white font-black uppercase tracking-widest shadow-xl shadow-primary/20 hover:bg-white hover:text-navy transition-all duration-300">
                        Access Dashboard
                    </button>
                </div>
            </form>

            <div class="mt-10 text-center border-t border-white/5 pt-8">
                <a href="/" class="text-white/40 hover:text-primary text-xs font-black uppercase tracking-widest transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Website
                </a>
            </div>
        </div>

        <!-- Footer -->
        <p class="text-center text-white/30 text-[10px] mt-12 font-black uppercase tracking-[0.3em]">
            &copy; 2025 SMA NEGERI 11 KUPANG
        </p>
    </div>

    <!-- Script to enable interaction -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>