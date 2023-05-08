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
    <a href="{{ route('login', ['lang' => 'ka']) }}"><img class="w-8 h-5" src="{{ asset('images/georgia.jpg') }}"></a>
    <a href="{{ route('login', ['lang' => 'en']) }}"><img class="w-8 h-5 ml-2" src="{{ asset('images/english.png') }}"></a>
        </div>
        <img class="mt-10" src="{{ asset('images/coronatime.png') }}">
            <div class="mt-8">
                <h1 class="font-medium">{{ trans('language.welcome_back') }}</h1>
                <p class="mt-2 text-gray-600">{{ trans('language.enter_details') }}</p>
            </div>
            <form action="" method="POST">
                @csrf
            <x-input class="pl-3" placeholder="Enter unique username or email" name="username" label="{{ trans('language.username') }}" type="text" />
            <x-input class="pl-3" placeholder="Fill in password" name="password" label="{{ trans('language.password') }}" type="password" />
            <x-button class="text-white mt-10" buttonName="{{ trans('language.signup') }}"/>
            </form>
            <div class="w-80 mt-5">
                <div class="flex w-80 m-auto">
                <p>{{ trans('language.dont_have_acc') }}</p>
                <a href="{{ route('register') }}"><button class="ml-2 font-bold">{{ trans('language.signup_free') }}</button></a>
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
