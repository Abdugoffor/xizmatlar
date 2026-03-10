@extends('layouts.admin')

@section('title', 'History')

@section('content')

    <div class="content">

        <div class="card">

            <div class="card-header">
                <h5 class="card-title">
                    History
                </h5>
            </div>


            <div class="table-responsive">

                <table class="table text-nowrap table-bordered">

                    <thead>

                        <tr>
                            <th>№</th>
                            <th>User</th>
                            <th>Action</th>
                            <th>Old</th>
                            <th>New</th>
                            <th>Date</th>
                        </tr>

                    </thead>
                    <tbody>
                        @forelse($histories as $history)
                            <tr>
                                <td>
                                    {{ ($histories->currentPage() - 1) * $histories->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    {{ $history->user->name ?? '-' }}
                                </td>
                                <td>
                                    <span class="badge
                                                    @if($history->action == 'created') badge-success
                                                    @elseif($history->action == 'updated') badge-warning
                                                    @elseif($history->action == 'deleted') badge-danger
                                                    @else badge-secondary
                                                    @endif
                                                    ">
                                        {{ ucfirst($history->action) }}
                                    </span>
                                </td>
                                <td>
                                    @if(is_array($history->old_data))
                                        <ul class="small">
                                            @foreach($history->old_data as $key => $value)
                                                <li>
                                                    <strong>{{ $key }}</strong> :
                                                    <span class="text-danger">
                                                        {{ is_array($value) ? json_encode($value) : $value }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    @if(is_array($history->new_data))
                                        <ul class="small">
                                            @foreach($history->new_data as $key => $value)
                                                <li>
                                                    <strong>{{ $key }}</strong> :
                                                    <span class="text-success">
                                                        {{ is_array($value) ? json_encode($value) : $value }}
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    {{ $history->created_at->format('d.m.Y H:i') }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    No history found
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $histories->links() }}
            </div>

        </div>

    </div>

@endsection