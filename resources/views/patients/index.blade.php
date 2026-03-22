@extends('layouts.app')

@section('content')

<h2>Patients</h2>

<div style="margin-bottom: 15px;">
    <a href="{{ url('/patients/create') }}" style="padding:8px 12px; background:#10b981; color:white; border-radius:5px; text-decoration:none;">
        + Add Patient
    </a>
</div>

<table style="width:100%; background:white; border-collapse:collapse; box-shadow:0 5px 15px rgba(0,0,0,0.1);">
    <tr style="background:#3b82f6; color:white;">
        <th style="padding:10px;">Patient ID</th>
        <th>Name</th>
        <th>Birthday</th>
        <th>Gender</th>
        <th>Actions</th>
    </tr>

    @foreach($patients as $patient)
    <tr>
        <td align="center"  style="padding:10px;">{{ $patient->patient_id }}</td>
        <td align="center" >{{ $patient->first_name }} {{ $patient->last_name }}</td>
        <td align="center" >{{ $patient->birthday }}</td>
        <td align="center" >{{ $patient->gender }}</td>
        <td align="center" style="display:flex; justify-content:center; gap:5px;">

    <!-- Edit link -->
    <a href="{{ url('/patients/'.$patient->id.'/edit') }}" 
       style="padding:6px 15px; background:#10b981; color:white; border-radius:5px; text-decoration:none;
              display:inline-flex; align-items:center; justify-content:center; height:36px;
              font-family: Arial, sans-serif; font-size:14px; line-height:1; box-sizing:border-box;">
       Edit
    </a>

    <!-- Delete button inside form -->
    <form action="{{ url('/patients/'.$patient->id) }}" method="POST" style="display:inline-flex; margin:0; padding:0;">
        @csrf
        @method('DELETE')
        <button type="submit" 
                onclick="return confirm('Delete this patient?')" 
                style="padding:6px 15px; background:#ef4444; color:white; border:none; border-radius:5px;
                       display:inline-flex; align-items:center; justify-content:center; height:36px;
                       font-family: Arial, sans-serif; font-size:14px; line-height:1; box-sizing:border-box; cursor:pointer;">
            Delete
        </button>
    </form>

</td>
    </tr>
    @endforeach

</table>

@endsection