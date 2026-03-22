@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Patients</h2>

    <div class="top-bar">
        <a href="{{ route('patients.create') }}" class="btn btn-primary">
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
                <th class="center">Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($patients as $patient)
            <tr>
                <td>{{ $patient->patient_id }}</td>
                <td>{{ $patient->first_name }} {{ $patient->last_name }}</td>
                <td>{{ $patient->birthday }}</td>
                <td>{{ $patient->gender }}</td>

                <td class="actions">
                    <a href="{{ route('patients.edit', $patient->id) }}" 
                       class="btn btn-edit">Edit</a>

                    <form action="{{ route('patients.destroy', $patient->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-delete"
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