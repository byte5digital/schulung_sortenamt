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

    <li>{{$task->subject}}</li>


        @endforeach

</ul>
</body>


</html>