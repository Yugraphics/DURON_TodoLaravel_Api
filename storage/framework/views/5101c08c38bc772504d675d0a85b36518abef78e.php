<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To-Do List</title>
    <link href = " <?php echo e(asset ('style.css')); ?>" rel = "stylesheet">
    
</head>
<body>
    <h1>To-Do List</h1>
    
    <form action="/tasks" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="title" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <form action="/tasks/<?php echo e($task->id); ?>/toggle" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit"><?php echo e($task->completed ? 'Undo' : 'Complete'); ?></button>
                </form>
                <span class="<?php echo e($task->completed ? 'completed' : ''); ?>"><?php echo e($task->title); ?></span>
                <form action="/tasks/<?php echo e($task->id); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Pinotetodo-list\resources\views/tasks/index.blade.php ENDPATH**/ ?>