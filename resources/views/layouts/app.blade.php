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
.action-btn {
    padding: 6px 15px;
    border-radius: 5px;
    color: white;
    font-family: Arial, sans-serif;
    font-size: 14px;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 36px;
    text-decoration: none;
    cursor: pointer;
}

.action-edit { background: #10b981; }
.action-delete { background: #ef4444; border: none; }


.success { background:#d1fae5; padding:10px; margin-bottom:15px; border-radius:5px; color:#065f46; }
.error { background:#fee2e2; padding:10px; margin-bottom:15px; border-radius:5px; color:#b91c1c; }

.container {
    max-width: 900px;
    margin: auto;
}

.form-container {
    max-width: 400px;
    background: white;
    padding: 25px;
    margin-top: 20px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.top-bar {
    margin-bottom: 15px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.table th {
    background: #3b82f6;
    color: white;
    padding: 10px;
}

.table td {
    padding: 10px;
    text-align: center;
}

.actions {
    display: flex;
    justify-content: center;
    gap: 6px;
}

/* 🔥 BUTTON SYSTEM (fixes your issue) */
.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 36px;
    padding: 0 14px;
    border-radius: 6px;
    font-size: 14px;
    color: white;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-edit {
    background: #10b981;
}

.btn-delete {
    background: #ef4444;
}

.btn-primary {
    background: #3b82f6;
}

/* form */
.form-group {
    margin-bottom: 12px;
}

input, select {
    width: 100%;
    padding: 8px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button {
    width: 100%;
}

.back-link {
    display:inline-block;
    margin-bottom:10px;
    color:#3b82f6;
    text-decoration:none;
}

.alert.success {
    background:#d1fae5;
    padding:10px;
    border-radius:5px;
    margin-bottom:10px;
}

.alert {
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 15px;
    transition: opacity 0.5s ease;
}


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
    <div class="alert success" id="alert-box">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert error" id="alert-box">
        {{ session('error') }}
    </div>
@endif

    @yield('content')

</div>


<script>
    setTimeout(() => {
        const alert = document.getElementById('alert-box');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease";
            alert.style.opacity = "0";

            setTimeout(() => {
                alert.remove();
            }, 500);
        }
    }, 3000);
</script>

</body>
</html>