<!DOCTYPE html>
<html lang="id" x-data="{ 
    section: 'dashboard', 
    sidebarOpen: true,
    showModal: false,
    modalType: '',
    isEdit: false,
    formUrl: '',
    formData: {},
    openAddModal(type, url, defaults = {}) {
        this.modalType = type;
        this.isEdit = false;
        this.formUrl = url;
        this.formData = defaults; 
        this.showModal = true;
    },
    openEditModal(type, url, data) {
        this.modalType = type;
        this.isEdit = true;
        this.formUrl = url;
        this.formData = data;
        this.showModal = true;
    }
}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SMA NEGERI 11 KUPANG</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --primary: #2878eb;
            --secondary: #f14d5d;
            --navy: #120f2d;
            --light: #f2f2f2;
        }
        body { font-family: 'Open Sans', sans-serif; }
        h1, h2, h3, h4, h5, h6 { font-family: 'Jost', sans-serif; }
        [x-cloak] { display: none !important; }
        .sidebar-transition { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }
        .bg-navy { background-color: var(--navy); }
        .text-primary { color: var(--primary); }
        .bg-primary { background-color: var(--primary); }
        .btn-primary {
            background-color: var(--primary);
            color: white;
            padding: 0.625rem 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.75rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: var(--navy);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(40, 120, 235, 0.3);
        }
        .btn-secondary {
            background-color: var(--secondary);
            color: white;
            padding: 0.5rem 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.625rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn-secondary:hover {
            background-color: #d43c4c;
            transform: translateY(-2px);
        }
        .btn-outline {
            background-color: transparent;
            color: var(--navy);
            border: 2px solid var(--navy);
            padding: 0.5rem 1.25rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-size: 0.625rem;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-outline:hover {
            background-color: var(--navy);
            color: white;
        }
    </style>
</head>
<body class="bg-[#f8f9fa] text-slate-800 antialiased overflow-x-hidden">
    <!-- Success Alert -->
    <?php if(session('success')): ?>
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 3000)"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-2"
         class="fixed top-4 right-4 z-[9999] bg-green-500 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3">
        <i class="fas fa-check-circle text-2xl"></i>
        <span class="font-bold"><?php echo e(session('success')); ?></span>
        <button @click="show = false" class="ml-auto hover:text-green-100 transition-colors"><i class="fas fa-times"></i></button>
    </div>
    <?php endif; ?>

    <!-- Error Alert -->
    <?php if(session('error')): ?>
    <div x-data="{ show: true }" 
         x-show="show" 
         x-init="setTimeout(() => show = false, 5000)"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-2"
         class="fixed top-4 right-4 z-[9999] bg-red-500 text-white px-6 py-4 rounded-lg shadow-2xl flex items-center gap-3">
        <i class="fas fa-exclamation-circle text-2xl"></i>
        <span class="font-bold"><?php echo e(session('error')); ?></span>
        <button @click="show = false" class="ml-auto hover:text-red-100 transition-colors"><i class="fas fa-times"></i></button>
    </div>
    <?php endif; ?>

    <!-- Mobile Header -->
    <header class="lg:hidden h-16 bg-white border-b border-slate-200 flex items-center justify-between px-6 sticky top-0 z-40">
        <span class="font-black text-navy uppercase tracking-tight">ADMIN <span class="text-primary italic">PANEL</span></span>
        <button @click="sidebarOpen = !sidebarOpen" class="w-10 h-10 bg-slate-100 flex items-center justify-center text-slate-600">
            <i class="fas fa-bars"></i>
        </button>
    </header>

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0 lg:w-20'"
            class="sidebar-transition fixed lg:static inset-y-0 left-0 w-72 bg-navy text-white z-50 flex flex-col shadow-2xl"
        >
            <!-- Sidebar Header -->
            <div class="h-24 flex items-center px-8 shrink-0 border-b border-white/5">
                <div class="w-10 h-10 flex items-center justify-center mr-4 shrink-0">
                    <img src="<?php echo e(asset('images/logo_sekolah.png')); ?>" alt="Logo" class="w-full h-full object-contain">
                </div>
                <div :class="sidebarOpen ? 'opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity duration-300">
                    <div class="font-black uppercase tracking-tight leading-none text-lg">SMAN 11 <span class="text-primary italic">KPG</span></div>
                    <div class="text-[10px] text-white/40 uppercase tracking-[0.2em] mt-1 font-bold">Systems v3.0</div>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-0 py-6 space-y-1 overflow-y-auto">
                <div :class="sidebarOpen ? 'block' : 'hidden'" class="px-8 text-[10px] font-black text-white/20 uppercase tracking-[0.3em] mb-4">Main Navigation</div>
                
                <button @click="section = 'dashboard'" :class="section === 'dashboard' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-th-large text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">Dashboard</span>
                </button>

                <button @click="section = 'fasilitas'" :class="section === 'fasilitas' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-building text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">Fasilitas</span>
                </button>

                <button @click="section = 'ekskul'" :class="section === 'ekskul' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-running text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">Ekstrakurikuler</span>
                </button>

                <button @click="section = 'kurikulum'" :class="section === 'kurikulum' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-book-open text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">Kurikulum</span>
                </button>

                <div :class="sidebarOpen ? 'block' : 'hidden'" class="px-8 text-[10px] font-black text-white/20 uppercase tracking-[0.3em] mt-8 mb-4">Content Management</div>

                <button @click="section = 'berita'" :class="section === 'berita' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-newspaper text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">Kelola Berita</span>
                </button>

                <button @click="section = 'pengumuman'" :class="section === 'pengumuman' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-bullhorn text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">Pengumuman</span>
                </button>

                <button @click="section = 'staff'" :class="section === 'staff' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-users text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">Guru & Pegawai</span>
                </button>

                <button @click="section = 'ppdb'" :class="section === 'ppdb' ? 'bg-primary text-white border-white' : 'text-white/50 hover:bg-white/5 hover:text-white border-transparent'" class="w-full flex items-center h-14 px-8 transition-all group shrink-0 border-l-4">
                    <i class="fas fa-user-plus text-lg shrink-0 w-6"></i>
                    <span :class="sidebarOpen ? 'ml-4 opacity-100' : 'opacity-0 lg:hidden'" class="transition-opacity text-xs font-black uppercase tracking-[0.1em]">PPDB Online</span>
                </button>
            </nav>
        </aside>

        <!-- Main Workspace -->
        <main class="flex-1 flex flex-col min-w-0 bg-[#f4f7f6]">
            <!-- Topbar -->
            <div class="h-24 bg-white border-b border-slate-200 px-10 flex items-center justify-between sticky top-0 z-30 shadow-sm">
                <div class="flex items-center gap-4">
                    <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:flex w-10 h-10 bg-light items-center justify-center text-navy hover:bg-primary hover:text-white transition-all">
                        <i class="fas" :class="sidebarOpen ? 'fa-chevron-left' : 'fa-bars'"></i>
                    </button>
                    <div>
                        <h2 class="text-2xl font-black text-navy uppercase tracking-tighter" x-text="section.replace('-', ' ')">Dashboard</h2>
                        <div class="flex items-center text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">
                            <i class="fa fa-clock mr-2 text-primary"></i> 
                            <span id="live-time">Loading...</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <!-- User Dropdown Menu -->
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center gap-4 hover:bg-light px-4 py-2 transition-all">
                            <div class="hidden md:flex flex-col text-right">
                                <span class="text-sm font-black text-navy uppercase leading-none">Super Administrator</span>
                                <span class="text-[9px] text-primary uppercase font-black tracking-[0.2em] mt-2">Active Privileges</span>
                            </div>
                            <div class="w-12 h-12 bg-light flex items-center justify-center border border-slate-200 overflow-hidden shadow-inner">
                                <img src="https://ui-avatars.com/api/?name=Admin&background=2878eb&color=fff" alt="Avatar">
                            </div>
                            <i class="fas fa-chevron-down text-slate-400 text-xs"></i>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-cloak x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 top-full mt-3 w-64 bg-white shadow-2xl border border-slate-200 z-50">
                            <div class="p-4 border-b border-slate-100">
                                <div class="text-xs font-black text-navy uppercase">Admin Panel</div>
                                <div class="text-[9px] text-slate-400 mt-1">Logged in as Administrator</div>
                            </div>
                            <div class="py-2">
                                <button @click="dropdownOpen = false; showModal = true; modalType = 'changePassword'" class="w-full flex items-center gap-3 px-6 py-3 text-sm font-bold text-slate-700 hover:bg-light transition-all">
                                    <i class="fas fa-key w-5 text-primary"></i>
                                    <span>Ganti Sandi</span>
                                </button>
                                <form method="POST" action="<?php echo e(route('admin.logout')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="w-full flex items-center gap-3 px-6 py-3 text-sm font-bold text-secondary hover:bg-red-50 transition-all">
                                        <i class="fas fa-sign-out-alt w-5"></i>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="p-10">
                <!-- DASHBOARD SECTION -->
                <div x-show="section === 'dashboard'" x-cloak x-transition.opacity>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-0 shadow-2xl border border-light overflow-hidden">
                        <div class="bg-white p-10 border-r border-light relative group">
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Guru & Pegawai</div>
                            <div class="flex items-end justify-between">
                                <span class="text-5xl font-black text-navy leading-none"><?php echo e($staff->count()); ?></span>
                                <div class="w-12 h-12 bg-primary/10 flex items-center justify-center text-primary transition-transform group-hover:scale-110"><i class="fa fa-users"></i></div>
                            </div>
                        </div>
                        <div class="bg-primary p-10 relative group text-white border-r border-white/5">
                            <div class="text-[10px] font-black text-white/50 uppercase tracking-[0.2em] mb-4">Akademik</div>
                            <div class="flex items-end justify-between">
                                <span class="text-5xl font-black text-white leading-none"><?php echo e($academics->count()); ?></span>
                                <div class="w-12 h-12 bg-white/20 flex items-center justify-center text-white transition-transform group-hover:scale-110"><i class="fa fa-graduation-cap"></i></div>
                            </div>
                        </div>
                        <div class="bg-white p-10 border-r border-light relative group">
                            <div class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Berita</div>
                            <div class="flex items-end justify-between">
                                <span class="text-5xl font-black text-navy leading-none"><?php echo e($news->count()); ?></span>
                                <div class="w-12 h-12 bg-secondary/10 flex items-center justify-center text-secondary transition-transform group-hover:scale-110"><i class="fa fa-newspaper"></i></div>
                            </div>
                        </div>
                        <div class="bg-navy p-10 relative group text-white">
                            <div class="text-[10px] font-black text-white/20 uppercase tracking-[0.2em] mb-4">Pengumuman</div>
                            <div class="flex items-end justify-between">
                                <span class="text-5xl font-black text-white leading-none"><?php echo e($announcements->count()); ?></span>
                                <div class="w-12 h-12 bg-white/10 flex items-center justify-center text-white transition-transform group-hover:scale-110"><i class="fa fa-bullhorn"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-12 bg-white p-10 shadow-xl border border-light">
                        <h3 class="text-xl font-black text-navy uppercase tracking-tighter mb-8">Selamat Datang, Administrator!</h3>
                        <p class="text-slate-600 leading-relaxed">Gunakan menu di sidebar untuk mengelola konten website. Semua perubahan akan langsung tersimpan ke database.</p>
                    </div>
                </div>

                <!-- BERITA SECTION -->
                <div x-show="section === 'berita'" x-cloak x-transition.opacity>
                    <div class="bg-white shadow-2xl overflow-hidden border border-light">
                        <div class="p-10 border-b border-light flex justify-between items-center bg-white sticky top-0 z-10">
                            <h3 class="text-2xl font-black text-navy uppercase tracking-tighter">Daftar <span class="text-primary italic">Berita & Artikel</span></h3>
                            <button @click="openAddModal('news', '<?php echo e(route('admin.news.store')); ?>')" class="btn-primary">+ Tambah Berita</button>
                        </div>
                        <table class="w-full text-left">
                            <thead class="bg-light/50">
                                <tr>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Judul Artikel</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Kategori</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Status</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-light hover:bg-light/50 transition-colors">
                                    <td class="px-10 py-8">
                                        <div class="font-black text-navy uppercase text-sm"><?php echo e($item->title); ?></div>
                                        <div class="text-[10px] font-bold text-slate-400 mt-2 tracking-widest">SLUG: <?php echo e($item->slug); ?></div>
                                    </td>
                                    <td class="px-10 py-8 uppercase text-[10px] font-black text-primary"><?php echo e($item->category); ?></td>
                                    <td class="px-10 py-8"><span class="px-4 py-1 bg-green-100 text-green-600 text-[9px] font-black uppercase rounded-full"><?php echo e($item->is_published ? 'Published' : 'Draft'); ?></span></td>
                                    <td class="px-10 py-8">
                                        <div class="flex gap-2">
                                            <button @click="openEditModal('news', '<?php echo e(route('admin.news.update', $item->id)); ?>', <?php echo e($item); ?>)" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-edit text-xs"></i></button>
                                            <form method="POST" action="<?php echo e(route('admin.news.destroy', $item->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Yakin hapus berita ini?')" class="w-8 h-8 bg-secondary text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-trash text-xs"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="px-10 py-20 text-center text-slate-400">Belum ada berita.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PENGUMUMAN SECTION -->
                <div x-show="section === 'pengumuman'" x-cloak x-transition.opacity>
                    <div class="bg-white shadow-2xl overflow-hidden border border-light">
                        <div class="p-10 border-b border-light flex justify-between items-center bg-white sticky top-0 z-10">
                            <h3 class="text-2xl font-black text-navy uppercase tracking-tighter">Kelola <span class="text-secondary italic">Pengumuman</span></h3>
                            <button @click="openAddModal('announcement', '<?php echo e(route('admin.announcements.store')); ?>')" class="btn-secondary">+ Buat Pengumuman</button>
                        </div>
                        <table class="w-full text-left">
                            <thead class="bg-light/50">
                                <tr>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Isi Pengumuman</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Prioritas</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Status</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $announcement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-light hover:bg-light/50 transition-colors">
                                    <td class="px-10 py-8">
                                        <div class="font-black text-navy uppercase text-sm"><?php echo e($announcement->title); ?></div>
                                        <p class="text-[10px] font-bold text-slate-400 mt-2 italic capitalize"><?php echo e(Str::limit($announcement->content, 80)); ?></p>
                                    </td>
                                    <td class="px-10 py-8 uppercase text-[10px] font-black <?php echo e($announcement->priority === 'Urgent' ? 'text-red-500' : 'text-primary'); ?>">
                                        <?php echo e($announcement->priority); ?> 
                                        <?php if($announcement->priority === 'Urgent'): ?><i class="fa fa-exclamation-triangle ml-1"></i><?php endif; ?>
                                    </td>
                                    <td class="px-10 py-8"><span class="px-4 py-1 <?php echo e($announcement->is_active ? 'bg-green-100 text-green-600' : 'bg-gray-100 text-gray-600'); ?> text-[9px] font-black uppercase rounded-full"><?php echo e($announcement->is_active ? 'Aktif' : 'Nonaktif'); ?></span></td>
                                    <td class="px-10 py-8">
                                        <div class="flex gap-2">
                                            <button @click="openEditModal('announcement', '<?php echo e(route('admin.announcements.update', $announcement->id)); ?>', <?php echo e($announcement); ?>)" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-edit text-xs"></i></button>
                                            <form method="POST" action="<?php echo e(route('admin.announcements.destroy', $announcement->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Yakin hapus pengumuman ini?')" class="w-8 h-8 bg-secondary text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-trash text-xs"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="px-10 py-20 text-center text-slate-400">Belum ada pengumuman.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- FASILITAS SECTION -->
                <div x-show="section === 'fasilitas'" x-cloak x-transition.opacity>
                    <div class="bg-white shadow-2xl overflow-hidden border border-light">
                        <div class="p-10 border-b border-light flex justify-between items-center bg-white sticky top-0 z-10">
                            <h3 class="text-2xl font-black text-navy uppercase tracking-tighter">Kelola <span class="text-primary italic">Fasilitas Sekolah</span></h3>
                            <button @click="openAddModal('academic', '<?php echo e(route('admin.academics.store')); ?>', {type: 'fasilitas'})" class="btn-primary">+ Tambah Fasilitas</button>
                        </div>
                        <table class="w-full text-left">
                            <thead class="bg-light/50">
                                <tr>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Nama Fasilitas</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Deskripsi</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Gambar</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-light hover:bg-light/50 transition-colors">
                                    <td class="px-10 py-8">
                                        <div class="font-black text-navy uppercase text-sm"><?php echo e($item->title); ?></div>
                                    </td>
                                    <td class="px-10 py-8 text-sm text-slate-600"><?php echo e(Str::limit($item->description, 50)); ?></td>
                                    <td class="px-10 py-8">
                                        <?php if($item->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>" class="w-12 h-12 object-cover rounded-lg border border-slate-200" alt="<?php echo e($item->title); ?>">
                                        <?php else: ?>
                                        <span class="text-[10px] text-slate-400">No Img</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-10 py-8">
                                        <div class="flex gap-2">
                                            <button @click="openEditModal('academic', '<?php echo e(route('admin.academics.update', $item->id)); ?>', <?php echo e($item); ?>)" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-edit text-xs"></i></button>
                                            <form method="POST" action="<?php echo e(route('admin.academics.destroy', $item->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="w-8 h-8 bg-secondary text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-trash text-xs"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="px-10 py-20 text-center text-slate-400">Belum ada data fasilitas.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- EKSKUL SECTION -->
                <div x-show="section === 'ekskul'" x-cloak x-transition.opacity>
                    <div class="bg-white shadow-2xl overflow-hidden border border-light">
                        <div class="p-10 border-b border-light flex justify-between items-center bg-white sticky top-0 z-10">
                            <h3 class="text-2xl font-black text-navy uppercase tracking-tighter">Kelola <span class="text-primary italic">Ekstrakurikuler</span></h3>
                            <button @click="openAddModal('academic', '<?php echo e(route('admin.academics.store')); ?>', {type: 'ekskul'})" class="btn-primary">+ Tambah Ekskul</button>
                        </div>
                        <table class="w-full text-left">
                            <thead class="bg-light/50">
                                <tr>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Nama Ekstrakurikuler</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Deskripsi</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Gambar</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $ekskuls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-light hover:bg-light/50 transition-colors">
                                    <td class="px-10 py-8">
                                        <div class="font-black text-navy uppercase text-sm"><?php echo e($item->title); ?></div>
                                    </td>
                                    <td class="px-10 py-8 text-sm text-slate-600"><?php echo e(Str::limit($item->description, 50)); ?></td>
                                    <td class="px-10 py-8">
                                        <?php if($item->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->image)); ?>" class="w-12 h-12 object-cover rounded-lg border border-slate-200" alt="<?php echo e($item->title); ?>">
                                        <?php else: ?>
                                        <span class="text-[10px] text-slate-400">No Img</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-10 py-8">
                                        <div class="flex gap-2">
                                            <button @click="openEditModal('academic', '<?php echo e(route('admin.academics.update', $item->id)); ?>', <?php echo e($item); ?>)" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-edit text-xs"></i></button>
                                            <form method="POST" action="<?php echo e(route('admin.academics.destroy', $item->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="w-8 h-8 bg-secondary text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-trash text-xs"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="px-10 py-20 text-center text-slate-400">Belum ada data ekstrakurikuler.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- KURIKULUM SECTION -->
                <div x-show="section === 'kurikulum'" x-cloak x-transition.opacity>
                    <div class="bg-white shadow-2xl overflow-hidden border border-light">
                        <div class="p-10 border-b border-light flex justify-between items-center bg-white sticky top-0 z-10">
                            <h3 class="text-2xl font-black text-navy uppercase tracking-tighter">Kelola <span class="text-primary italic">Kurikulum</span></h3>
                            <button @click="openAddModal('academic', '<?php echo e(route('admin.academics.store')); ?>', {type: 'kurikulum'})" class="btn-primary">+ Tambah Data</button>
                        </div>
                        <table class="w-full text-left">
                            <thead class="bg-light/50">
                                <tr>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Judul</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Tipe</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Deskripsi</th>
                                    <th class="px-10 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $kurikulum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-light hover:bg-light/50 transition-colors">
                                    <td class="px-10 py-8">
                                        <div class="font-black text-navy uppercase text-sm"><?php echo e($academic->title); ?></div>
                                    </td>
                                    <td class="px-10 py-8 uppercase text-[10px] font-black text-primary"><?php echo e($academic->type); ?></td>
                                    <td class="px-10 py-8 text-sm text-slate-600"><?php echo e(Str::limit($academic->description, 50)); ?></td>
                                    <td class="px-10 py-8">
                                        <div class="flex gap-2">
                                            <button @click="openEditModal('academic', '<?php echo e(route('admin.academics.update', $academic->id)); ?>', <?php echo e($academic); ?>)" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-edit text-xs"></i></button>
                                            <form method="POST" action="<?php echo e(route('admin.academics.destroy', $academic->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="w-8 h-8 bg-secondary text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-trash text-xs"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="px-10 py-20 text-center text-slate-400">Belum ada data kurikulum.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- STAFF SECTION -->
                <div x-show="section === 'staff'" x-cloak x-transition.opacity>
                    <div class="bg-white shadow-2xl overflow-hidden border border-light overflow-x-auto">
                        <div class="p-10 border-b border-light flex justify-between items-center bg-white sticky top-0 z-10">
                            <h3 class="text-2xl font-black text-navy uppercase tracking-tighter">Data <span class="text-primary italic">Guru & Pegawai</span></h3>
                            <button @click="openAddModal('staff', '<?php echo e(route('admin.staff.store')); ?>')" class="btn-primary">+ Tambah Data</button>
                        </div>
                        <table class="w-full text-left whitespace-nowrap">
                            <thead class="bg-light/50">
                                <tr>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Nama</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">NUPTK</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">JK</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Tempat Lahir</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Tanggal Lahir</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">NIP</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Jenis PTK</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Foto</th>
                                    <th class="px-6 py-6 text-[10px] font-black text-navy uppercase tracking-widest">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="border-b border-light hover:bg-light/50 transition-colors">
                                    <td class="px-6 py-4 font-bold text-navy text-xs"><?php echo e($person->name); ?></td>
                                    <td class="px-6 py-4 text-xs text-slate-600"><?php echo e($person->nuptk ?? '-'); ?></td>
                                    <td class="px-6 py-4 text-xs text-slate-600"><?php echo e($person->gender); ?></td>
                                    <td class="px-6 py-4 text-xs text-slate-600"><?php echo e($person->birth_place); ?></td>
                                    <td class="px-6 py-4 text-xs text-slate-600"><?php echo e(\Carbon\Carbon::parse($person->birth_date)->format('d-m-Y')); ?></td>
                                    <td class="px-6 py-4 text-xs text-slate-600"><?php echo e($person->nip ?? '-'); ?></td>
                                    <td class="px-6 py-4 text-xs font-bold text-primary uppercase"><?php echo e($person->ptk_type); ?></td>
                                    <td class="px-6 py-4">
                                        <?php if($person->image): ?>
                                        <img src="<?php echo e(asset('storage/' . $person->image)); ?>" class="w-10 h-10 object-cover rounded-full border border-slate-200" alt="<?php echo e($person->name); ?>">
                                        <?php else: ?>
                                        <span class="text-[10px] text-slate-400">No Image</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex gap-2">
                                            <button @click="openEditModal('staff', '<?php echo e(route('admin.staff.update', $person->id)); ?>', <?php echo e($person); ?>)" class="w-8 h-8 bg-blue-500 text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-edit text-xs"></i></button>
                                            <form method="POST" action="<?php echo e(route('admin.staff.destroy', $person->id)); ?>">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="w-8 h-8 bg-secondary text-white flex items-center justify-center hover:bg-navy transition-all rounded"><i class="fa fa-trash text-xs"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="9" class="px-10 py-20 text-center text-slate-400">Belum ada data guru/pegawai.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- PPDB SECTION -->
                <div x-show="section === 'ppdb'" x-cloak x-transition.opacity>
                    <div class="bg-navy p-12 text-white shadow-2xl">
                        <div class="flex items-center gap-10">
                            <div class="w-24 h-24 bg-primary flex items-center justify-center text-5xl shrink-0"><i class="fa fa-id-card"></i></div>
                            <div>
                                <h3 class="text-4xl font-black uppercase tracking-tighter mb-4">Database <span class="text-primary italic">PPDB Online</span></h3>
                                <p class="text-lg opacity-60 max-w-2xl leading-relaxed mb-8">Modul ini menangani seluruh data pendaftaran calon siswa baru secara real-time.</p>
                                <button class="btn-primary">Lihat Daftar Pendaftar</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </main>
    </div>

    <!-- Modal (Universal) -->
    <div x-show="showModal" x-cloak class="fixed inset-0 bg-black/50 flex items-center justify-center z-[9999] p-4" @click.self="showModal = false">
        <div class="bg-white max-w-2xl w-full max-h-[90vh] overflow-y-auto shadow-2xl" @click.stop>
            <div class="p-8 border-b border-light flex justify-between items-center sticky top-0 bg-white z-10">
                <h3 class="text-xl font-black text-navy uppercase tracking-tighter">Form Input</h3>
                <button @click="showModal = false" class="w-10 h-10 bg-slate-100 flex items-center justify-center hover:bg-red-500 hover:text-white transition-all"><i class="fas fa-times"></i></button>
            </div>
            
            <!-- Profile Form -->
            <form x-show="modalType === 'profile'" method="POST" :action="formUrl" enctype="multipart/form-data" class="p-8 space-y-6">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT" x-bind:disabled="!isEdit">
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Judul</label>
                    <input type="text" name="title" x-model="formData.title" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Tipe</label>
                    <select name="type" x-model="formData.type" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                        <option value="">Pilih Tipe</option>
                        <option value="sejarah">Sejarah</option>
                        <option value="visimisi">Visi & Misi</option>
                        <option value="sambutan">Sambutan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Konten</label>
                    <textarea name="content" x-model="formData.content" rows="6" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Gambar (Optional)</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="btn-primary flex-1"><span x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Data'"></span></button>
                    <button type="button" @click="showModal = false" class="btn-outline flex-1">Batal</button>
                </div>
            </form>

            <!-- News Form -->
            <form x-show="modalType === 'news'" method="POST" :action="formUrl" enctype="multipart/form-data" class="p-8 space-y-6">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT" x-bind:disabled="!isEdit">
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Judul Berita</label>
                    <input type="text" name="title" x-model="formData.title" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Kategori</label>
                    <select name="category" x-model="formData.category" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                        <option value="Umum">Umum</option>
                        <option value="Informasi">Informasi</option>
                        <option value="Prestasi">Prestasi</option>
                        <option value="Kegiatan">Kegiatan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Konten Berita</label>
                    <textarea name="content" x-model="formData.content" rows="8" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Gambar</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_published" value="1" :checked="formData.is_published == 1" id="is_published" class="w-5 h-5">
                    <label for="is_published" class="text-sm font-bold text-navy">Publikasikan Berita</label>
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="btn-primary flex-1"><span x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Berita'"></span></button>
                    <button type="button" @click="showModal = false" class="btn-outline flex-1">Batal</button>
                </div>
            </form>

            <!-- Announcement Form -->
            <form x-show="modalType === 'announcement'" method="POST" :action="formUrl" class="p-8 space-y-6">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT" x-bind:disabled="!isEdit">
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Judul Pengumuman</label>
                    <input type="text" name="title" x-model="formData.title" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Isi Pengumuman</label>
                    <textarea name="content" x-model="formData.content" rows="6" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Prioritas</label>
                    <select name="priority" x-model="formData.priority" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                        <option value="Normal">Normal</option>
                        <option value="Urgent">Urgent</option>
                    </select>
                </div>
                <div class="flex items-center gap-3">
                    <input type="checkbox" name="is_active" value="1" :checked="formData.is_active == 1" id="is_active" class="w-5 h-5">
                    <label for="is_active" class="text-sm font-bold text-navy">Aktifkan Pengumuman</label>
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="btn-primary flex-1"><span x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Pengumuman'"></span></button>
                    <button type="button" @click="showModal = false" class="btn-outline flex-1">Batal</button>
                </div>
            </form>

            <!-- Academic Form -->
            <form x-show="modalType === 'academic'" method="POST" :action="formUrl" enctype="multipart/form-data" class="p-8 space-y-6">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT" x-bind:disabled="!isEdit">
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Judul</label>
                    <input type="text" name="title" x-model="formData.title" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Tipe</label>
                    <select name="type" x-model="formData.type" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                        <option value="">Pilih Tipe</option>
                        <option value="fasilitas">Fasilitas</option>
                        <option value="ekskul">Ekstrakurikuler</option>
                        <option value="kurikulum">Kurikulum</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Deskripsi Singkat</label>
                    <textarea name="description" x-model="formData.description" rows="3" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Konten Detail</label>
                    <textarea name="content" x-model="formData.content" rows="6" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Gambar</label>
                    <input type="file" name="image" accept="image/*" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none">
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="btn-primary flex-1"><span x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Data'"></span></button>
                    <button type="button" @click="showModal = false" class="btn-outline flex-1">Batal</button>
                </div>
            </form>

            <!-- Staff Form -->
            <form x-show="modalType === 'staff'" method="POST" :action="formUrl" enctype="multipart/form-data" class="p-8 space-y-6">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="_method" value="PUT" x-bind:disabled="!isEdit">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" name="name" x-model="formData.name" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">NUPTK (Opsional)</label>
                        <input type="text" name="nuptk" x-model="formData.nuptk" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Jenis Kelamin <span class="text-red-500">*</span></label>
                        <select name="gender" x-model="formData.gender" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Tempat Lahir <span class="text-red-500">*</span></label>
                        <input type="text" name="birth_place" x-model="formData.birth_place" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Tanggal Lahir <span class="text-red-500">*</span></label>
                        <input type="date" name="birth_date" x-model="formData.birth_date" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">NIP (Opsional)</label>
                        <input type="text" name="nip" x-model="formData.nip" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Jenis PTK <span class="text-red-500">*</span></label>
                        <input type="text" name="ptk_type" x-model="formData.ptk_type" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy" placeholder="Contoh: Guru Mapel, Kepala Sekolah">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Foto (Opsional)</label>
                        <input type="file" name="image" accept="image/*" class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none">
                    </div>
                </div>
                <div class="flex gap-4 pt-4 border-t border-light mt-6">
                    <button type="submit" class="btn-primary flex-1"><span x-text="isEdit ? 'Simpan Perubahan' : 'Simpan Data'"></span></button>
                    <button type="button" @click="showModal = false" class="btn-outline flex-1">Batal</button>
                </div>
            </form>

            <!-- Change Password Form -->
            <form x-show="modalType === 'changePassword'" method="POST" action="<?php echo e(route('admin.password.change')); ?>" class="p-8 space-y-6">
                <?php echo csrf_field(); ?>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Password Lama</label>
                    <input type="password" name="current_password" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Password Baru</label>
                    <input type="password" name="new_password" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-navy uppercase tracking-[0.2em] mb-3">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" required class="w-full bg-light border-0 p-4 focus:ring-2 focus:ring-primary focus:outline-none font-semibold text-navy">
                </div>
                <div class="flex gap-4">
                    <button type="submit" class="btn-primary flex-1">Simpan Password</button>
                    <button type="button" @click="showModal = false" class="btn-outline flex-1">Batal</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Live Clock Script -->
    <script>
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `Live Server Time: ${hours}:${minutes}:${seconds}`;
            
            const clockElement = document.getElementById('live-time');
            if (clockElement) {
                clockElement.textContent = timeString;
            }
        }

        // Update clock immediately and then every second
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html><?php /**PATH C:\laragon\www\projectKP\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>