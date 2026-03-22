<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background: #f3f4f6;
        display: flex;
        height: 100vh;
    }

    /* Sidebar */
    .sidebar {
        width: 220px;
        background: #3b82f6;
        color: white;
        display: flex;
        flex-direction: column;
        padding-top: 20px;
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 30px;
    }

    .sidebar a {
        color: white;
        text-decoration: none;
        padding: 15px 20px;
        display: block;
        transition: background 0.2s;
    }

    .sidebar a:hover {
        background: #2563eb;
    }

    .logout {
        margin-top: auto;
        margin-bottom: 20px;
        background: #ef4444;
        text-align: center;
        padding: 12px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        margin-left: 10px;
        margin-right: 10px;
    }

    .logout:hover {
        background: #b91c1c;
    }

    /* Main content */
    .main {
        flex: 1;
        padding: 30px;
        overflow-y: auto;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        background: #ffffff;
        width: 200px;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.2s;
        cursor: pointer;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card a {
        text-decoration: none;
        color: #1f2937;
        font-weight: bold;
        display: block;
    }

    @media (max-width: 768px) {
        body {
            flex-direction: column;
        }
        .sidebar {
            width: 100%;
            flex-direction: row;
            overflow-x: auto;
        }
        .sidebar a, .logout {
            flex: 1;
            text-align: center;
        }
    }
</style>
</head>
<body>

<div class="sidebar">
    <h2>Lab Menu</h2>
    <a href="/patients">View Patients</a>
    <a href="/patients/create">Add Patient</a>
    <a href="/appointments">Appointments</a>
    <a href="/reports">Reports</a>
    <a href="/settings">Settings</a>
    <a href="/logout" class="logout">Logout</a>
</div>

<div class="main">
    <h1>Dashboard</h1>
    <div class="card-container">
        <div class="card"><a href="/patients">Patients</a></div>
        <div class="card"><a href="/appointments">Appointments</a></div>
        <div class="card"><a href="/reports">Reports</a></div>
        <div class="card"><a href="/settings">Settings</a></div>
    </div>
</div>

</body>
</html>