<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		<h1>Create post</h1>
		<?php echo Form::open(['action' => 'PostsController@store','method' => 'POST']); ?>

		<div class="form-group">
			<?php echo e(Form::label('title','Title')); ?>

			<?php echo e(Form::text('title','',['class' => 'form-control','placeholder' => 'Title'])); ?>

		</div>
		<div class="form-group">
			<?php echo e(Form::label('text','Text')); ?>

			<?php echo e(Form::textarea('text','',['id'=>'article-ckeditor','class' => 'form-control','placeholder' => 'Body text'])); ?>

		</div>
		<?php echo e(Form::submit('Add',['class' => 'btn btn-primary'])); ?>


		<?php echo Form::close(); ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>