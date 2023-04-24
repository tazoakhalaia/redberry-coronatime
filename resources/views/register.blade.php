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
        <div class="w-4/5 m-auto h-screen">
        <div class="flex">
    <a href="{{ route('register', ['lang' => 'ka']) }}"><img class="w-8 h-5" src="{{ asset('images/georgia.jpg') }}"></a>
    <a href="{{ route('register', ['lang' => 'en']) }}"><img class="w-8 h-5 ml-2" src="{{ asset('images/english.png') }}"></a>
        </div>
        <img class="mt-5" src="{{ asset('images/coronatime.png') }}">
            <div class="mt-8">
                <h1 class="font-medium">Welcome to Coronatime</h1>
                <p class="mt-2 text-gray-600">Please enter required info to sign up</p>
            </div>
            <x-input placeholder="as" name="username" label="as" type="text" />
        </div>
    </div>
    <div class="min-h-screen w-2/5 float-right">
        <img class="h-screen w-screen" src="{{ asset('images/cover.png') }}">
    </div>
</body>
</html>
