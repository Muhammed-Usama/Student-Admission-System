<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Governorate;
use App\Models\ProgramRequirement;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function index()
    {
        $governorate = Governorate::all();
        return view('student.index', compact('governorate'));
    }

    public function toeducation(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required',
            'address' => 'required',
            'nationalid' => 'required',
            'national_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'student_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'dateofbirth' => 'required|date',
            'gander' => 'required|string',
            'governorate_id' => 'required|exists:governorates,id'
        ]);

        // Handle file uploads
        if ($request->hasFile('national_img')) {
            $imageName = time() . '_national.' . $request->national_img->extension();
            $request->national_img->move(public_path('uploads/national_ids'), $imageName);
            $validatedData['national_img'] = 'uploads/national_ids/' . $imageName; // Store the file path
        }

        // Handle student photo upload
        if ($request->hasFile('student_photo')) {
            $imageName = time() . '_student.' . $request->student_photo->extension();
            $request->student_photo->move(public_path('uploads/students'), $imageName);
            $validatedData['student_photo'] = 'uploads/students/' . $imageName; // Store the file path
        }


        // Store validated data in session
        session(['student_info' => $validatedData]);

        $divisions = ProgramRequirement::all();

        return view('student.education', compact('divisions'));
    }
    public function todesider(Request $request)
    {
        $validatedData = $request->validate([
            'seatnum' => 'required|string|max:10',
            'grade' => 'required|string|max:10',
            'division' => 'required|string|max:10',
        ]);
        if ($validatedData['division'] == 1) {
            $faculties = Facility::whereIn('programrequirement_id', [1, 4, 5])->get();

        } elseif ($validatedData['division'] == 2) {
            $faculties = Facility::whereIn('programrequirement_id', [2, 4, 5])->get();
        } elseif ($validatedData['division'] == 3) {
            $faculties = Facility::whereIn('programrequirement_id', [5])->get();
        }

        // Store validated education data in session
        session(['education_info' => $validatedData]);

        return view('student.desiders', compact('faculties'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'desider1' => 'required|exists:facilities,id',
            'desider2' => 'required|exists:facilities,id',
            'desider3' => 'required|exists:facilities,id',
        ]);

        $studentInfo = session('student_info');
        $educationInfo = session('education_info');
        $user = User::where('email', session('user'))->first();

        if ($user) {
            $student = Student::create([
                'name' => $studentInfo['name'],
                'governorate_id' => $studentInfo['governorate_id'],
                'email' => $studentInfo['email'],
                'phone' => $studentInfo['phone'],
                'gander' => $studentInfo['gander'],
                'seatnum' => $educationInfo['seatnum'],
                'grade' => $educationInfo['grade'],
                'programrequirement_id' => $educationInfo['division'],
                'dateofbirth' => $studentInfo['dateofbirth'],
                'nationalid' => $studentInfo['nationalid'],
                'address' => $studentInfo['address'],
                'student_photo' => $studentInfo['student_photo'], // Handle if photo is not uploaded
                'national_img' => $studentInfo['national_img'], // Handle if image is not uploaded
                'user_id' => $user->id,
            ]);

            // Update the already_registered field to 'yes'
            $user->already_registered = 'yes';
            $user->save();

            // Attach selected facilities
            $student->faculity()->attach([
                $validatedData['desider1'],
                $validatedData['desider2'],
                $validatedData['desider3'],
            ]);
        }

        // Clear session data
        session()->forget(['student_info', 'education_info']);

        // Redirect to the profile page
        return redirect()->route('profile');
    }

    public function profile()
    {
        $user = Auth::guard('user')->user();
        if ($user && $user->role === 'user') {
            if ($user->already_registered === 'yes') {
                $student = $user->student; // Ensure relationship is defined in User model
                return view("student.profile", compact('student'));
            } else {
                return redirect()->route('student'); // Redirect to student route
            }
        }

        // Handle cases where the user is not authenticated or doesn't have the right role
        return redirect()->route('login'); // Redirect to login
    }



    public function finaldesire()
    {
        // Get students ordered by grade
        $students = Student::orderBy('grade', 'desc')->get();

        // Loop through each student
        foreach ($students as $student) {
            // Check if the student has a final desire
            if (!$student->finaldesire_id) {
                $grade = $student->grade;

                // Loop through the associated faculties of the student
                foreach ($student->faculity as $faculity) {
                    $desire = $faculity->name;
                    $minratio = $faculity->minratio;
                    $num = $faculity->availableno;

                    // Check if the student's grade meets the minimum ratio and if there are available spots
                    if ($grade >= $minratio && $num != 0) {
                        // Set the final desire for the student
                        $finaldesire = $desire;
                        $num--;

                        // Update the available number in the faculty and save it
                        $faculity->availableno = $num;
                        $faculity->faculityminratio = $grade; // Assuming this is needed
                        $faculity->save();

                        // Update the student's final desire ID and save it
                        $student->finaldesire_id = $faculity->id;
                        $student->save();  // Save the student, not $students


                    }
                }
            }
        }

        return redirect()->route('faculty.index')->with('message', 'Final Desire is Already Gnerated.');
    }


}

