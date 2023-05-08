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
     <div class="text-center mt-7">
    <a href="{{ route('verify', $token) }}" class="text-white font-bold uppercase bg-btngreen pt-2 pl-10 pr-10 pb-2 rounded-sm">VERIFY EMAIL</a>
</div>   

    
    

</body>
</html>