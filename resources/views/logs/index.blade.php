@push('styles')
<style>
.action-badge {
    display: inline-block;
    width: 140px;        /* 👈 fixed width */
    text-align: center;  /* center text */
    padding: 6px 10px;
    border-radius: 6px;
    font-weight: 500;
}

/* Colors */
.action-added {
    background-color: #d1fae5;
    color: #065f46;
}
.action-updated {
    background-color: #fef3c7;
    color: #92400e;
}
.action-deleted {
    background-color: #fee2e2;
    color: #b91c1c;
}
.action-default {
    background-color: #e5e7eb;
    color: #374151;
}
</style>
@endpush

@extends('layouts.app')

@section('content')

<div style="max-width:1000px; margin:auto;">

    <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">

        

         <div class="card-header">
            <h2 style="margin-bottom:20px;">Activity Logs</h2>
            <a href="{{ route('dashboard') }}" class="button button-outline">← Back</a>      
          </div>


       <form method="GET" 
      style="margin-bottom:20px; display:flex; flex-wrap:wrap; gap:10px; align-items:center;">

    <!-- Action -->
    <select name="action" style="padding:6px; border-radius:5px;">
        <option value="">All Actions</option>
        @foreach($actions as $action)
            <option value="{{ $action }}" 
                {{ request('action') == $action ? 'selected' : '' }}>
                {{ $action }}
            </option>
        @endforeach
    </select>

    <!-- User -->
    <select name="user_id" style="padding:6px; border-radius:5px;">
        <option value="">All Users</option>
        @foreach($users as $user)
            <option value="{{ $user->id }}" 
                {{ request('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
            </option>
        @endforeach
    </select>

    <!-- Date From -->
    <input type="date" name="from_date" 
        value="{{ request('from_date') }}"
        style="padding:6px; border-radius:5px;" />

    <!-- Date To -->
    <input type="date" name="to_date" 
        value="{{ request('to_date') }}"
        style="padding:6px; border-radius:5px;" />

    <!-- Buttons -->
    <button type="submit" class="button">Filter</button>

    <a href="{{ route('logs.index') }}" class="button button-outline">
        Reset
    </a>

</form>

        <table class="table">
            <thead>
                
                <tr style="background:#f5f5f5;">
                    <th style="padding:10px;">User</th>
                    <th style="padding:10px;">Action</th>
                    <th style="padding:10px;">Description</th>
                    <th style="padding:10px;">IP</th>
                    <th style="padding:10px;">Date</th>
                </tr>
                </center>
            </thead>

            <tbody>
               @forelse($logs as $log)
                <tr class="{{ $loop->even ? 'row-even' : 'row-odd' }}">
                        <td style="padding:10px;">
                            {{ $log->user->name ?? 'N/A' }}
                        </td>

                        <td style="padding:10px;">
                            @php
                                $class = match(true) {
                                    str_contains($log->action, 'Added') => 'action-added',
                                    str_contains($log->action, 'Updated') => 'action-updated',
                                    str_contains($log->action, 'Deleted') => 'action-deleted',
                                    default => 'action-default'
                                };
                            @endphp

                            <span class="action-badge {{ $class }}">
                                {{ $log->action }}
                            </span>
                        </td>

                        <td style="padding:10px;">
                            {{ $log->description }}
                        </td>

                        <td style="padding:10px;">
                            {{ $log->ip_address }}
                        </td>

                        <td style="padding:10px;">
                            {{ $log->created_at->format('M d, Y h:i A') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding:20px;">No logs found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:20px;">
    {{ $logs->onEachSide(1)->links('pagination::simple-bootstrap-4') }}
</div>

    </div>

</div>

@endsection