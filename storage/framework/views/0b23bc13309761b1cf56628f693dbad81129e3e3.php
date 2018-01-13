<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		<?php if(sizeof($post)>0): ?>
		<small><?php echo e($post->created_at); ?></small>
		<a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-success">Edit</a>
		<?php echo Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']); ?>

		<?php echo e(Form::hidden('_method','DELETE')); ?>

		<?php echo e(Form::submit('Delete',['class'=>'btn btn-danger'])); ?>

		<?php echo Form::close(); ?>

		<h1><?php echo e($post->title); ?></h1>
		<p><?php echo $post->text; ?></p>
		<?php endif; ?>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>