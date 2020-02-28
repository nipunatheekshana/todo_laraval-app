
@extends('app')
@section('title','To do list')

@section('content')

<div class="container">
<form action="/todo/{{$Task->id}}" method="post">

@method('patch')
<input type="text" name="name" autocomplete="off" value="{{$Task->name}}" class="txtb" placeholder="Add a task">
<input type="text" name="time" autocomplete="off" value="{{$Task->time}}" class="txtb1" placeholder="HH:MM">
@csrf
<button class="hide" >Save Task</button>


</form>
<form action="/todo/{{$Task->id}}" method="post">

@method('delete')
@csrf
<button >delete</button>
</form>

</div>









@endsection











