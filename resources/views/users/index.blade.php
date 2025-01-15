@extends('layouts.app')
@section('title', 'Manage Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border border-primary">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    <div class="table-responsive">
                        {{-- Show success message --}}
                        @session('success')
                            {{-- <div class="alert alert-success">
                                {{ $value }}
                            </div> --}}
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{$value}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endsession
                        <a class="btn btn-success mb-3" href="{{ route('users.create') }}">Create User</a>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('users.edit', $user->id) }}">Edit</a>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('users.show', $user->id) }}">Show</a>
                                                <button type="submit" onclick="return confirm('Are sure to delete?')"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection