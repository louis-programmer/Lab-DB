<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Lab System</title>

<style>
body {
    font-family: Arial;
    margin: 0;
    display: flex;
    background: #f3f4f6;
}

/* Sidebar */
.sidebar {
    width: 220px;
    background: #3b82f6;
    color: white;
    height: 100vh;
    padding-top: 20px;
}

.sidebar h2 {
    text-align: center;
}

.sidebar a {
    display: block;
    color: white;
    padding: 12px 20px;
    text-decoration: none;
}

.sidebar a:hover {
    background: #2563eb;
}

/* Main content */
.main {
    flex: 1;
    padding: 30px;
}

/* Flash message */
.success {
    background: #d1fae5;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
}

/* Form inputs */
input, select {
    width: 100%;
    padding: 8px;
    margin-bottom: 12px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

label {
    font-size: 14px;
    font-weight: bold;
}

button {
    width: 100%;
    padding: 10px;
    background: #3b82f6;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background: #2563eb;
}

.error {
    color: red;
    font-size: 12px;
}
.action-btn {
    display: inline-flex;        /* use flex for perfect centering */
    align-items: center;         /* vertically center text */
    justify-content: center;     /* horizontally center text */
    padding: 6px 15px;
    min-width: 80px;
    height: 36px;                /* force same height */
    font-size: 14px;
    border-radius: 5px;
    text-decoration: none;
    cursor: pointer;
    border: none;
    box-sizing: border-box;
    color: white;
}

.action-edit { background-color: #10b981; }
.action-delete { background-color: #ef4444; }

.action-edit:hover { background-color: #059669; }
.action-delete:hover { background-color: #dc2626; }

/* make forms inline-flex so button doesn’t stretch */
form.inline { display: inline-flex; margin: 0; padding: 0; } background-color: #059669; }

</style>
</head>

<body>

<div class="sidebar">
    <h2>Lab Menu</h2>
    <a href="/dashboard">Dashboard</a>
    <a href="{{ route('patients.index') }}">Patients</a>
    <a href="{{ route('patients.create') }}">Add Patient</a>
    <a href="/logout">Logout</a>
</div>

<div class="main">

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @yield('content')

</div>

</body>
</html>