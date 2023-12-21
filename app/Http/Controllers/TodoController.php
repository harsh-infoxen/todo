<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Todo;
use Illuminate\Http\Request;



class TodoController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->hasRole('Admin');
        $todos = Todo::all();
        return view('todo.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $todo = new Todo;
        $todo->description = $request->description;
        $todo->completed = 0;
        $todo->save();
        $todos = Todo::all();
        return response()->json($todos);
        
    }


    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        $todos = Todo::all();
        return redirect()->back()->with('todos', $todos);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        $completed = filter_var($request->completed, FILTER_VALIDATE_BOOLEAN);
        $todo->description = $request->description;
        $todo->completed = $completed ? 1 : 0;
        $todo->save();
        return response()->json($todo);
    }

}