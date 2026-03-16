<!DOCTYPE html>
<html>
<head>
    <title>Lab System</title>

    <style>
        body{
            font-family: Arial;
            margin:0;
        }

        .header{
            background:#333;
            color:white;
            padding:15px;
        }

        .container{
            display:flex;
        }

        .sidebar{
            width:200px;
            background:#f4f4f4;
            padding:15px;
            min-height:100vh;
        }

        .sidebar a{
            display:block;
            padding:8px;
            text-decoration:none;
            color:black;
        }

        .sidebar a:hover{
            background:#ddd;
        }

        .content{
            flex:1;
            padding:20px;
        }
    </style>

</head>

<body>

<div class="header">
    Laboratory Information System
</div>

<div class="container">

    <div class="sidebar">

        <p><b>{{ Auth::user()->name }}</b></p>

        <a href="/dashboard">Dashboard</a>
        <a href="/patients">Patients</a>
        <a href="/lab-tests">Lab Tests</a>
        <a href="/lab-orders">Lab Orders</a>
        <a href="/results">Results</a>
        <a href="/results">*Users</a>
        <a href="/results">*Register Patients</a>
        <a href="/results">*Search</a>
        <a href="/results">*Create Order</a>
        <a href="/results">*Medtech Dashboard</a>
        <a href="/results">*Check In Orders</a>
        <a href="/results">*Saved Results</a>
        <a href="/results">*Census</a>
        <a href="/results">*Non-Active Orders</a>
        <a href="/results">*Deletion</a>
        <a href="/results">*Edit</a>
        <a href="/results">*Post Test</a>
        <a href="/results">*Register To DB </a>
        <a href="/results">*Medtech Sections</a>
        <a href="/results">*Watermark</a>
        <a href="/results">*Turn Around Time</a>
        <a href="/results">*View Orders</a>
        <a href="/results">*Barcodes</a>
        <a href="/results">Generate excel</a>
      
        <hr>

        <a href="/logout">Logout</a>

    </div>

    <div class="content">

        @yield('content')

    </div>

</div>

</body>
</html>