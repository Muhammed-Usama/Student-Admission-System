<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentDesireRequest;
use App\Http\Requests\StoreStudentInfoRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Facility;
use App\Models\Governorate;
use App\Models\ProgramRequirement;
use App\Models\Student;
use App\Models\User;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $studentService;

    // Inject the StudentService into the controller
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }
    //
    public function index()
    {
        $governorate = Governorate::all();
        return view('student.index', compact('governorate'));
    }

    public function toeducation(StoreStudentInfoRequest $request)
    {
        $this->studentService->storeStudentInfo($request->validated());

        $divisions = ProgramRequirement::all();

        return view('student.education', compact('divisions'));
    }
    public function todesider(StoreStudentDesireRequest $request)
    {
        $this->studentService->storeEducationData($request->validated());

        // Determine faculties based on the division
        $division = $request->division;
        $faculties = Facility::whereIn('programrequirement_id', $this->getProgramRequirements($division))->get();

        return view('student.desiders', compact('faculties'));
    }
    public function store(StoreStudentRequest $request)
    {
        // Use the StudentService to handle the validated data
        $response = $this->studentService->StoreStudent($request);

        // Check if the service returned success or failure
        if ($response['success']) {
            return redirect()->route('profile')->with('success', $response['message']);
        }

        return redirect()->back()->withErrors(['error' => $response['message']]);
    }

    public function profile()
    {
        $user = Auth::user();
        $student = $user->student; // Ensure relationship is defined in User model
        return view("student.profile", compact('student'));


        // if ($user && $user->role === 'user') {
        //     if ($user->already_registered === 'yes') {
        //         $student = $user->student; // Ensure relationship is defined in User model
        //         return view("student.profile", compact('student'));
        //     } else {
        //         return redirect()->route('student'); // Redirect to student route
        //     }
        // }

        // Handle cases where the user is not authenticated or doesn't have the right role
        return redirect()->route('login'); // Redirect to login
    }



    public function finaldesire()
    {
        $students = Student::orderBy('grade', 'desc')->get();

        foreach ($students as $student) {
            if (!$student->finaldesire_id) {
                $this->studentService->processFinalDesire($student);
            }
        }

        return redirect()->route('faculty.index')->with('message', 'Final Desire Generated.');
    }

    private function getProgramRequirements($division)
    {
        if ($division == 1) {
            return [1, 4, 5];
        } elseif ($division == 2) {
            return [2, 4, 5];
        } elseif ($division == 3) {
            return [5];
        }
    }

}

