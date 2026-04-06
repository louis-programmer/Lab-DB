<!DOCTYPE html>
<html lang="en">
<head>
@stack('styles') {{-- for page-specific overrides --}}
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<style>
    


</style>
</head>
<body>

<div class="sidebar">
    <h2>
         <a href="{{ route('dashboard') }}" class="logo-link">
            Lab Menu
         </a>
    </h2>
    <a href="/patients">Patients</a>
    <a href="/appointments">Appointments</a>
    <a href="/reports">Reports</a>
    <a href="/settings">Settings</a>

    @auth
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('logs.index') }}">Activity Logs</a>
        @endif
    @endauth


   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout">
    Logout
</a>
</div>

<div class="main">
    @yield('content')
</div>

</body>
</html>