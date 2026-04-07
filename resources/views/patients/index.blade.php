@extends('layouts.app')

@section('content')
<div class="container">

     <div class="card-header">
            <h2 style="margin-bottom:20px;"> Patients</h2>
            <a href="{{ route('dashboard') }}" class="button button-outline">← Back</a>      
          </div>


    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:15px;">
        <a href="{{ route('patients.create') }}" class="button button-primary">
            + Add Patient
        </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Name</th>
                <th>Birthday</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($patients as $patient)
           <tr class="{{ $loop->even ? 'row-even' : 'row-odd' }}">
                <td>{{ $patient->patient_id }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ $patient->birthday }}</td>
                <td>{{ $patient->gender }}</td>

                <td>
                    <a href="{{ route('patients.edit', $patient->id) }}" 
                       class="button button-primary">
                        Edit
                    </a>

                    <form action="{{ route('patients.destroy', $patient->id) }}" 
                          method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')

                        <button type="submit" 
                                class="button button-danger"
                                onclick="return confirm('Delete this patient?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div style="margin-top:15px; text-align:center;">
        {{ $patients->links('pagination::simple-default') }}
    </div>

</div>
@endsection