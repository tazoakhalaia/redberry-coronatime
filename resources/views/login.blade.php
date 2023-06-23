<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body>
<div class="w-full flex">
    <div class=" w-3/5 ">
        <div class="w-4/5 m-auto h-screen">
        <div class="flex mt-10">
    <a href="{{ route('signup', ['lang' => 'ka']) }}"><img class="w-8 h-5" src="{{ asset('images/georgia.jpg') }}"></a>
    <a href="{{ route('signup', ['lang' => 'en']) }}"><img class="w-8 h-5 ml-2" src="{{ asset('images/english.png') }}"></a>
        </div>
        <img class="mt-10" src="{{ asset('images/coronatime.png') }}">
            <div class="mt-8">
                <h1 class="font-medium">{{ trans('greet.welcome_back') }}</h1>
                <p class="mt-2 text-gray-600">{{ trans('greet.enter_details') }}</p>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @php
                $error = session('error');
                @endphp
            <x-input class="pl-3 {{ $error ? ' border-red-500' : '' }}" placeholder="Enter unique username or email" name="username_or_email" label="{{ trans('login.username') }}" type="text" />
            @if($error)
            <div class="flex mt-2"> 
            <img class="w-8 h-5" src="{{ asset('images/error.svg') }}">
                <h1 class="text-red-500">{{ $error }}</h1>
            </div>
            @endif
            <x-input class="pl-3" placeholder="Fill in password" name="password" label="{{ trans('login.password') }}" type="password" />
            <div class="mt-4 w-80 flex justify-end">
                <a href="{{ route('recover.password') }}" class="text-blue-600 font-bold">{{ trans('login.forgot_password') }}</a>
            </div>
            <x-button class="text-white mt-6" buttonName="{{ trans('login.log_in') }}"/>
            
            </form>
            <div class="w-80 mt-5">
                <div class="flex w-80 m-auto">
                <p>{{ trans('login.dont_have_account') }}</p>

                <a href="{{ route('registration') }}"><button class="ml-2 font-bold">{{ trans('login.signup_free') }}</button></a>

                </div>
            </div>
        </div>
    </div>
    <div class="w-1/2 min-h-screen sm:hidden">
        <img class="w-full h-full " src="{{ asset('images/cover.png') }}">
    </div>
</div>
</body>
</html>
