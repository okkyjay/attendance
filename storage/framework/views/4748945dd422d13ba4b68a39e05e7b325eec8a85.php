<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_create')): ?>
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="<?php echo e(route("admin.tasks.create")); ?>">
                    <?php echo e(trans('global.add')); ?> <?php echo e(trans('cruds.task.title_singular')); ?>

                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('cruds.task.title_singular')); ?> <?php echo e(trans('global.list')); ?>

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Task">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.id')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.name')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.description')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.status')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.tag')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.attachment')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.due_date')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.task.fields.assigned_to')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($task->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($task->id ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($task->name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($task->description ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($task->status->name ?? ''); ?>

                            </td>
                            <td>
                                <?php $__currentLoopData = $task->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="badge badge-info"><?php echo e($item->name); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td>
                                <?php if($task->attachment): ?>
                                    <a href="<?php echo e($task->attachment->getUrl()); ?>" target="_blank">
                                        <?php echo e(trans('global.view_file')); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php echo e($task->due_date ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($task->assigned_to->name ?? ''); ?>

                            </td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_show')): ?>
                                    <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.tasks.show', $task->id)); ?>">
                                        <?php echo e(trans('global.view')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_edit')): ?>
                                    <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.tasks.edit', $task->id)); ?>">
                                        <?php echo e(trans('global.edit')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_delete')): ?>
                                    <form action="<?php echo e(route('admin.tasks.destroy', $task->id)); ?>" method="POST" onsubmit="return confirm('<?php echo e(trans('global.areYouSure')); ?>');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="submit" class="btn btn-xs btn-danger" value="<?php echo e(trans('global.delete')); ?>">
                                    </form>
                                <?php endif; ?>

                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    ##parent-placeholder-16728d18790deb58b3b8c1df74f06e536b532695##
    <script>
        $(function () {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_delete')): ?>
            let deleteButtonTrans = '<?php echo e(trans('global.datatables.delete')); ?>'
            let deleteButton = {
                text: deleteButtonTrans,
                url: "<?php echo e(route('admin.tasks.massDestroy')); ?>",
                className: 'btn-danger',
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });

                    if (ids.length === 0) {
                        alert('<?php echo e(trans('global.datatables.zero_selected')); ?>')

                        return
                    }

                    if (confirm('<?php echo e(trans('global.areYouSure')); ?>')) {
                        $.ajax({
                            headers: {'x-csrf-token': _token},
                            method: 'POST',
                            url: config.url,
                            data: { ids: ids, _method: 'DELETE' }})
                            .done(function () { location.reload() })
                    }
                }
            }
            dtButtons.push(deleteButton)
            <?php endif; ?>

            $.extend(true, $.fn.dataTable.defaults, {
                order: [[ 1, 'desc' ]],
                pageLength: 100,
            });
            $('.datatable-Task:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\OKE AYODEJI\Desktop\attendance\resources\views/admin/tasks/index.blade.php ENDPATH**/ ?>