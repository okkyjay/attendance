<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="<?php echo e($settings1['column_class']); ?>">
                                <div class="card text-white bg-primary">
                                    <div class="card-body pb-0">
                                        <div class="text-value"><?php echo e(number_format($settings1['total_number'])); ?></div>
                                        <div><?php echo e($settings1['chart_title']); ?></div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="<?php echo e($settings2['column_class']); ?>">
                                <div class="card text-white bg-primary">
                                    <div class="card-body pb-0">
                                        <div class="text-value"><?php echo e(number_format($settings2['total_number'])); ?></div>
                                        <div><?php echo e($settings2['chart_title']); ?></div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="<?php echo e($settings3['column_class']); ?>">
                                <div class="card text-white bg-primary">
                                    <div class="card-body pb-0">
                                        <div class="text-value"><?php echo e(number_format($settings3['total_number'])); ?></div>
                                        <div><?php echo e($settings3['chart_title']); ?></div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                            <div class="<?php echo e($settings4['column_class']); ?>">
                                <div class="card text-white bg-primary">
                                    <div class="card-body pb-0">
                                        <div class="text-value"><?php echo e(number_format($settings4['total_number'])); ?></div>
                                        <div><?php echo e($settings4['chart_title']); ?></div>
                                        <br />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\OKE AYODEJI\Desktop\attendance\resources\views/home.blade.php ENDPATH**/ ?>