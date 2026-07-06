<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?php if(session()->has('success')): ?>
                        <h4 class="alert alert-success mt-3 text-center w-50 m-auto" role="alert">
                            <?php echo e(session('success')); ?>

                        </h4>
                    <?php endif; ?>
                    <?php if(session()->has('Deleted')): ?>
                        <h4 class="alert alert-danger mt-3 text-center w-50 m-auto" role="alert">
                            <?php echo e(session('Deleted')); ?>

                        </h4>
                    <?php endif; ?>
                    <h5 class="card-title mb-4 d-inline">Bookings</h5>
                    <?php if($bookings->count() > 0): ?>
                        <table class="table table-responsive table-dark mt-3">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">id</th>
                                    <th scope="col">check in</th>
                                    <th scope="col">check out</th>
                                    <th scope="col">email</th>
                                    <th scope="col">phone number</th>
                                    <th scope="col">full name</th>
                                    <th scope="col">hotel name</th>
                                    <th scope="col">room name</th>
                                    <th scope="col">status</th>
                                    <th scope="col">payment</th>
                                    <th scope="col">change status</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($booking->id); ?></th>
                                        <td><?php echo e($booking->check_in); ?></td>
                                        <td><?php echo e($booking->check_out); ?></td>
                                        <td><?php echo e($booking->email); ?></td>
                                        <td><?php echo e($booking->phone_number); ?></td>
                                        <td><?php echo e($booking->name); ?></td>
                                        <td><?php echo e($booking->hotel_name); ?></td>
                                        <td><?php echo e($booking->room_name); ?></td>
                                        <td><?php echo e($booking->status); ?></td>
                                        <td>$<?php echo e($booking->price); ?></td>
                                        <td><a href="<?php echo e(route('edit.status', $booking->id)); ?>"
                                                class="btn btn-warning  text-center ">change status</a></td>
                                        <td><a href="<?php echo e(route('bookings.delete', $booking->id)); ?>"
                                                class="btn btn-danger  text-center ">delete</a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Bookings Yet !</h2>
                    <?php endif; ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/admins/allbookings.blade.php ENDPATH**/ ?>