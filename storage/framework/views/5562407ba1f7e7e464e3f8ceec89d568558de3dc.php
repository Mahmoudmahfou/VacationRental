<?php $__env->startSection('content'); ?>
    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo e(asset('assets/images/room-1.jpg')); ?>');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <h2 class="subheading">You Booked This Room Successfully</h2>
                    <h1 class="mb-4"></h1>
                    <p><a href="<?php echo e(route('home')); ?>" class="btn btn-primary">Go Home</a></p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/hotels/success.blade.php ENDPATH**/ ?>