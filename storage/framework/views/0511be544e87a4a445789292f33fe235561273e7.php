<?php $__env->startSection('content'); ?>
<div class="jumbotron text-center">
	<h2>Welcome to our Website!</h2>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>