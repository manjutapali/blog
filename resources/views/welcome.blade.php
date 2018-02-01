<!DOCTYPE html>
<html>
<head>
    <title>Laravel test</title>
</head>
<body>
    <ul>
        @foreach ($tasks as $task)
            <li> {{ $task->body }}</li>
        @endforeach
    </ul>
</body>
</html>