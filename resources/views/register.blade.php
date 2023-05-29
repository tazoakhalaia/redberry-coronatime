<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Register Page</title>
</head>
<body>
@if($errors->any())
    <div class="w-1/4">
        <ul>
            @foreach($errors->all() as $error)
            <div class="p-4 mb-4 w-60 text-sm 
        text-black-800 rounded-lg bg-red-50 
        dark:bg-gray-800 
        dark:text-black-400" role="alert">{{ $error }}</div>
            @endforeach
        </ul>
    </div>
@endif
<div class="w-full flex">
    <div class=" w-3/5 ">
        <div class="w-4/5 m-auto h-screen">
        @if (session('success'))
        <div class="p-4 mb-4 w-60 text-sm 
        text-green-800 rounded-lg bg-green-50 
        dark:bg-gray-800 
        dark:text-green-400" role="alert">{{ session('success') }}</div>
        @endif
        @if (session('error'))
        <div class="p-4 mb-4 w-60 text-sm 
        text-black-800 rounded-lg bg-red-50 
        dark:bg-gray-800 
        dark:text-black-400" role="alert">{{ session('error') }}</div>
        @endif
        <div class="flex mt-10">
    <a href="{{ route('register.index', ['lang' => 'ka']) }}"><img class="w-8 h-5" src="{{ asset('images/georgia.jpg') }}"></a>
    <a href="{{ route('register.index', ['lang' => 'en']) }}"><img class="w-8 h-5 ml-2" src="{{ asset('images/english.png') }}"></a>
        </div>
        <img class="mt-10" src="{{ asset('images/coronatime.png') }}">
            <div class="mt-8">
                <h1 class="font-medium">{{ trans('greet.welcome') }}</h1>
                <p class="mt-2 text-gray-600">{{ trans('greet.alert') }}</p>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
            <x-input class="pl-3" placeholder="Enter unique username" name="username" label="{{ trans('register.username') }}" type="text" />
            <p class="text-sm text-gray-500">{{ trans('register.unique') }} </p>
            <x-input class="pl-3" placeholder="Enter your email" name="email" label="{{ trans('register.email') }}" type="email" />
            <x-input class="pl-3" placeholder="Fill in password" name="password" label="{{ trans('register.password') }}" type="password" />
            <x-input class="pl-3" placeholder="Repeat password" name="repeatpassword" label="{{ trans('register.repeat_password') }}" type="password" />
            <x-button class="text-white mt-10" buttonName="{{ trans('register.signup') }}"/>
            </form>
            <div class="w-80 mt-5">
                <div class="flex w-60 m-auto">
                <p>{{ trans('register.already_have_account') }}</p>
                <a href="{{ route('login') }}"><button class="ml-2 font-bold">{{ trans('login.log_in') }}</button></a>
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
