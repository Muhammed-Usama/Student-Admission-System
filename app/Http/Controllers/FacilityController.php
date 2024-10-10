<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\ProgramRequirement;
use Illuminate\Http\Request;

class FacilityController extends Controller
{

    public function index()
    {
        $faculties = Facility::all();
        return view('admin.faculty.index', compact('faculties'));
    }
    public function create()
    {
        $programrequirements = ProgramRequirement::all();
        return view('admin.faculty.create', compact('programrequirements'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'minratio' => 'required|numeric',
            'maxavailableno' => 'required|numeric',
            'programrequirement_id' => 'required|exists:program_requirements,id', // Adjust table name as necessary
        ]);

        // Create the data array
        $data = [
            'name' => $validatedData['name'],
            'minratio' => $validatedData['minratio'],
            'availableno' => $validatedData['maxavailableno'], // Add availableno here
            'programrequirement_id' => $validatedData['programrequirement_id'],
            'maxavailableno' => $validatedData['maxavailableno'],
        ];

        // Store the data in the database (assuming you have a Faculty model)
        Facility::create($data); // Adjust this to your actual model

        // Redirect with a success message
        return redirect()->route('faculty.index')->with('message', 'Faculty created successfully.');
    }
    public function delete($id)
    {
        // Find the faculty record by ID or fail with a 404 error
        $faculty = Facility::findOrFail($id);

        // Delete the faculty record
        $faculty->delete();

        // Redirect back with a success message
        return redirect()->route('faculty.index')->with('message', 'Faculty deleted successfully.');
    }
    public function edit($id)
    {
        $faculty = Facility::findOrFail($id);
        return view('admin.faculty.edit', compact('faculty'));
    }
    public function update(Request $request)
    {
        // Validate the request
        $id = $request->id;
        $validatedData = $request->validate([
            'minratio' => 'required|numeric',
            'maxavailableno' => 'required|numeric',
        ]);
        $data = [
            'minratio' => $validatedData['minratio'],
            'maxavailableno' => $validatedData['maxavailableno'],
            'availableno' => $validatedData['maxavailableno']
        ];
        // Find the faculty record by ID
        $faculty = Facility::findOrFail($id);
        // Update the faculty record with validated data
        $faculty->update($data);
        // Redirect with a success message
        return redirect()->route('faculty.index')->with('message', 'Faculty updated successfully.');
    }


}
