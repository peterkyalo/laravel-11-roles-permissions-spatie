@extends('layouts.app')
@section('title', 'Manage Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow border border-primary">
                <div class="card-header">{{ __('Posts') }}</div>

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
                        <a class="btn btn-success mb-3" href="{{ route('posts.create') }}">Create User</a>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Create By</th>
                                    <th>Post Image</th>
                                    <th>Slug</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td><img src="{{ asset('storage/images/' . $post->image) }}"
                                                alt="{{ $post->title }}" width="50" height="50" class="img-thumbnail"> </td>
                                        <td>{{ Str::limit($post->slug, 10) }}</td>
                                        <td>{{ Str::limit($post->title, 10) }}</td>
                                        <td>{{ Str::limit($post->description, 20)}}</td>
                                        <td>{{ $post->created_at->format('l, M j, Y, h:i:s A') }}</td>
                                        <td>
                                            <form action="{{ route('posts.destroy', $post->slug) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-primary btn-sm"
                                                    href="{{ route('posts.edit', $post->slug) }}">Edit</a>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('posts.show', $post->slug) }}">Show</a>
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