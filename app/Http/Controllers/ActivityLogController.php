<?php
namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;

use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

  public function index(Request $request)
{
    $query = ActivityLog::with('user');

    // ✅ Filter by action
    if ($request->action) {
        $query->where('action', $request->action);
    }

    // ✅ Filter by user
    if ($request->user_id) {
        $query->where('user_id', $request->user_id);
    }

    // ✅ Filter by date range
    if ($request->from_date) {
        $query->whereDate('created_at', '>=', $request->from_date);
    }

    if ($request->to_date) {
        $query->whereDate('created_at', '<=', $request->to_date);
    }

    $logs = $query->latest()->paginate(10);

    // ✅ Dropdown data
    $actions = ActivityLog::select('action')->distinct()->pluck('action');
    $users = User::select('id', 'name')->get();

    return view('logs.index', compact('logs', 'actions', 'users'));
}

}