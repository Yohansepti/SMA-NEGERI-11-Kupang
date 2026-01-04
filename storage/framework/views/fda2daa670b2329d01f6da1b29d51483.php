

<?php $__env->startSection('title', 'Pengumuman - SMAN 11 KUPANG'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Informasi & <span class="text-primary italic">Pengumuman</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Pengumuman</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Announcements Section Start -->
    <section class="py-24 bg-white overflow-hidden">
        <div class="container mx-auto px-4 lg:px-10">
            <?php if($announcements->count() > 0): ?>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-20">
                <!-- Sidebar Info -->
                <div class="lg:col-span-4">
                    <div class="sticky top-32">
                        <div class="bg-light p-10 border-l-8 border-primary mb-10">
                            <h4 class="text-2xl font-black text-navy uppercase tracking-tighter mb-6">Pusat Informasi</h4>
                            <p class="text-sm leading-relaxed text-text font-medium">Halaman ini memuat seluruh pengumuman resmi, jadwal kegiatan, dan informasi penting lainnya untuk seluruh civitas akademika SMAN 11 Kupang.</p>
                        </div>
                        
                        <div class="bg-navy p-10 text-white">
                            <h5 class="text-xl font-black uppercase tracking-tighter mb-6">Perlu Bantuan?</h5>
                            <p class="text-xs font-medium text-white/60 mb-8 leading-relaxed">Jika ada hal yang kurang jelas terkait pengumuman, silakan hubungi bagian tata usaha sekolah.</p>
                            <a href="<?php echo e(route('kontak')); ?>" class="text-xs font-black uppercase tracking-widest text-primary hover:text-white transition-colors">Hubungi Kami <i class="fa fa-arrow-right ml-2"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Announcement List -->
                <div class="lg:col-span-8 space-y-12">
                    <?php $__currentLoopData = $announcements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group relative bg-white border border-light p-12 hover:shadow-2xl transition-all duration-500 <?php echo e($item->priority === 'Urgent' ? 'border-l-8 border-l-secondary' : 'border-l-8 border-l-primary'); ?>">
                        <div class="flex items-center space-x-4 mb-6">
                            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-navy/40"><?php echo e($item->created_at->format('d M Y')); ?></span>
                            <?php if($item->priority === 'Urgent'): ?>
                                <span class="bg-secondary text-white text-[9px] font-black px-3 py-1 uppercase tracking-widest animate-pulse">Urgent</span>
                            <?php endif; ?>
                        </div>
                        <h3 class="text-2xl lg:text-3xl font-black text-navy uppercase tracking-tighter mb-6 group-hover:text-primary transition-colors leading-tight"><?php echo e($item->title); ?></h3>
                        <p class="text-text leading-relaxed font-medium mb-8"><?php echo e($item->content); ?></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-32">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-light rounded-full mb-8">
                    <i class="fas fa-bullhorn text-6xl text-slate-300"></i>
                </div>
                <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-4">Belum Ada Pengumuman</h3>
                <p class="text-slate-500 text-lg max-w-md mx-auto">Saat ini belum ada pengumuman atau informasi terbaru. Silakan cek kembali nanti.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Announcements Section End -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\projectKP\resources\views/pengumuman.blade.php ENDPATH**/ ?>