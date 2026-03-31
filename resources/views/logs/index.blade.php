@extends('layouts.app')

@section('content')

<div style="max-width:1000px; margin:auto;">

    <div style="background:white; padding:25px; border-radius:10px; box-shadow:0 8px 20px rgba(0,0,0,0.1);">

        <h2 style="margin-bottom:20px;">Activity Logs</h2>

        <table style="width:100%; border-collapse:collapse;">
            <thead>
                <tr style="background:#f5f5f5;">
                    <th style="padding:10px;">User</th>
                    <th style="padding:10px;">Action</th>
                    <th style="padding:10px;">Description</th>
                    <th style="padding:10px;">IP</th>
                    <th style="padding:10px;">Date</th>
                </tr>
            </thead>

            <tbody>
                @forelse($logs as $log)
                    <tr style="border-top:1px solid #ddd; text-align:center;">
                        <td style="padding:10px;">
                            {{ $log->user->name ?? 'N/A' }}
                        </td>

                        <td style="padding:10px;">
                            <span style="padding:5px 10px; border-radius:5px; background:#e3f2fd;">
                                @php
                                    $color = match(true) {
                                        str_contains($log->action, 'Added') => '#d4edda',
                                        str_contains($log->action, 'Updated') => '#fff3cd',
                                        str_contains($log->action, 'Deleted') => '#f8d7da',
                                        default => '#e3f2fd'
                                    };
                                @endphp

                                <span style="padding:5px 10px; border-radius:5px; background:{{ $color }};">
                                    {{ $log->action }}
                                </span>
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
            {{ $logs->links() }}
        </div>

    </div>

</div>

@endsection