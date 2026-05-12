@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6">

        <div class="card mt-5 shadow">

            <div class="card-body p-5">

                <h2 class="text-center mb-4">
                    Admin Register
                </h2>

                <form method="POST" action="{{ route('register') }}">

                    @csrf

                    <div class="mb-3">
                        <label class="form-label">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter full name"
                        >

                        @error('name')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Email Address
                        </label>

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
                        <label class="form-label">
                            Password
                        </label>

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

                    <div class="mb-4">
                        <label class="form-label">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm password"
                        >
                    </div>

                    <button class="btn btn-primary w-100">
                        Register
                    </button>

                    <div class="text-center mt-3">

                        Already have account?

                        <a href="{{ route('login') }}">
                            Login
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection