<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(auth()->user()->id==1): ?>
                        <a href="/posts">Delete Admins</a>
                        <br>
                    <?php endif; ?>
                    <?php if(sizeof($posts)>0): ?>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($post->title); ?></td>
                                    <td><a href="/posts/<?php echo e($post->id); ?>/edit" class="btn btn-default">Edit</a></td>
                                    <td><?php echo Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']); ?>

                                    <?php echo e(Form::hidden('_method','DELETE')); ?>

                                    <?php echo e(Form::submit('Delete',['class'=>'btn btn-danger'])); ?>

                                    <?php echo Form::close(); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>Nein posts Herr</p>
                    <?php endif; ?>
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>