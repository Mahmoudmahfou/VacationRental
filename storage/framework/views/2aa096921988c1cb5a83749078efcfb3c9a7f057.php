<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <?php if(session()->has('success')): ?>
                            <h4 class="alert alert-success mt-3 text-center w-50 m-auto" role="alert">
                                <?php echo e(session('success')); ?>

                            </h4>
                        <?php endif; ?>
                        <h5 class="card-title mb-4 d-inline">Rooms</h5>
                        <a href="<?php echo e(route('rooms.create')); ?>" class="btn btn-primary mb-4 text-center float-right">Create
                            Room</a>
                        <?php if($allRooms->count() > 0): ?>
                            <table class="table table-dark">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">image</th>
                                        <th scope="col">price</th>
                                        <th scope="col">num of persons</th>
                                        <th scope="col">size</th>
                                        <th scope="col">view</th>
                                        <th scope="col">num of beds</th>
                                        <th scope="col">hotel id</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $allRooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr class="text-center">
                                            <th scope="row"><?php echo e($room->id); ?></th>
                                            <td><?php echo e($room->name); ?></td>
                                            <td><img src="<?php echo e(asset('assets/images/' . $room->image . '')); ?>"
                                                    style="width: 80px" alt="no upload image"></td>
                                            <td>$<?php echo e($room->price); ?></td>
                                            <td><?php echo e($room->max_persons); ?></td>
                                            <td><?php echo e($room->size); ?></td>
                                            <td><?php echo e($room->view); ?></td>
                                            <td><?php echo e($room->num_bed); ?></td>
                                            <td><?php echo e($room->hotel_id); ?></td>
                                            <td><a href="<?php echo e(route('rooms.delete',$room->id)); ?>"
                                                    class="btn btn-danger  text-center ">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Rooms Yet !</h2>
                        <?php endif; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/admins/allrooms.blade.php ENDPATH**/ ?>