<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\College; // Assuming you have a College model

class CollegeController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'college_name' => 'required|string|max:255',
        ]);

        try {
            // Create a new College instance and save the college_name
            $college = new College();
            $college->college_name = $request->college_name;
            $college->save();

            return response()->json(['success' => true, 'message' => 'College added successfully!']);
        } catch (\Exception $e) {
            // Return error message if saving fails
            return response()->json(['success' => false, 'message' => 'Failed to add college: ' . $e->getMessage()]);
        }
    }

    public function showDeanForm()
    {
        // Fetch all colleges from the college table
        $colleges = College::all();
        
        // Pass the list of colleges to the view
        return view('admin.add-dean-form', compact('colleges'));
    }

    
}
