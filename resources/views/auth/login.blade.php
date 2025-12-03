@extends('layouts.app')

@section('content')
<div class="container my-5">

    <div class="card form-card p-4 mx-auto" style="max-width: 500px;">

        <h1 class="page-title text-center">Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-cspc w-100 mb-3">Login</button>

            <div class="text-center">
                <a href="{{ route('register') }}">Create an account</a>
            </div>
        </form>
    </div>
</div>
@endsection