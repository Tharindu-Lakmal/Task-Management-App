<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskManager extends Controller
{

    // list all tasks
    function listTask() {
        // return all the task in the database as JSON
        $tasks = Tasks::where("user_id", auth()->user()->id)
        ->where("status", 'to be completed')->paginate(7);

        return view("welcome", compact('tasks')); 
    }

    // navigate to add task page
    function addTask() {
        return view("tasks.add");
    }

    // add task
    function addTaskPost(Request $request) {

        $request->validate([
            'title' => 'required',
            'description'=> 'required',
            'deadline'=> 'required',
        ]);

        $task = new Tasks();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->user_id = auth()->user()->id;

        if($task->save()) {
            return redirect(route('home'))
            ->with('success','Task added successfully!');
        };
        return redirect(route('task.add'))
        ->with('error','Task not added! Try again!');

    }


    // functio to update task status
    function updateTaskStatus($id) {

        $task = Tasks::find($id);
        // Tasks- the Model
        if(Tasks::where("user_id", auth()->user()->id)
        ->where('id', $id)->update(['status'=> "Completed"])) {
    
            return redirect(route("home"))->with("success","{$task->title} Task completed.");

        }
        return redirect(route('home'))
            ->with('error','Error! try again.');
    }

    // functio to delete tasks
    function deleteTask($id) {

        $task = Tasks::find($id);
        // Tasks- the Model
        if(Tasks::where("user_id", auth()->user()->id)
        ->where('id', $id)->delete()) {

            return redirect(route("home"))->with("success","{$task->title} Task deleted.");
        }
        return redirect(route('home'))
            ->with('error','Error! try again.');
    }
}