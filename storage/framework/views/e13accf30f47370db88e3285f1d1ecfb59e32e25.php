<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Update Status</h5>
                    <p class="mt-3 text-secondary">Email : <b><?php echo e($getData->email); ?></b></p>
                    <p class="mt-3 text-secondary">Current status : <b><?php echo e($getData->status); ?></b></p>
                    <form method="POST" action="<?php echo e(route('status.update', $getData->id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <!-- Email input -->
                        <h4 class="w-50 text-success">Choose status</h4>
                        <select name="status" style="margin-top: 15px;" class="form-control">
                            <?php if($getData->status == 'Processing'): ?>
                                <option value="Processing">Processing</option>
                                <option value="Booked Successfully">Booked Successfully</option>
                            <?php else: ?>
                                <option value="Booked Successfully">Booked Successfully</option>
                                <option value="Processing">Processing</option>
                            <?php endif; ?>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger mt-2"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                        <!-- Submit button -->
                        <button style="margin-top: 10px; font-size: 19px" type="submit" name="submit"
                            class="btn btn-primary btn-block mb-4 text-center">
                            Update Status
                        </button>


                    </form>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laravel\vaction-rental\resources\views/admins/updatestatus.blade.php ENDPATH**/ ?>