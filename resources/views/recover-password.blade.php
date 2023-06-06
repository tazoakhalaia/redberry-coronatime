<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Password Recover</title>
</head>
<body class="max-h-screen flex justify-center">
    <div class="h-screen w-1/2 relative">
        <img class="mt-10 m-auto" src="{{ asset('images/coronatime.png') }}">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <h1 class="text-center font-bold">Reset Password</h1>
            <form action="">
            <x-input class="pl-2" name="email" type="email" placeholder="Enter your email" label="Email" />
            <x-button class="text-white mt-10 uppercase" buttonName="Reset Passowrd"/>
            </form>
        </div>
    </div>
</body>
</html>