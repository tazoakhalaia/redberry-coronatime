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
    <div class=" w-3/5 float-left">
        <div class="w-4/5 m-auto h-screen">
        <div class="flex mt-10">
    <a href="{{ route('register', ['lang' => 'ka']) }}"><img class="w-8 h-5" src="{{ asset('images/georgia.jpg') }}"></a>
    <a href="{{ route('register', ['lang' => 'en']) }}"><img class="w-8 h-5 ml-2" src="{{ asset('images/english.png') }}"></a>
        </div>
        <img class="mt-10" src="{{ asset('images/coronatime.png') }}">
            <div class="mt-8">
                <h1 class="font-medium">{{ trans('language.welcome') }}</h1>
                <p class="mt-2 text-gray-600">{{ trans('language.alert') }}</p>
            </div>
            <form>
            <x-input class="pl-3" placeholder="Enter unique username" name="username" label="{{ trans('language.username') }}" type="text" />
            <p class="text-sm text-gray-500">{{ trans('language.unique') }} </p>
            <x-input class="pl-3" placeholder="Enter your email" name="username" label="{{ trans('language.email') }}" type="email" />
            <x-input class="pl-3" placeholder="Fill in password" name="username" label="{{ trans('language.password') }}" type="password" />
            <x-input class="pl-3" placeholder="Repeat password" name="username" label="{{ trans('language.repeat_password') }}" type="password" />
            <x-button class="text-white mt-10" buttonName="{{ trans('language.signup') }}"/>
            <div class="w-80 mt-5">
                <div class="flex w-60 m-auto">
                <p>{{ trans('language.already_have_account') }}</p>
                <button class="ml-2 font-bold">{{ trans('language.log_in') }}</button>
                </div>
            </div>
            </form>
        </div>
    </div>
    <div class="w-2/5 float-right">
        <img class="h-full w-full" src="{{ asset('images/cover.png') }}">
    </div>
</body>
</html>
