<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To-Do List</title>
    <link href="<?php echo e(asset('style.css')); ?>" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Duron To-Do List</h1>
        
        <form action="/tasks" method="POST" class="add-task-form">
            <?php echo csrf_field(); ?>
            <input type="text" name="title" placeholder="Add a new task..." required>
            <button type="submit">Add Task</button>
        </form>

        <ul class="task-list">
            <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="task-item">
                    <form action="/tasks/<?php echo e($task->id); ?>/toggle" method="POST" class="toggle-form">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="toggle-btn"><?php echo e($task->completed ? 'Undo' : 'Complete'); ?></button>
                    </form>
                    <span class="<?php echo e($task->completed ? 'completed' : ''); ?>" class="task-title"><?php echo e($task->title); ?></span>
                    <form action="/tasks/<?php echo e($task->id); ?>" method="POST" class="delete-form">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Durontodo-list\resources\views/tasks/index.blade.php ENDPATH**/ ?>