<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel To-Do List</title>
    <link href="{{ asset('style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Duron To-Do List</h1>
        
        <form action="/tasks" method="POST" class="add-task-form">
            @csrf
            <input type="text" name="title" placeholder="Add a new task..." required>
            <button type="submit">Add Task</button>
        </form>

        <ul class="task-list">
            @foreach($tasks as $task)
                <li class="task-item">
                    <form action="/tasks/{{ $task->id }}/toggle" method="POST" class="toggle-form">
                        @csrf
                        <button type="submit" class="toggle-btn">{{ $task->completed ? 'Undo' : 'Complete' }}</button>
                    </form>
                    <span class="{{ $task->completed ? 'completed' : '' }}" class="task-title">{{ $task->title }}</span>
                    <form action="/tasks/{{ $task->id }}" method="POST" class="delete-form">
                        @csrf @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
