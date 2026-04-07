<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\ActivityLog;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $patients = Patient::paginate(10);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'contact_number' => 'required|string|max:20',
            'nationality' => 'required|string|max:100',
        ]);

        $validated['patient_id'] = 'P' . now()->format('Ymd') . rand(1000,9999);

        $patient = Patient::create($validated);

        // Update search index
        $patient->updateSearchIndex();

        // Activity log
        logActivity('Added Patient', 'Patient ID: ' . $patient->patient_id);

        return redirect()->route('patients.index')->with('success', 'Patient added!');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'gender' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'contact_number' => 'required|string|max:20',
            'nationality' => 'required|string|max:100',
        ]);

        $patient->update($validated);

        // Update search index
        $patient->updateSearchIndex();

        // Activity log
        logActivity('Updated Patient', 'Patient ID: ' . $patient->patient_id);

        return redirect()->route('patients.index')->with('success', 'Patient updated!');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);

        $patientId = $patient->patient_id;

        $patient->delete();

        // Activity log
        logActivity('Deleted Patient', 'Patient ID: ' . $patientId);

        return redirect()->route('patients.index')->with('success', 'Patient deleted!');
    }
}