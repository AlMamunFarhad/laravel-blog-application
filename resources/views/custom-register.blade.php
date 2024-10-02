@extends('layouts.custom-login-layout')

@section('content')
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header">
            <h3 class="text-center font-weight-light my-4">Create Account</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('custom.register') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input value="{{old('firstname')}}" name="firstname" aria-describedby="inputFirstnameFeedback"
                                class="form-control @error('firstname') is-invalid @enderror" id="inputFirstName"
                                type="text" placeholder="Enter your first name" />
                            <label for="inputFirstName">First name</label>
                            @error('firstname')
                                <div id="inputFirstnameFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input value="{{old('lastname')}}" class="form-control @error('firstname') is-invalid @enderror" id="inputLastName"
                                type="text" placeholder="Enter your last name" name="lastname"
                                aria-describedby="inputLastnameFeedback" />
                            <label for="inputLastName">Last name</label>
                            @error('lastname')
                                <div class="invalid-feedback" id="inputLastnameFeedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control @error('email') is-invalid @enderror" id="inputEmail" type="email"
                        placeholder="name@example.com" aria-describedby="inputEmailFeedback" name="email" />
                    <label for="inputEmail">Email address</label>
                    @error('email')
                        <div id="inputEmailFeedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                type="password" placeholder="Create a password" aria-describedby="inputPasswordFeedback"
                                name="password" />
                            <label for="inputPassword">Password</label>
                            @error('password')
                                <div class="invalid-feedback" id="inputPasswordFeedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                            <input aria-describedby="inputPasswordConfirmation" name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="inputPasswordConfirm" type="password" placeholder="Confirm password" />
                            <label for="inputPasswordConfirm">Confirm Password</label>
                            @error('password_confirmation')
                                <div class="invalid-feedback" id="inputPasswordConfirmation">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-0">
                    <div class="d-grid"><button class="btn btn-primary btn-block" type="submit">Create Account</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
            <div class="small"><a href="{{ route('custom.login') }}">Have an account? Go to login</a></div>
        </div>
    </div>
@endsection
