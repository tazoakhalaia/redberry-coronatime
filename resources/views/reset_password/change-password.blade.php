<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Reset Password</title>
</head>
<body class="max-h-screen flex justify-center">
    <div class="h-screen w-1/2 relative">
        <img class="mt-10 m-auto" src="{{ asset('images/coronatime.png') }}">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-center font-bold">Reset Password</h1>
            @if(session('error'))
            <div class="text-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                {{ session('error')}}
            </div>
            @endif
            <form action="{{ route('update.password', ['token' => $token]) }}" method="POST">
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
                @csrf
            <x-input class="pl-2" name="password" type="password" placeholder="Enter new password" label="Password" />
             <x-input class="pl-2" name="repeatPassword" type="password" placeholder="Repeat Password" label="Reapeat Password" />
            <x-button class="text-white mt-10 uppercase" buttonName="Update"/>
            </form>
        </div>
    </div>
</body>
<body>
</html>