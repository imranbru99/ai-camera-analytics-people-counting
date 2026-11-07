@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Analytics Reports</h1>
        @if ($reports->isEmpty())
            <p>No analytics reports available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                        <tr>
                            <td>{{ $report->id }}</td>
                            <td>{{ $report->name }}</td>
                            <td>{{ $report->created_at }}</td>
                            <td>
                                <a href="{{ route('analytics.reports.show', $report->id) }}" class="btn btn-sm btn-primary">View</a>
                                <a href="{{ route('analytics.reports.edit', $report->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                <form action="{{ route('analytics.reports.destroy', $report->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
