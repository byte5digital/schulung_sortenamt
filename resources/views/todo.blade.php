<!doctype html>
<html>

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content ="IE=edge">
    <title>


    </title>
    <meta name="viewport" content="width-device-width", initial-scale="1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
    <script src="main.js"></script>

</head>

<body>

Anzahl Aufgaben:{{Auth::user()->tasks->count()}}

<form action="{{route('tasks.store')}}" method="POST">
    @csrf
    <input type="text" name="subject"/>

    @if($errors->has('subject'))
        <span style="color:red;">{{$errors->first('subject')}}</span>
    @endif

    <button type="submit"> Submit</button>

</form>

<ul>
    @foreach($tasks as $task)

        <li>
            <form action="{{route('tasks.update', ['task'=> $task])}}" method="POST">
                @csrf
                @method('put')
                {{$task->subject}} | {{optional($task ->user)->name}}
                <button type="submit">Update</button>
            </form>

        </li>

    @endforeach

</ul>
<br/>
<h5>erledigte Aufgaben:</h5>
@foreach($doneTasks as $task)
    <li> {{$task->subject}}|{{$task->done_at->format('H:i:s d.m.Y')}}|erstellt von: {{optional($task ->user)->name}}erledigt von:{{optional($task ->worker)->name}}</li>

@endforeach

</body>


</html>