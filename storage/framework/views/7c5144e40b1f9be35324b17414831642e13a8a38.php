<?php $__env->startSection('content'); ?>
	<div class="jumbotron">
		<a href="/posts" class="btn btn-default">Go Back</a>
		<h1>Create post</h1>
		<?php echo Form::open(['action' => ['PostsController@update', $post->id],'method' => 'POST']); ?>

		<div class="form-group">
			<?php echo e(Form::label('title','Title')); ?>

			<?php echo e(Form::text('title',$post->title,['class' => 'form-control','placeholder' => 'Title'])); ?>

		</div>
		<div class="form-group">
			<?php echo e(Form::label('text','Text')); ?>

			<?php echo e(Form::textarea('text',$post->text,['id'=>'article-ckeditor','class' => 'form-control','placeholder' => 'Body text'])); ?>

		</div>
		<?php echo e(Form::hidden('_method','PUT')); ?>

		<?php echo e(Form::submit('Update',['class' => 'btn btn-primary'])); ?>


		<?php echo Form::close(); ?>

		<?php echo Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']); ?>

		<?php echo e(Form::hidden('_method','DELETE')); ?>

		<?php echo e(Form::submit('Delete',['class'=>'btn btn-danger'])); ?>

		<?php echo Form::close(); ?>

	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>