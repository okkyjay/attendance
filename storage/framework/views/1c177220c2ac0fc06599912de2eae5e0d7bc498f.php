<div class="sidebar">
    <nav class="sidebar-nav">

        <ul class="nav">
            <li class="nav-item">
                <a href="<?php echo e(route("admin.home")); ?>" class="nav-link">
                    <i class="nav-icon fas fa-fw fa-tachometer-alt">

                    </i>
                    <?php echo e(trans('global.dashboard')); ?>

                </a>
            </li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_management_access')): ?>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        <?php echo e(trans('cruds.userManagement.title')); ?>

                    </a>
                    <ul class="nav-dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.permissions.index")); ?>" class="nav-link <?php echo e(request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-unlock-alt nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.permission.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.roles.index")); ?>" class="nav-link <?php echo e(request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.role.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.users.index")); ?>" class="nav-link <?php echo e(request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-user nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.user.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit_log_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.audit-logs.index")); ?>" class="nav-link <?php echo e(request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-file-alt nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.auditLog.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('guardian_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.guardians.index")); ?>" class="nav-link <?php echo e(request()->is('admin/guardians') || request()->is('admin/guardians/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-user-circle nav-icon">

                        </i>
                        <?php echo e(trans('cruds.guardian.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('student_access')): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route("admin.students.index")); ?>" class="nav-link <?php echo e(request()->is('admin/students') || request()->is('admin/students/*') ? 'active' : ''); ?>">
                        <i class="fa-fw fas fa-users nav-icon">

                        </i>
                        <?php echo e(trans('cruds.student.title')); ?>

                    </a>
                </li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_management_access')): ?>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link  nav-dropdown-toggle" href="#">
                        <i class="fa-fw fas fa-list nav-icon">

                        </i>
                        <?php echo e(trans('cruds.taskManagement.title')); ?>

                    </a>
                    <ul class="nav-dropdown-items">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_status_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.task-statuses.index")); ?>" class="nav-link <?php echo e(request()->is('admin/task-statuses') || request()->is('admin/task-statuses/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-server nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.taskStatus.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_tag_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.task-tags.index")); ?>" class="nav-link <?php echo e(request()->is('admin/task-tags') || request()->is('admin/task-tags/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-server nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.taskTag.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('task_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.tasks.index")); ?>" class="nav-link <?php echo e(request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-briefcase nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.task.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('tasks_calendar_access')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route("admin.tasks-calendars.index")); ?>" class="nav-link <?php echo e(request()->is('admin/tasks-calendars') || request()->is('admin/tasks-calendars/*') ? 'active' : ''); ?>">
                                    <i class="fa-fw fas fa-calendar nav-icon">

                                    </i>
                                    <?php echo e(trans('cruds.tasksCalendar.title')); ?>

                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    <?php echo e(trans('global.logout')); ?>

                </a>
            </li>
        </ul>

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<?php /**PATH C:\Users\OKE AYODEJI\Desktop\attendance\resources\views/partials/menu.blade.php ENDPATH**/ ?>