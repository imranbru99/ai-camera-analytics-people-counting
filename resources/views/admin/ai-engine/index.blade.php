@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1>AI Engine Management</h1>
        <a href="{{ route('admin.ai-engine.create') }}" class="btn btn-primary mb-3">Create AI Engine</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($aiEngines as $aiEngine)
                    <tr>
                        <td>{{ $aiEngine->id }}</td>
                        <td>{{ $aiEngine->name }}</td>
                        <td>{{ $aiEngine->created_at }}</td>
                        <td>{{ $aiEngine->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.ai-engine.edit', $aiEngine->id) }}" class="btn btn-secondary">Edit</a>
                            <form action="{{ route('admin.ai-engine.destroy', $aiEngine->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
