@extends('layouts.app')
@section('title', 'Show User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <div class="card-header">{{ __('Show User') }}</div>

                <div class="card-body">
                    <a class="btn btn-info mb-3" href="{{ route('users.index') }}">Back</a>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <strong>Name:</strong> {{ $user->name }} </li>
                        <li class="list-group-item"> <strong>Email:</strong> {{ $user->email }} </li>
                        <li class="list-group-item"> <strong>Create At:</strong>
                            {{ $user->created_at->diffForHumans() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection