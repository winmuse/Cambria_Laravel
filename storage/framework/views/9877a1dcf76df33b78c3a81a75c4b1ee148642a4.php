<h4 style="margin-left:20px;"><?php echo e(__('messages.creator_manage')); ?></h4>
  <ul class="nav">
    <li class="nav-item <?php echo e(Request::is('new_creators*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('new_creators*') ? 'active' : ''); ?>" href="<?php echo e(route('new_creators.index')); ?>">
            <i class="fa fa-user-circle nav-icon mr-4"></i>
            <span><?php echo e(__('messages.new_register_request_list')); ?></span>
        </a>
    </li>
    <li class="nav-item <?php echo e(Request::is('creators*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('creators*') ? 'active' : ''); ?>" href="<?php echo e(route('creators.index')); ?>">
            <i class="fa fa-user-circle-o nav-icon mr-4"></i>
            <span><?php echo e(__('messages.current_creator_list')); ?></span>
        </a>
    </li>
    <li class="nav-item <?php echo e(Request::is('delete_creators*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('delete_creators*') ? 'active' : ''); ?>" href="<?php echo e(route('delete_creators.index')); ?>">
            <i class="fa fa-user-o nav-icon mr-4"></i>
            <span><?php echo e(__('messages.deleted_creator_list')); ?></span>
        </a>
    </li>
    <li class="nav-item <?php echo e(Request::is('monthly_subscriptions*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('monthly_subscriptions*') ? 'active' : ''); ?>" href="<?php echo e(route('monthly_subscriptions.index')); ?>">
            <i class="fa fa-user-o nav-icon mr-4"></i>
            <span><?php echo e(__('messages.monthly_subscription_list')); ?></span>
        </a>
    </li>
  </ul>

<h4 style="margin-left:20px;"><?php echo e(__('messages.user_manage')); ?></h4>
  <ul class="nav">
    <li class="nav-item <?php echo e(Request::is('users*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('users*') ? 'active' : ''); ?>" href="<?php echo e(route('users.index')); ?>">
            <i class="fa fa-user-circle-o nav-icon mr-4"></i>
            <span><?php echo e(__('messages.current_user_list')); ?></span>
        </a>
    </li>
    <li class="nav-item <?php echo e(Request::is('delete_users*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('delete_users*') ? 'active' : ''); ?>" href="<?php echo e(route('delete_users.index')); ?>">
            <i class="fa fa-user-o nav-icon mr-4"></i>
            <span><?php echo e(__('messages.deleted_user_list')); ?></span>
        </a>
    </li>
  </ul>

<h4 style="margin-left:20px;"><?php echo e(__('messages.payment_manage')); ?></h4>
  <ul class="nav">
    <li class="nav-item <?php echo e(Request::is('admin_payment*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('admin_payment*') ? 'active' : ''); ?>" href="<?php echo e(route('admin_payment.index')); ?>">
            <i class="fa fa-user-circle nav-icon mr-4"></i>
            <span><?php echo e(__('messages.admin_payment')); ?></span>
        </a>
    </li>
    <li class="nav-item <?php echo e(Request::is('creator_payment*') ? 'active' : ''); ?>">
        <a class="nav-link <?php echo e(Request::is('creator_payment*') ? 'active' : ''); ?>" href="<?php echo e(route('creator_payment.index')); ?>">
            <i class="fa fa-user-circle-o nav-icon mr-4"></i>
            <span><?php echo e(__('messages.creator_payment')); ?></span>
        </a>
    </li>
  </ul>
<?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/layouts/menu.blade.php ENDPATH**/ ?>