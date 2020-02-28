<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class todocontroller extends Controller
{
    public function index(){

        $Tasks=\App\Task::all();
        $Ctasks=\App\Ctask::all();

        return view('index',compact('Tasks','Ctasks'));
        
    }
    public function store(){
        $val=request()->validate([
            'task'=> 'required',
            'time'=> 'required|date_format:H:i'

            
        ]);
        $task=new \App\Task();
        $task->name=\request('task');
        $task->time=\request('time');
        $task->save();
        return redirect()->back();
    }

        public function show(\App\Task $Task){

        
        return view('show',compact('Task'));    
        
        }

        public function edit(\App\Task $Task){

            return view('show',compact('Task'));


        }
        public function update(\App\Task $Task){

            $val=request()->validate([
                'name'=> 'required',
                'time'=> 'required']);


                $Task->update($val);

                return redirect('/todo');


        }
        public function destroy(\App\Task $Task){


            $Task->delete();

            return redirect()->back();

        }
        public function cdestroy(\App\Ctask $Ctask){


            $Ctask->delete();

            return redirect()->back();

        }
        public function done(\App\Task $Task){
            
    
            $cname=$Task->name;
            $ctime=$Task->time;   
            $id=$Task->id;
            
            $ctask=new \App\Task();
            $Task->delete();

            $task=new \App\Ctask();
            $task->name=$cname;
            $task->time=$ctime;
            $task->save();
            return redirect()->back();

            
        }

}
