@extends('layouts.app')

@section('content')

<a href="{{ route('patients.index') }}" 
   style="display:inline-block; margin-bottom:10px; text-decoration:none; color:#3b82f6;">
   ← Back to Patients
</a>

<div style="max-width:400px; margin:auto; background:white; padding:25px; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">

    <h2 style="text-align:center;">Add Patient</h2>

    <form method="POST" action="{{ route('patients.store') }}">
        @csrf

       <label>First Name </label> <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required>
        @error('first_name') <div class="error">{{ $message }}</div> @enderror

       <label>Middle Name </label> <input type="text" name="middle_name" placeholder="Middle Name" value="{{ old('middle_name') }}" required>

        <label>Last Name </label> <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required>
        @error('last_name') <div class="error">{{ $message }}</div> @enderror

        <label>Birthday </label><input type="date" name="birthday" value="{{ old('birthday') }}" required>
        @error('birthday') <div class="error">{{ $message }}</div> @enderror

        <label>Gender </label><select name="gender">
            <option value="">Select Gender</option>
            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
        </select>
        @error('gender') <div class="error">{{ $message }}</div> @enderror

        <label>Address </label><input type="text" name="address" placeholder="Address" value="{{ old('address') }}" required>
        @error('address') <div class="error">{{ $message }}</div> @enderror

        <label>Contact Number </label><input type="text" name="contact_number" placeholder="09XXXXXXXXX" pattern="09[0-9]{9}" required> @error('contact_number') <div class="error">{{ $message }}</div> @enderror

        <label>Nationality </label><input type="text" name="nationality" placeholder="Nationality" value="{{ old('nationality') }}" required>
        @error('nationality') <div class="error">{{ $message }}</div> @enderror

        <button type="submit">Save Patient</button>
    </form>

</div>

@endsection