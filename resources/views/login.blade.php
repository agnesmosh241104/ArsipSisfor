@extends('layout')
@section('title', 'registrasi')
@section('content')

<div class="container mt-5">
    @if(session('errors'))
        <div class="col-12">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        </div>
    @endif 

    @if(session()->has('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4" style="width: 390px; border-radius: 10px;">
        <div class="text-center">
            <img src="img/logo.jpg" alt="logo" width="200">
            <h2 class="mt-3">Sign In</h2>
            <p>Login To Stay Connected.</p>
        </div>
        <form action="{{route('registrasi')}}" method="post">
            @csrf 
            <div class="mb-3">
                <input type="text" class="form-control" id="name" name="name" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Sign In</button>
        </form>
        <div class="text-center mt-3">
            <p>Create an Account <a href="{{ route('registrasi') }}">Sign Up</a></p>
        </div>
    </div>
</div>

@endsection
