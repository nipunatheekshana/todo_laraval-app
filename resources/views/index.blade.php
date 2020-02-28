@extends('app')
@section('title','To do list')

@section('content')



<div class="container">
<form action="/todo" method="post">

<input type="text" name="task" autocomplete="off" class="txtb" placeholder="Add a task">
<input type="text" name="time" autocomplete="off" class="txtb1" placeholder="HH:MM">
@csrf

<button  class=hide></button>


</form>
@error('task'){{$message}}@enderror
<div class="notcomp">
<h3>Tasks to do</h3>


        @forelse($Tasks as $Task)

         <div class= "task1"  >
               {{$Task->time}}
        </div>
         <div class= "task">
             <div class="check">
                  <a href='/todo/{{$Task->id}}'>{{$Task->name}}</a>
            </div>
            <div class="check1">
                    <form action="/todo/{{$Task->id}}" method="post">

                        @method('delete')
                        @csrf
                         <button class='fas fa-trash-alt'></button>
                     </form>
            </div>    
            <div class="check1">     
                     <form action="/done/{{$Task->id}}" method="post">
                          @csrf
                         
                        <button class='fas fa-check'></button>
                    </form>
            </DIV>
            
</div>
        @empty
    

        <li>no tasks available</li>

        @endforelse
</div>
<div class="comp">  
       
    <h3>compleated Tasks</h3>
    
        @forelse($Ctasks as $Ctask)
        <div class= "task1"  >
            {{$Ctask->time}} 
        </div>
        <div class= "task">
            <div class="check">
            {{$Ctask->name}}
            </div>
            <div class="check1">
                 <form action="/clean/{{$Ctask->id}}" method="post">
                     @method('delete')
                     @csrf
                <button class='fas fa-trash-alt'></button>
             </form>
            </div>
            
</div>
        @empty
    

        <li>no compeated tasks available</li>


        @endforelse

    
    
    
</div>
</div>














@endsection