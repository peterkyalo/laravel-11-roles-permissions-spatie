@extends('layouts.app')
@section('title', 'Update Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Update Post') }}</div>

                <div class="card-body">
                    <a class="btn btn-info mb-3" href="{{ route('posts.index') }}">Back</a>
                    <form action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- Show success message --}}
                        @session('success')
                            <div class="alert alert-success">
                                {{ $value }}
                            </div>
                        @endsession
                        {{-- @ssession('success')
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endsession --}}

                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="description" placeholder="Leave a comment here"
                                id="floatingTextarea" style="height: auto"
                                rows="5">{{ old('description', $post->description) }}</textarea>
                            <label for="floatingTextarea">Description</label>

                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3>
                            <label class=" form-label">Current Image</label><br>
                            <img src=" {{ asset('storage/images/' . $post->image) }}" alt="{{ $post->title }}"
                                class="img-thumbnail">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label for="image">Upload New Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection