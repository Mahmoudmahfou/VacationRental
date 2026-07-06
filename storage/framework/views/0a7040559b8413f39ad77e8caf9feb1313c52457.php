<?php $__env->startSection('content'); ?>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo e(asset('assets/images/image_2.jpg')); ?>');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs mb-2"><span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Rooms <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-0 bread">Apartment Room</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light ftco-no-pt ftco-no-pb">
        <div class="container-fluid px-md-0">
            <div class="row no-gutters">
                <?php $__currentLoopData = $getRooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6">
                    <div class="room-wrap d-md-flex">
                        <a href="<?php echo e(route('hotels.rooms.details',$room->id)); ?>" class="img" style="background-image: url(<?php echo e(asset('assets/images/'. $room->image.'')); ?>);"></a>
                        <div class="half left-arrow d-flex align-items-center">
                            <div class="text p-4 p-xl-5 text-center">
                                <p class="star mb-0"><span class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span><span class="fa fa-star"></span><span
                                        class="fa fa-star"></span></p>
                                <p class="mb-0"><span class="price mr-1">$<?php echo e($room->price); ?></span> <span class="per">per
                                        night</span></p>
                                <h3 class="mb-3"><a href="<?php echo e(route('hotels.rooms.details',$room->id)); ?>"><?php echo e($room->name); ?></a></h3>
                                <ul class="list-accomodation">
                                    <li><span>Max:</span> <?php echo e($room->max_persons); ?> Persons</li>
                                    <li><span>Size:</span> <?php echo e($room->size); ?> m2</li>
                                    <li><span>View:</span> <?php echo e($room->view); ?></li>
                                    <li><span>Bed:</span> <?php echo e($room->num_bed); ?></li>
                                </ul>
                                <p class="pt-1"><a href="<?php echo e(route('hotels.rooms.details',$room->id)); ?>" class="btn-custom px-3 py-2">View Room Details
                                        <span class="icon-long-arrow-right"></span></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/hotels/rooms.blade.php ENDPATH**/ ?>