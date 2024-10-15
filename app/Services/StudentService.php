<?php

namespace App\Services;

use App\Models\Facility;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class StudentService
{
    public function storeStudentInfo(array $data)
    {
        // Handle file uploads for national image and student photo
        if (isset($data['national_img'])) {
            $data['national_img'] = $this->uploadFile($data['national_img'], 'uploads/national_ids');
        }

        if (isset($data['student_photo'])) {
            $data['student_photo'] = $this->uploadFile($data['student_photo'], 'uploads/students');
        }

        // Store data in session
        session(['student_info' => $data]);
    }

    public function storeEducationData(array $data)
    {
        session(['education_info' => $data]);
    }

    public function StoreStudent($request)
    {

        // Retrieve the student and education info from the session
        $studentInfo = session('student_info');
        $educationInfo = session('education_info');
        $user = User::where('email', session('user'))->first();

        // Check if user exists
        if ($user) {
            // Create the student entry
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

            // Attach the selected faculties to the student
            $student->faculity()->attach([
                $request->desider1,
                $request->desider2,
                $request->desider3,
            ]);

            // Clear session data
            session()->forget(['student_info', 'education_info']);

            // Return success response
            return [
                'success' => true,
                'message' => 'Student registration completed successfully!'
            ];
        } else {
            // If user does not exist, return error
            return [
                'success' => false,
                'message' => 'User not found. Please try again.'
            ];
        }
    }



    public function processFinalDesire(Student $student)
    {
        $faculties = $student->faculity;
        $grade = $student->grade;

        foreach ($faculties as $faculty) {
            if ($grade >= $faculty->minratio && $faculty->availableno > 0) {
                $student->finaldesire_id = $faculty->id;
                $faculty->availableno -= 1;
                $faculty->save();
                $student->save();
            }
        }
    }

    public function update($studentId, $facultyId)
    {
        // Validate input
        $student = Student::findOrFail($studentId);
        $faculty = Facility::findOrFail($facultyId);

        // Check criteria
        if ($student->grade >= $faculty->minratio) {
            if ($faculty->availableno > 0) {

                $student->finaldesire_id = $faculty->id;
                $faculty->availableno -= 1;
                $faculty->save();
                $student->save();

                return ['Update successful'];
            } else {
                return ['Not Have Any Seats in this faculty'];
            }
        } else {
            return ["This Grade is Lower Than of The Faculty's Grade"];

        }


    }

    private function uploadFile($file, $path)
    {
        return $file->store($path, 'public');
    }
}
