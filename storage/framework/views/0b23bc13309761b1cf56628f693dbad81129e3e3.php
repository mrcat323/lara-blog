<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		<?php if(Auth::user()): ?>
		<a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-success">Edit</a>
		<?php echo Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']); ?>

		<?php echo e(Form::hidden('_method','DELETE')); ?>

		<?php echo e(Form::submit('Delete',['class'=>'btn btn-danger'])); ?>

		<?php echo Form::close(); ?>

		<?php endif; ?>
		<br>
		<?php if(sizeof($post)>0): ?>
		<small><?php echo e($post->created_at); ?> created by <b><?php echo e($post->user->name); ?></b></small>
		<h1><?php echo e($post->title); ?></h1>
		<img style="width: 100%" src="/storage/cover_images/<?php echo e($post->cover_img); ?>" alt="<?php echo e($post->title); ?>">
		<p><?php echo $post->text; ?></p>
		<?php endif; ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>