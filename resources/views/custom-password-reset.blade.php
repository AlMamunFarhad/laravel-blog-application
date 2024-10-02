@extends('layouts.custom-login-layout')


@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Reset Password</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('custom.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form-floating mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" name="email" id="inputEmail"
                        type="email" placeholder="name@example.com" aria-describedby="inputEmailFeedback"
                        value="{{ $email ?? old('email') }}" />
                    <label for="inputEmail">Email address</label>
                    @error('email')
                        <div id="inputEmailFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control @error('password') is-invalid @enderror" name="password" id="inputPassword"
                        type="password" autocomplete="off" placeholder="Password"
                        aria-describedby="inputPasswordFeedback" />
                    <label for="inputPassword">Password</label>
                    @error('password')
                        <div id="inputPasswordFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation" id="inputPassword" type="password" placeholder="Password Confirmation"
                        aria-describedby="inputPasswordConfirmationFeedback" />
                    <label for="inputPassword">Confirm Password</label>
                    @error('password_confirmation')
                        <div id="inputPasswordConfirmationFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
