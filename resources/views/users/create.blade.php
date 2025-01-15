@extends('layouts.app')
@section('title', 'Create Users')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">{{ __('Create User') }}</div>

                <div class="card-body">
                    <a class="btn btn-info mb-3" href="{{ route('users.index') }}">Back</a>
                    <form action="{{ route('users.store') }}" method="POST">
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
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3>
                                <label for=" email">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for=" password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Create User</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection