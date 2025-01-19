@extends('layouts.app')
@section('title', 'Create Post')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Create Post') }}</div>

                <div class="card-body">
                    <a class="btn btn-info mb-3" href="{{ route('posts.index') }}">Back</a>
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                            <label for="name">Title</label>
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                name="description" style="height: auto" rows="5"></textarea>
                            <label for="floatingTextarea">Description</label>


                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Image Upload</label>
                            <input type="file" name="image" class="form-control" id="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection