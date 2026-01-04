

<?php $__env->startSection('title', 'Hubungi Kami - SMAN 11 KUPANG'); ?>

<?php $__env->startSection('content'); ?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-navy py-16 mb-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-64 h-64 bg-primary rounded-full -mr-32 -mt-32"></div>
        </div>
        <div class="container mx-auto px-4 lg:px-10 text-center relative z-10">
            <h1 class="text-white text-4xl lg:text-5xl font-black uppercase tracking-tighter mb-4">Contact <span class="text-primary italic">Us</span></h1>
            <div class="flex items-center justify-center space-x-3 text-white/60 text-[10px] font-black uppercase tracking-widest">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-primary transition-colors">Home</a>
                <span class="w-1 h-1 bg-primary rounded-full"></span>
                <span class="text-white">Contact</span>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Content Start -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-4 lg:px-10">
            <div class="text-center max-w-3xl mx-auto mb-20">
                <div class="inline-block bg-secondary text-white text-xs font-black px-4 py-1 mb-6 uppercase tracking-widest">GET IN TOUCH</div>
                <h2 class="text-4xl lg:text-5xl font-black text-navy uppercase tracking-tighter leading-tight">Kami Siap <span class="text-primary italic">Membantu</span> Anda</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
                <!-- Contact Info Cards -->
                <div class="space-y-8">
                    <div class="bg-light p-10 flex items-start space-x-8">
                        <div class="w-16 h-16 bg-primary flex items-center justify-center text-white text-3xl shrink-0">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-black text-navy uppercase mb-3 leading-none">Lokasi Sekolah</h5>
                            <p class="text-text leading-relaxed font-semibold">Jl. M. Praja, Kec. Alak, Kota Kupang, Nusa Tenggara Timur</p>
                        </div>
                    </div>

                    <div class="bg-light p-10 flex items-start space-x-8">
                        <div class="w-16 h-16 bg-secondary flex items-center justify-center text-white text-3xl shrink-0">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-black text-navy uppercase mb-3 leading-none">Telepon & WhatsApp</h5>
                            <p class="text-text leading-relaxed font-semibold">+62 812 3456 7890 (Admin)</p>
                        </div>
                    </div>

                    <div class="bg-light p-10 flex items-start space-x-8">
                        <div class="w-16 h-16 bg-primary flex items-center justify-center text-white text-3xl shrink-0">
                            <i class="fa fa-envelope-open"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-black text-navy uppercase mb-3 leading-none">Alamat Email</h5>
                            <p class="text-text leading-relaxed font-semibold">info@sman11kupang.sch.id</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-white p-12 shadow-2xl border-t-4 border-primary">
                    <h3 class="text-2xl font-black text-navy uppercase mb-10 tracking-tighter">Kirim Pesan <span class="text-primary italic">Sekarang</span></h3>
                    <form action="#" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <input type="text" placeholder="Nama Lengkap" class="w-full bg-light border-0 py-4 px-6 focus:ring-2 focus:ring-primary focus:outline-none font-bold placeholder:text-navy/20">
                            <input type="email" placeholder="Alamat Email" class="w-full bg-light border-0 py-4 px-6 focus:ring-2 focus:ring-primary focus:outline-none font-bold placeholder:text-navy/20">
                        </div>
                        <input type="text" placeholder="Subjek Pesan" class="w-full bg-light border-0 py-4 px-6 focus:ring-2 focus:ring-primary focus:outline-none font-bold placeholder:text-navy/20">
                        <textarea rows="6" placeholder="Tuliskan pesan Anda di sini..." class="w-full bg-light border-0 py-4 px-6 focus:ring-2 focus:ring-primary focus:outline-none font-bold placeholder:text-navy/20"></textarea>
                        <button type="submit" class="btn-edukate bg-primary text-white hover:bg-navy w-full text-lg shadow-xl shadow-primary/20">Kirim Pesan Sekarang</button>
                    </form>
                </div>
            </div>

            <!-- Map Section -->
            <div class="mt-32 grayscale hover:grayscale-0 transition-all duration-700 shadow-2xl">
                 <iframe class="w-full h-[500px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11340.487010266014!2d123.5358040713374!3d-10.169117621935655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56834b680589df%3A0xc3f837943c4856b3!2sSMAN%2011%20KUPANG!5e0!3m2!1sid!2sid!4v1718712345678!5m2!1sid!2sid" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </section>
    <!-- Contact Content End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\projectKP\resources\views/kontak.blade.php ENDPATH**/ ?>