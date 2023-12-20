<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('user.index', compact('students'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->name;
        $student->save();
        $students = Student::all();
        // return view('user.show', compact('students'));
        return response()->json($student);; 
    }




    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        $students = Student::all();
        return redirect()->back()->with('students', $students);

    }


    public function edit($id)
    {
        $student = Student::find($id);
        return view('user.edit', compact("student"));
    }


    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->save();
        // return redirect("/");
        return response()->json($student);
    }

}