@extends('layouts.app')
@section('title','Registration Page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route('register') }}">
                            <fieldset>
                                <legend>Enter your registration details</legend>

                            @csrf

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username:</label>

                                <div class="col-md-6">
                                    <input type="text" required name="username" id="username"
                                           class="form-control @error('username') is-invalid @enderror"
                                           value="{{ old('username') }}" autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>

                                <div class="col-md-6">
                                    <input type="password" required name="password" id="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email:</label>

                                <div class="col-md-6">
                                    <input type="email" required name="email" id="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">Webpage URL:</label>

                                <div class="col-md-6">
                                    <input type="url"  name="url" id="url"
                                           class="form-control @error('url') is-invalid @enderror"
                                           value="{{ old('url') }}" autocomplete="url">

                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">Date of birth:</label>

                                <div class="col-md-6">
                                    <input type="date"  required name="dob" id="dob"
                                           class="form-control @error('dob') is-invalid @enderror"
                                           value="{{ old('dob') }}" autocomplete="dob">

                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            </fieldset>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="submit" formnovalidate>Submit Details</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
