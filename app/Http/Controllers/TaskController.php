<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * zeigt Tasks an
     */

   public function index()
   {
       $tasks=Task::all();
       //dd($tasks);

       return view ('todo', ['tasks'=>$tasks]);

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
       Task::create(['subject'=> $request->subject,
           ]);
       return redirect()->route('tasks');

   }

}
