<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Student;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentAdminController extends Controller
{
    protected $studentService;

    // Inject the StudentService into the controller
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    //
    public function search()
    {
        return view('admin.student.search');
    }

    public function result(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'national_id' => 'required|numeric',
        ]);

        // Perform the search
        $students = Student::where('nationalid', $request->national_id)->get(); // Adjust according to your column name

        // Return the search results to the view
        return view('admin.student.search', compact('students'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.student.edit', compact('student'));
    }
    public function update(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'id' => 'required|exists:students,id',
            'finaldesire_id' => 'required|exists:facilities,id',
        ]);
        $result = $this->studentService->update($request->id, $request->finaldesire_id);
        //return view('admin.student.search')->with(['message', 'ldsak;jd']);
        return redirect()->back()->with('message', $result[0]);
    }

}
