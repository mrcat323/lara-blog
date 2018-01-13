<?php $__env->startSection('content'); ?>
	<?php if(sizeof($posts)>0): ?>
		<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="jumbotron">
				<div class="row">
					<div class="col-md-4 col-sm-4">
						<img style="width: 100%" src="/storage/cover_images/<?php echo e($post->cover_img); ?>" alt="<?php echo e($post->title); ?>">
					</div>
					<div class="col-md-8 col-sm-8">
						<h3><a href="/posts/<?php echo e($post->id); ?>"><?php echo e($post->title); ?></a></h3>
						<small><?php echo e($post->created_at); ?> created by <b><?php echo e($post->user->name); ?></b></small>
					</div>
				</div>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<div class="col-sm-4 col-md-5 col-md-3-offset">
			<?php echo e($posts->links()); ?>

		</div>
	<?php else: ?>
		<div class="jumbotron">
			<h3>Nein posts found...</h3>
		</div>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>