@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="card form-card p-4 mx-auto" style="max-width: 500px;">

        <h1 class="page-title text-center">Create Account</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <button class="btn btn-cspc w-100 mb-3">Register</button>

            <div class="text-center">
                <a href="{{ route('login') }}">Already have an account?</a>
            </div>
        </form>
    </div>
</div>
@endsection