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
                        <h5 class="card-title mb-4 d-inline">Hotels</h5>
                        <a href="<?php echo e(route('hotels.create')); ?>" class="btn btn-primary mb-4 text-center float-right">Create
                            Hotels</a>
                        <?php if($allHotels->count() > 0): ?>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">name</th>
                                        <th scope="col">location</th>
                                        <th scope="col">description</th>
                                        <th scope="col">update</th>
                                        <th scope="col">delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $allHotels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hotel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($hotel->id); ?></th>
                                            <td><?php echo e($hotel->name); ?></td>
                                            <td><?php echo e($hotel->location); ?></td>
                                            <td><?php echo e($hotel->description); ?></td>
                                            <td><a href="<?php echo e(route('hotels.edit', $hotel->id)); ?>"
                                                    class="btn btn-warning text-white text-center ">Update
                                                </a></td>
                                            <td><a href="<?php echo e(route('hotels.delete', $hotel->id)); ?>"
                                                    class="btn btn-danger  text-center ">Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Hotels Yet !</h2>
                        <?php endif; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/admins/allhotels.blade.php ENDPATH**/ ?>