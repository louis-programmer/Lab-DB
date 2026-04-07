@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
@php
$cards = [
    ['title' => 'Patients', 'desc' => 'Manage patient records', 'url' => '/patients', 'icon' => '👤'],
    ['title' => 'Appointments', 'desc' => 'View and schedule visits', 'url' => '/appointments', 'icon' => '📅'],
    ['title' => 'Reports', 'desc' => 'Generate reports', 'url' => '/reports', 'icon' => '📊'],
    ['title' => 'Settings', 'desc' => 'System settings', 'url' => '/settings', 'icon' => '⚙️'],
    ['title' => 'Logs', 'desc' => 'View logs', 'url' => '/logs', 'icon' => '📜', 'role' => 'admin'],
];
@endphp

<div class="card-container">
   @foreach ($cards as $card)
    @if (isset($card['role']) && auth()->user()->role !== $card['role'])
        @continue
    @endif

    <a href="{{ $card['url'] }}" class="dashboard-card">
        <h3>{{ $card['icon'] }} {{ $card['title'] }}</h3>
        <p>{{ $card['desc'] }}</p>
    </a>
@endforeach
</div>
@endsection