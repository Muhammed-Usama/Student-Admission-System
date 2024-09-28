<?php

namespace App\Http\Controllers;

use App\Mail\SendMailTostudent;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMailController extends Controller
{
    //
    public function send()
    {
        $students = Student::with('final')->get(); // Ensure the relationship is named 'final'
        foreach ($students as $student) {
            $name = $student->name;
            $final = $student->final ? $student->final->name : 'No Final Desire'; // Handle case where final desire may be null

            // Send email to the student
            Mail::to($student->email)->send(new SendMailTostudent(compact('name', 'final')));
        }

        return redirect()->route('faculty.index')->with('message', 'Send Emails successfully.');
    }

}
