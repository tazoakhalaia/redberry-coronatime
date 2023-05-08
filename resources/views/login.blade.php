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
            @if(session('error'))
            <div class="flex p-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 w-80 mt-2" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <h1 class="font-bold">{{ session('error') }}</h1>
            </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
            <x-input class="pl-3" placeholder="Enter unique username or email" name="username_or_email" label="{{ trans('language.username') }}" type="text" />
            <x-input class="pl-3" placeholder="Fill in password" name="password" label="{{ trans('language.password') }}" type="password" />
            <div class="mt-4 w-80 flex justify-end">
                <a href="#" class="text-blue-600 font-bold">{{ trans('language.forgot_password') }}</a>
            </div>
            <x-button class="text-white mt-6" buttonName="{{ trans('language.signup') }}"/>
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
