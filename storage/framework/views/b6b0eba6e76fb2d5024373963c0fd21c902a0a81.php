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
                        <?php if(session()->has('error')): ?>
                            <h4 class="alert alert-danger mt-3 text-center w-50 m-auto" role="alert">
                                <?php echo e(session('error')); ?>

                            </h4>
                        <?php endif; ?>
                        <h5 class="card-title mb-4 d-inline">Admins</h5>
                        <a href="<?php echo e(route('admins.create')); ?>" class="btn btn-primary mb-4 text-center float-right">Create
                            Admins</a>
                        <?php if($allAdmins->count() > 0): ?>
                            <table class="table mt-2 table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">username</th>
                                        <th scope="col">email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $allAdmins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <th scope="row"><?php echo e($admin->id); ?></th>
                                            <td><?php echo e($admin->name); ?></td>
                                            <td><?php echo e($admin->email); ?></td>
                                            <td><a href="<?php echo e(route('admins.delete', $admin->id)); ?>"
                                                    class="btn btn-danger  text-center ">Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <h2 class="alert alert-info text-center m-3 mx-auto w-75">No Admins Yet !</h2>
                        <?php endif; ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/admins/alladmins.blade.php ENDPATH**/ ?>