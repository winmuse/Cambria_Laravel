<?php $__env->startComponent('mail::message'); ?>
#  Verify your email address

## Dear <?php echo e(ucfirst($username)); ?>,

#### Please click the below button to activate your account.

<?php $__env->startComponent('mail::button', ['url' => $link]); ?>
    Activate Account
<?php echo $__env->renderComponent(); ?>

Thanks, <br>
<?php echo e(getAppName()); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH D:\Cambria\Cambria_Laravel\resources\views/auth/emails/account_verification.blade.php ENDPATH**/ ?>