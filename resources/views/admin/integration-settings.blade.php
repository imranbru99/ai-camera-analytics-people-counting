@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Integration Settings</h2>
        <form action="{{ route('integrations.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label for="condition" class="form-label">Condition:</label>
                <input type="text" class="form-control" id="condition" name="condition" required>
            </div>

            <div class="mb-3">
                <label for="action" class="form-label">Action:</label>
                <input type="text" class="form-control" id="action" name="action" required>
            </div>

            <div class="mb-3">
                <label for="notification_channels" class="form-label">Notification Channels:</label>
                <select multiple class="form-select" id="notification_channels" name="notification_channels[]" required>
                    @foreach ($notificationChannels as $channel)
                        <option value="{{ $channel }}">{{ $channel }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="scheduling" class="form-label">Scheduling:</label>
                <input type="text" class="form-control" id="scheduling" name="scheduling" required>
            </div>

            <div class="mb-3">
                <label for="escalation" class="form-label">Escalation:</label>
                <input type="text" class="form-control" id="escalation" name="escalation" required>
            </div>

            <div class="mb-3">
                <label for="retry" class="form-label">Retry:</label>
                <input type="text" class="form-control" id="retry" name="retry" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Integration</button>
        </form>
    </div>
@endsection
