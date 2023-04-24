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
    <div class="min-h-screen w-3/5 float-left">
        <div class="w-4/5 m-auto h-screen border-2 border-red-500">
        <div class="flex">
    <a href="{{ route('register', ['lang' => 'ka']) }}"><img class="w-8 h-5" src="{{ asset('images/georgia.jpg') }}"></a>
    <a href="{{ route('register', ['lang' => 'en']) }}"><img class="w-8 h-5 ml-2" src="{{ asset('images/english.png') }}"></a>
        </div>
        <img src="{{ asset('images/coronatime.png') }}">
<h1>{{ trans("language.hello") }}</h1>
        </div>
    </div>
    <div class="min-h-screen w-2/5 float-right">
        <img class="h-screen w-screen" src="{{ asset('images/cover.png') }}">
    </div>
</body>
</html>
