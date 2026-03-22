<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{

    /*
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }
*/

    public function __construct()
    {
        $this->middleware('auth');
    }
    /* Why:
    Even if someone forgets middleware in routes → still protected
    */



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

            \App\Models\Patient::create($validated);

            return redirect()->route('patients.index')->with('success', 'Patient added!');
        }



           

        public function index()
            {
                $patients = Patient::all();
                return view('patients.index', compact('patients'));
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

                return redirect()->route('patients.index')->with('success', 'Patient updated!');
            }

            public function destroy($id)
            {
                $patient = Patient::findOrFail($id);
                $patient->delete();

                return redirect()->route('patients.index')->with('success', 'Patient deleted!');
            }




}