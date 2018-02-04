@extends('layout.master')

@section('content')

        @foreach ($tasks as $task)
            <div class="card list-main">
                <h4> {{$task->id}} </h4>
                <a href="tasks/{{$task->id}}">  {{ $task->body }}  </a>
            </div>
        @endforeach

@endsection
