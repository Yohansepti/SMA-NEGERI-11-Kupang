

<?php $__env->startSection('title', 'Guru & Pegawai - SMAN 11 KUPANG'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Guru & <span class="text-primary italic">Pegawai</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Profile</span>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Guru & Pegawai</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Team Section Start -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center mb-20">
                <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">FACULTY MEMBERS</div>
                <h2 class="text-4xl lg:text-5xl font-black text-navy uppercase tracking-tighter leading-tight">Berkenalan Dengan <span class="text-primary italic">Pendidik</span> Kami</h2>
            </div>

            <?php if($staff->count() > 0): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <?php $__currentLoopData = $staff; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $person): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group">
                    <div class="relative overflow-hidden mb-8 shadow-xl">
                        <?php if($person->image): ?>
                        <img src="<?php echo e(asset('storage/' . $person->image)); ?>" class="w-full h-80 object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100" alt="<?php echo e($person->name); ?>">
                        <?php else: ?>
                        <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($person->name)); ?>&background=f2f2f2&color=120f2d&size=500" class="w-full h-80 object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-110 group-hover:scale-100" alt="<?php echo e($person->name); ?>">
                        <?php endif; ?>
                        <div class="absolute bottom-0 left-0 right-0 p-6 bg-primary flex justify-center space-x-6 opacity-0 group-hover:opacity-100 translate-y-full group-hover:translate-y-0 transition-all duration-500">
                            <a href="#" class="text-white hover:text-navy transition-colors text-xl"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-white hover:text-navy transition-colors text-xl"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-white hover:text-navy transition-colors text-xl"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="text-xl font-black text-navy uppercase mb-2"><?php echo e($person->name); ?></h5>
                        <p class="text-xs font-black text-primary uppercase tracking-[0.2em]"><?php echo e($person->role); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <!-- Empty State -->
            <div class="text-center py-32">
                <div class="inline-flex items-center justify-center w-32 h-32 bg-light rounded-full mb-8">
                    <i class="fas fa-users text-6xl text-slate-300"></i>
                </div>
                <h3 class="text-3xl font-black text-navy uppercase tracking-tighter mb-4">Data Belum Tersedia</h3>
                <p class="text-slate-500 text-lg max-w-md mx-auto">Data guru dan pegawai belum ditambahkan oleh administrator. Silakan hubungi admin untuk informasi lebih lanjut.</p>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!-- Team Section End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\projectKP\resources\views/profil/gurupegawai.blade.php ENDPATH**/ ?>