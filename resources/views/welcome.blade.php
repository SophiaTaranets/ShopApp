@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        @auth
            <a href="{{ route('/') }}" class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md">Log in</a>

{{--            @if (Route::has('register'))--}}
{{--                <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-gray-800 text-gray-200 rounded-md">Register</a>--}}
            @endif
        @endauth
    </div>
@endsection
