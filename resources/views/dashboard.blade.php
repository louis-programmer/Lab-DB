<h1>Lab System Dashboard</h1>

<p>Welcome {{ Auth::user()->name }}</p>

<hr>

@extends('layouts.app')

@section('content')

<h1>Dashboard</h1>

<p>Welcome to the Laboratory Information System.</p>

@endsection

<hr>



<a href="/logout">Logout</a>