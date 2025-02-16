<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\ModuleHistory;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    // Display all modules
    public function index()
    {
        $modules = Module::all();
        return view('modules.index', compact('modules'));
    }

    // Show the form to create a new module
    public function create()
    {
        return view('modules.create');
    }

    // Store a new module
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|string|max:255',
            'status' => 'nullable|string|max:50', // If status is optional, you can use nullable
            'last_seen' => 'nullable|date', // If last_seen is optional, use nullable
            'location' => 'nullable|string|max:255',
            'data_unit' => 'nullable|string|max:50',
            'data_value' => 'required|numeric',
            'operating_time' => 'required|numeric',
            'data_sent_count' => 'required|numeric',
            'fault_code' => 'nullable|string|max:50',
            'maintenance_due' => 'nullable|date',
            'manufacturer' => 'nullable|string|max:255',
            'model_number' => 'nullable|string|max:255',
            'firmware_version' => 'nullable|string|max:50',
            'battery_level' => 'nullable|numeric|between:0,100',
            'module_configuration' => 'nullable|string',
        ]);

        // Create the module with validated input
        Module::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'last_seen' => $request->last_seen,
            'location' => $request->location,
            'data_unit' => $request->data_unit,
            'data_value' => $request->data_value,
            'operating_time' => $request->operating_time,
            'data_sent_count' => $request->data_sent_count,
            'fault_code' => $request->fault_code,
            'maintenance_due' => $request->maintenance_due,
            'manufacturer' => $request->manufacturer,
            'model_number' => $request->model_number,
            'firmware_version' => $request->firmware_version,
            'battery_level' => $request->battery_level,
            'module_configuration' => $request->module_configuration,
        ]);

        // Redirect to the module index page
        return redirect()->route('modules.index')->with('success', 'Module created successfully');
    }


    // Show the module status
    public function show($id)
    {
        $module = Module::with('histories')->findOrFail($id);
        return view('modules.show', compact('module'));
    }
}
