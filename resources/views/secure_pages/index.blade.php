@extends('layouts.app')
@section('title', 'Secure Page')
@section('content')
    <h1>{{$message}}</h1>
    @if($message == 'You must log in to access this page')
        <form method="GET" action="{{route('login')}}">
            <input type="submit" value="Login">
        </form>
    @else
        <ul>
            @foreach($info as $key => $value)
                <li><strong>{{ucfirst($key)}}</strong>: @if($value == null)
                                                        Nothing registered
                                                        @else{{$value}}
                                                        @endif</li>
            @endforeach
        </ul>
    @endif
@endsection
