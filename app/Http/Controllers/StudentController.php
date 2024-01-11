<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    public function index()
    {
        $students = Student::all();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|unique:students|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
        ]);

        $student = Student::create($validatedData);

        return redirect()->route('students.index')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student = Student::findOrFail($student->id);
        return view('students.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $student = Student::findOrFail($student->id);
        return view('students.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'address' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
        ]);

        Student::whereId($student->id)->update($validatedData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student = Student::findOrFail($student->id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
