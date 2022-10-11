@extends('layouts/master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">

            <div class="col-6">
                <h1 class="text-primary">Login Page</h1>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                <div class="mb-2">
                    <label for="">Email</label>
                    <input type="email" class="form-control @error('email')
                        is-invalid
                    @enderror" name="email">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                <div class="mb-2">
                    <label for="">Password</label>
                    <input type="password" class="form-control @error('password')
                        is-invalid
                    @enderror" name="password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class=" ">
                    <button type="submit" class="btn btn-primary text-right">Login</button>
                </div>
            </form>
            </div>

        <div class="register-link">
            <p>
                Don't you have account?
                <a href="{{ route('auth#registerPage') }}">Sign Up Here</a>
            </p>
        </div>
        <div>

        </div>
    </div>
</div>

@endsection
