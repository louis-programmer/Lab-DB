<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $logs = \App\Models\ActivityLog::with('user')
                    ->latest()
                    ->paginate(10);

        return view('logs.index', compact('logs'));
    }
}