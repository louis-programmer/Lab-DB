<div class="container form-container">

    <h2>{{ isset($patient) ? 'Edit Patient' : 'Add Patient' }}</h2>

    <a href="{{ route('patients.index') }}" class="back-link">← Back</a>

    <form method="POST" 
          action="{{ isset($patient) ? route('patients.update', $patient->id) : route('patients.store') }}">

        @csrf
        @if(isset($patient)) @method('PUT') @endif

        <!-- First Name -->
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="first_name"
                value="{{ old('first_name', $patient->first_name ?? '') }}" required>
            @error('first_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- Middle Name -->
        <div class="form-group">
            <label>Middle Name</label>
            <input type="text" name="middle_name"
                value="{{ old('middle_name', $patient->middle_name ?? '') }}">
            @error('middle_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- Last Name -->
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="last_name"
                value="{{ old('last_name', $patient->last_name ?? '') }}" required>
            @error('last_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- Birthday -->
        <div class="form-group">
            <label>Birthday</label>
            <input type="date" name="birthday"
                value="{{ old('birthday', $patient->birthday ?? '') }}" required>
            @error('birthday') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- Gender -->
        <div class="form-group">
            <label>Gender</label>
            <select name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male" 
                    {{ old('gender', $patient->gender ?? '') == 'Male' ? 'selected' : '' }}>
                    Male
                </option>
                <option value="Female" 
                    {{ old('gender', $patient->gender ?? '') == 'Female' ? 'selected' : '' }}>
                    Female
                </option>
            </select>
            @error('gender') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- Address -->
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address"
                value="{{ old('address', $patient->address ?? '') }}" required>
            @error('address') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- Contact -->
        <div class="form-group">
            <label>Contact Number</label>
            <input type="text" name="contact_number"
                value="{{ old('contact_number', $patient->contact_number ?? '') }}" required>
            @error('contact_number') <div class="error">{{ $message }}</div> @enderror
        </div>

        <!-- Nationality -->
        <div class="form-group">
            <label>Nationality</label>
            <input type="text" name="nationality"
                value="{{ old('nationality', $patient->nationality ?? '') }}" required>
            @error('nationality') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($patient) ? 'Update' : 'Save' }} Patient
        </button>

    </form>

</div>