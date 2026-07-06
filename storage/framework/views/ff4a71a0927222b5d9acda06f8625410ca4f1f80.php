<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <?php if(Session::has('error')): ?>
                        <h4 class="alert alert-danger m-auto text-center" style="color:red;width: 25%;"><?php echo e(Session::get('error')); ?>

                        </h4>
                    <?php endif; ?>
                    <h5 class="card-title mt-2">Login</h5>
                    <form method="POST" class="p-auto" action="<?php echo e(route('check.login')); ?>">
                        <?php echo csrf_field(); ?>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form2Example1" class="form-control"
                                placeholder="Email" />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example2" placeholder="Password"
                                class="form-control" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit"
                            class="btn btn-primary btn-block mb-4 text-center">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/admins/login.blade.php ENDPATH**/ ?>