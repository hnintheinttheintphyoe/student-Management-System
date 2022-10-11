@extends('layouts/master')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">

        <div class="col-6">
            <h1 class="text-primary">Register Page</h1>
            <form action="{{ route('register') }}" method="post">
                @csrf
            <div class="mb-2">
                <label for="">Name</label>
                <input type="text" class="form-control @error('name')
                  is-invalid
                @enderror" name="name" value="{{ old('name') }}">
                @error('name')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="">Email</label>
                <input type="email" class="form-control @error('email')
                is-invalid
                @enderror" name="email" value="{{ old('email') }}">
                @error('email')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="">Address</label>
                <input type="text" class="form-control @error('address')
                  is-invalid
                @enderror" name="address" value="{{ old('address') }}">
                @error('address')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="">Phone</label>
                <input type="text" class="form-control @error('phone')
                  is-invalid
                @enderror" name="phone" value="{{ old('phone') }}">
                @error('phone')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="">Password</label>
                <input type="password" class="form-control @error('password')
                    is-invalid
                @enderror" name="password" value="{{ old('password') }}">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-2">
                <label for="">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation')
                   is-invalid
                @enderror" name="password_confirmation" value="{{ old('password_confirmation') }}">
                @error('password_confirmation')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class=" ">
               <button type="submit" class="btn btn-primary text-right">Register</button>
            </div>
        </form>
        </div>

       <div class="register-link">
        <p>
            Already have account?
            <a href="{{ route('auth#loginPage') }}">Sign In</a>
        </p>
    </div>
    </div>
</div>

@endsection
