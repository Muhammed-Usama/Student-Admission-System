<?php

namespace App\Http\Controllers;

use App\Models\WhiteList;
use Illuminate\Http\Request;

class WhiteListController extends Controller
{
    //
    public function index()
    {
        $ips = WhiteList::all();
        return view('admin.ips.index', compact('ips'));
    }
    public function create()
    {
        //$programrequirements = ProgramRequirement::all();
        return view('admin.ips.create');
    }
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'name' => 'required|string',
            'ip' => 'required|ip',
        ]);

        // Create the data array
        $data = [
            'name' => $validatedData['name'],
            'ip' => $validatedData['ip'],
        ];

        // Store the data in the database (assuming you have a Faculty model)
        WhiteList::create($data); // Adjust this to your actual model

        // Redirect with a success message
        return redirect()->route('ip.index')->with('message', 'IP created successfully.');
    }
    public function delete($id)
    {
        // Find the faculty record by ID or fail with a 404 error
        $faculty = WhiteList::findOrFail($id);

        // Delete the faculty record
        $faculty->delete();

        // Redirect back with a success message
        return redirect()->route('ip.index')->with('message', 'IP deleted successfully.');
    }


}
