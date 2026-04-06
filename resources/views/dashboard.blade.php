@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>

    <div class="card-container">
    <div class="dashboard-card"><a href="/patients">Patients</a></div>
    <div class="dashboard-card"><a href="/appointments">Appointments</a></div>
    <div class="dashboard-card"><a href="/reports">Reports</a></div>
    <div class="dashboard-card"><a href="/settings">Settings</a></div>
</div>
@endsection