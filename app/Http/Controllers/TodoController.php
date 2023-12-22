<?php

namespace App\Http\Controllers;

use Log;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('Admin')) {
            $todos = Todo::all();
            return view('todo.index', compact('todos'));
        } 
        elseif (auth()->user()->hasRole('User')) {
            $user = auth()->user();
            \Illuminate\Support\Facades\Log::info('User Name: ' . $user);
            $todos = Todo::where('user_id', $user->id)->get();
            return view('todo.index', compact('todos'));
        } else {
            $error = 'You do not have permission to view this page.';
            return view('todo.index', compact('error'));
        }
    }

    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('create')) {
            $todo = new Todo;
            $todo->description = $request->description;
            $todo->completed = 0;
            $todo->user_id = auth()->user()->id;
            $todo->save();
            $todos = Todo::all();
            return response()->json($todos);
        } else {
            $error = 'You do not have permission to view this page.';
            return view('todo.index', compact('error'));
        }
    }


    public function destroy($id)
    {
        if (auth()->user()->hasPermissionTo('delete')) {

            $todo = Todo::find($id);
            $todo->delete();
            $todos = Todo::all();
            return redirect()->back()->with('todos', $todos);
        } else {
            $error = 'You do not have permission to view this page.';
            return view('todo.index', compact('error'));
        }
    }

    public function update(Request $request, $id)
    {
        if (auth()->user()->hasPermissionTo('delete')) {

            $todo = Todo::findOrFail($id);
            $completed = filter_var($request->completed, FILTER_VALIDATE_BOOLEAN);
            $todo->description = $request->description;
            $todo->completed = $completed ? 1 : 0;
            $todo->save();
            return response()->json($todo);
        } else {
            $error = 'You do not have permission to view this page.';
            return view('todo.index', compact('error'));
        }
    }


    public function updateStatus(Request $request, $id){
        if (auth()->user()->hasPermissionTo('delete')) {
            $todo = Todo::findOrFail($id);
            $completed = filter_var($request->completed, FILTER_VALIDATE_BOOLEAN);
            $todo->completed = $completed ? 1 : 0;
            $todo->save();
            return response()->json($todo);
        } else {
            $error = 'You do not have permission to view this page.';
            return view('todo.index', compact('error'));
        }
    }
}
