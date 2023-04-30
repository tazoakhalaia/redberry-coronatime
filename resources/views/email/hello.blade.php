<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Verify email</title>
</head>
<body class="flex flex-col justify-center">
    <img class="m-auto" src="{{ asset('images/mailimg.png') }}">
    <h1 class="text-center font-bold">Confirmation email</h1>
    <p class="text-center">click this button to verify your email</p>
    <div class="text-center">
        <x-button class="text-white mt-10" buttonName="VERIFY EMAIL"/>
    </div>
</body>
</html>