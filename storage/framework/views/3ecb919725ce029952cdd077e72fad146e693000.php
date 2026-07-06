<?php $__env->startSection('content'); ?>
    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo e(asset('assets/images/room-1.jpg')); ?>');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <h1 class="subheading">My Bookings</h1>
                    <h1 class="mb-4"></h1>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <table class="table table-dark">
            <?php if($bookings->count() > 0): ?>
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">phone number</th>
                        <th scope="col">Check in</th>
                        <th scope="col">Check out</th>
                        <th scope="col">Days</th>
                        <th scope="col">Price</th>
                        <th scope="col">Room</th>
                        <th scope="col">Hotel</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row"><?php echo e($booking->id); ?></th>
                            <td><?php echo e($booking->name); ?></td>
                            <td><?php echo e($booking->email); ?></td>
                            <td><?php echo e($booking->phone_number); ?></td>
                            <td><?php echo e($booking->check_in); ?></td>
                            <td><?php echo e($booking->check_out); ?></td>
                            <td><?php echo e($booking->days); ?></td>
                            <td><?php echo e($booking->price); ?></td>
                            <td><?php echo e($booking->room_name); ?></td>
                            <td><?php echo e($booking->hotel_name); ?></td>
                            <td><?php echo e($booking->status); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Booking Yet !</h2>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/users/bookings.blade.php ENDPATH**/ ?>