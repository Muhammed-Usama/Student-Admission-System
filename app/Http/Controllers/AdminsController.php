<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Facility;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{


    public function index()
    {
        return view('admin.dashboard'); // Use 'facultiesCount'
    }
    public function show()
    {
        $admins = Admin::all();
        return view('admin.users.index', compact('admins'));
    }
    public function usershow()
    {
        $users = User::all();
        return view('admin.users.user', compact('users'));
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Check for unique email
            'password' => 'required|string|min:8', // Password confirmation
            'role' => 'required|in:adminstrator,admin', // Ensure the role is either User or Admin
        ]);

        // Create a new admin user
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password); // Hash the password
        $admin->role = $request->role; // Save the role (User or Admin)

        $admin->save(); // Save to the database

        // Redirect back with success message
        return redirect()->route('admins.show')->with('message', 'Admin added successfully!');
    }
    public function delete($id)
    {
        // Find the faculty record by ID or fail with a 404 error
        $user = Admin::findOrFail($id);

        // Delete the faculty record
        $user->delete();

        // Redirect back with a success message
        return redirect()->route('admins.show')->with('message', 'User deleted successfully.');
    }

    public function edit($id)
    {
        $user = Admin::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'id' => 'required|exists:admins,id',
            'role' => 'required|in:adminstrator,admin',
        ]);

        // Find the user by ID
        $user = Admin::find($request->id);

        // Update the role
        $user->role = $request->role;

        // Save the changes
        $user->save();

        // Redirect back with a success message
        return redirect()->route('admins.show')->with('message', 'User role updated successfully!');
    }

    public function getTrafficData()
    {
        // Fetch dynamic counts from the database
        $students = Student::count();
        $admins = Admin::count();
        $faculties = Facility::count(); // Ensure you are using the correct model (Faculty instead of Facility)

        // Dynamic data array with actual counts
        $data = [
            ['value' => $students, 'name' => 'Students'],
            ['value' => $admins, 'name' => 'Admins'],
            ['value' => $faculties, 'name' => 'Faculties']
        ];

        return response()->json($data);
    }
    public function getComputerScienceData()
    {
        $computerScienceCount = Student::where('finaldesire_id', '5')->count(); // Adjust the query based on your database schema

        // You may also want to calculate the percentage change for the display
        $previousCount = 2;
        $percentageChange = $previousCount > 0 ? (($computerScienceCount - $previousCount) / $previousCount) * 100 : 0;

        return response()->json([
            'count' => $computerScienceCount,
            'percentageChange' => $percentageChange,
        ]);
    }
}
