<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function __construct () {
        $this->middleware('auth');
    }

    public function index (Request $request) {

        $filter = $request->get('filter');

        if ($filter)
            $tasks = Task::where([
                'status' => true,
                'user_id' => Auth::id()
            ])->get();
        else {
            $tasks = Task::where([
                'status' => false,
                'user_id' => Auth::id()
            ])->get();
        }

        return view('task.dashboard', ['tasks'=>$tasks, 'filter'=>$filter]);
    }

    public function done () {
        $tasks = Task::where([
            'status' => true,
            'user_id' => Auth::id()
        ])->get();
        return view('task.dashboard', ['tasks'=>$tasks]);
    }

    public function create () {

    }

    public function store (Request $request) {

        $description = $request->post('description');

        $validate = $request->validate([
            'description' => 'required',
        ]);

        $task = new Task;
        $task->description = $description;
        $task->user_id = Auth::id();
        $task->save();

        return redirect()->to(route('home'));
    }

    public function show () {

    }

    public function clone (Task $task) {
        $newtask = $task->replicate();

        if ($newtask->status) {
            $newtask->status = false;
        }

        $newtask->save();
        return redirect()->route('home');
    }

    public function update (Task $task) {
        $task->status = true;
        $task->save();
        return back();
    }
}
