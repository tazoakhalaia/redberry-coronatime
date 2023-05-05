<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Email</title>
</head>
<body class="max-h-screen flex justify-center">
    <div class="h-screen w-1/2 relative">
        <img class="mt-10 m-auto" src="{{ asset('images/coronatime.png') }}">
        <div class="w-full text-center absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <img class="m-auto mb-2" src="{{ asset('images/checkmark.gif') }}">
            <h1>Your account is confirmed, you can sign in</h1>
            <x-button class="text-white mt-10" buttonName="SIGN IN"/>
        </div>
    </div>
</body>
</html>