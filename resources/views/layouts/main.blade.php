{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport"--}}
{{--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Document</title>--}}
{{--    <style>--}}
{{--        .container {--}}
{{--            padding: 10px;--}}
{{--        }--}}

{{--        .header {--}}
{{--            display: flex;--}}
{{--            flex-direction: row;--}}
{{--            justify-content: space-between;--}}
{{--            align-items: center;--}}
{{--        }--}}

{{--        .header div {--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--        }--}}

{{--        .loginButton {--}}
{{--            color: black;--}}
{{--            margin-right: 30px;--}}
{{--        }--}}

{{--        .header img {--}}
{{--            width: 40px;--}}
{{--        }--}}

{{--    </style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="container" style="">--}}
{{--    --}}{{--    <div>--}}
{{--    --}}{{--        @if ($userMessage)--}}
{{--    --}}{{--            <AlertMessage message="{{ $userMessage['message'] }}" code="{{ $userMessage['code'] }}" setmessage="{{ $setUserMessage }}"/>--}}
{{--    --}}{{--        @endif--}}
{{--    --}}{{--    </div>--}}
{{--    <div class="header">--}}
{{--        <h1>HomePage</h1>--}}
{{--        <div>--}}
{{--            <a href="/cart" style="margin-left: 15px;">--}}
{{--                <img src="{{ asset('images/cart.png') }}" alt="shopping cart" />--}}
{{--            </a>--}}
{{--            @if (Auth::check())--}}
{{--                <form action="{{ route('logout') }}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <button type="submit" class="btn btn-link">Log out</button>--}}
{{--                </form>--}}
{{--            @else--}}
{{--                <a class="loginButton" href="{{ route('login') }}">Login</a>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="product-list">--}}
{{--        @foreach ($products as $product)--}}
{{--            <div class="product">--}}
{{--                <h3>{{ $product->title }}</h3>--}}
{{--                <p>{{ $product->description }}</p>--}}
{{--                <p>{{ $product->price }}</p>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</div>--}}


{{--    @yield('content')--}}
{{--</body>--}}
{{--</html>--}}
