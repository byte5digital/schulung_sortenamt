<?php

namespace App\Http\Controllers;

use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    /**
     * zeigt Tasks an
     */

    public function index()
    {
        $tasks=Task::where('done_at', null)->get();
        $doneTasks=Task::whereNotNull('done_at')->get();
        //dd($tasks);

        return view ('todo', [
            'tasks'=>$tasks,
            'doneTasks'=>$doneTasks



        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * speichert einen Task
     */

    public function store (Request $request)
    {    $request->validate([
        'subject'=> 'required|min:4'

    ]);
        $task= new Task ([
            'subject'=> $request->subject,
        ]);
        $task->user()->associate(\Auth::user());
        $task->save();


        return redirect()->route('tasks');

    }

    public function update(Task $task)
    {

        $task->done_at=Carbon::now();
        $task->worker()->associate(\Auth::user());

        $task->save();
        return redirect()->route('tasks');

    }

}
