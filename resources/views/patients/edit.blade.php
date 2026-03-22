@extends('layouts.app')

@section('content')

<div style="max-width:400px; margin:auto; background:white; padding:25px; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">

    <h2 style="text-align:center;">Edit Patient</h2>

    <!-- Back Button -->
    <a href="{{ route('patients.index') }}" 
       style="display:inline-block; margin-bottom:15px; color:#3b82f6; text-decoration:none;">
       ← Back to Patients
    </a>

    <form method="POST" action="{{ route('patients.update', $patient->id) }}">
        @csrf
        @method('PUT')

        <input type="text" name="first_name" placeholder="First Name" 
               value="{{ old('first_name', $patient->first_name) }}">
        @error('first_name') <div class="error">{{ $message }}</div> @enderror

        <input type="text" name="middle_name" placeholder="Middle Name" 
               value="{{ old('middle_name', $patient->middle_name) }}">

        <input type="text" name="last_name" placeholder="Last Name" 
               value="{{ old('last_name', $patient->last_name) }}">
        @error('last_name') <div class="error">{{ $message }}</div> @enderror

        <input type="date" name="birthday" 
               value="{{ old('birthday', $patient->birthday) }}">
        @error('birthday') <div class="error">{{ $message }}</div> @enderror

        <select name="gender">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender', $patient->gender) == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender', $patient->gender) == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        @error('gender') <div class="error">{{ $message }}</div> @enderror

        <input type="text" name="address" placeholder="Address" 
               value="{{ old('address', $patient->address) }}">
        @error('address') <div class="error">{{ $message }}</div> @enderror

        <input type="text" name="contact_number" placeholder="Contact Number" 
               value="{{ old('contact_number', $patient->contact_number) }}">
        @error('contact_number') <div class="error">{{ $message }}</div> @enderror

        <input type="text" name="nationality" placeholder="Nationality" 
               value="{{ old('nationality', $patient->nationality) }}">
        @error('nationality') <div class="error">{{ $message }}</div> @enderror

        <button type="submit" style="margin-top:10px;">Update Patient</button>
    </form>

</div>

@endsection