<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hotels</h5>
                    <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
                    <p class="card-text ">number of hotels: <span class="badge badge-primary" style="font-size: 18px">
                            <?php echo e($hotelsCount); ?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Rooms</h5>
                    <p class="card-text">number of rooms: <span class="badge badge-primary" style="font-size: 18px">
                            <?php echo e($roomsCount); ?></span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>

                    <p class="card-text">number of admins: <span class="badge badge-danger"
                            style="font-size: 18px"><?php echo e($adminsCount); ?></span></p>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/admins/index.blade.php ENDPATH**/ ?>