<li class="nav-item <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>">
    <a class="nav-link <?php echo e(Request::is('conversations*') ? 'active' : ''); ?>" href="<?php echo e(url('conversations')); ?>">
        <i class="nav-icon icon-speech mr-4"></i> <?php echo e(__('messages.conversations')); ?>

    </a>
</li>

<li class="nav-item <?php echo e(Request::is('users*') ? 'active' : ''); ?>">
    <a class="nav-link <?php echo e(Request::is('users*') ? 'active' : ''); ?>" href="<?php echo e(route('users.index')); ?>">
        <i class="fa fa-users nav-icon mr-4"></i>
        <span><?php echo e(__('messages.users')); ?></span>
    </a>
</li>
<li class="nav-item <?php echo e(Request::is('roles*') ? 'active' : ''); ?>">
    <a class="nav-link <?php echo e(Request::is('roles*') ? 'active' : ''); ?>" href="<?php echo e(route('roles.index')); ?>">
        <i class="fa fa-user nav-icon mr-4"></i>
        <span><?php echo e(__('messages.roles')); ?></span>
    </a>
</li>
<li class="nav-item <?php echo e(Request::is('reported-users*') ? 'active' : ''); ?>">
    <a class="nav-link <?php echo e(Request::is('reported-users*') ? 'active' : ''); ?>"
        href="<?php echo e(route('reported-users.index')); ?>">
        <i class="fa fa-flag nav-icon mr-4"></i>
        <span><?php echo e(__('messages.reported_user')); ?></span>
    </a>
</li>
<li class="nav-item <?php echo e(Request::is('settings*') ? 'active' : ''); ?>">
    <a class="nav-link <?php echo e(Request::is('settings*') ? 'active' : ''); ?>" href="<?php echo e(route('settings.index')); ?>">
        <i class="fa fa-gear nav-icon mr-4"></i>
        <span><?php echo e(__('messages.settings')); ?></span>
    </a>
</li>

<?php /**PATH C:\Users\kitc\Documents\tools\Cambria_Laravel-10-27\Cambria_Laravel\resources\views/layouts/menu.blade.php ENDPATH**/ ?>