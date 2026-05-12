@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card login-card shadow">

            <div class="card-body p-5">

                <h3 class="text-center mb-4">
                    Admin Login
                </h3>

                <form method="POST" action="{{ route('login') }}">

                    @csrf

                    <div class="mb-3">

                        <label>Email Address</label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter email"
                        >

                        @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter password"
                        >

                        @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <button class="btn btn-primary w-100">
                        Login
                    </button>

                    <div class="text-center mt-3">

                        Don't have account?

                        <a href="{{ route('register') }}">
                            Register
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection