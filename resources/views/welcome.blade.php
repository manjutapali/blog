<!DOCTYPE html>
<html>
<head>
    <title>Laravel test</title>
</head>
<body>
    <ul>
        @foreach ($tasks as $task)
            <li>

            <a href="tasks/{{$task->id}}">  {{ $task->body }}  </a>

            </li>
        @endforeach
    </ul>
</body>
</html>