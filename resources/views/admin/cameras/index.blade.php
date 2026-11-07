@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>Cameras</h1>
        <a href="{{ route('admin.cameras.create') }}" class="btn btn-primary mb-3">Add Camera</a>

        @if ($cameras->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cameras as $camera)
                        <tr>
                            <td>{{ $camera->id }}</td>
                            <td>{{ $camera->name }}</td>
                            <td>{{ $camera->description }}</td>
                            <td>{{ $camera->status }}</td>
                            <td>
                                <a href="{{ route('admin.cameras.edit', $camera) }}" class="btn btn-secondary mr-2">Edit</a>
                                <form action="{{ route('admin.cameras.destroy', $camera) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No cameras found.</p>
        @endif
    </div>
@endsection
