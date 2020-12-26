@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                        <form method="GET" action="{{route('secure-pages.index')}}">
                            <input type="submit" value="Secure Page" class="mt-3">
                        </form>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <input type="submit" value="Logout" class="mt-2">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
