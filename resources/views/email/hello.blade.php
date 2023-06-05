<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Verify email</title>
</head>
<body>
    <img class="m-auto" src="https://i.ibb.co/tBZmW6b/statistic.png" alt="coronavirus statistic">
    <h1 class="font-bold">Confirmation email</h1>
    <p>click this button to verify your email</p>
     <div class="mt-7">
    <a href="{{ route('verify', $token) }}" class="no-underline text-white font-bold uppercase bg-btngreen pt-2 pl-10 pr-10 pb-2 rounded-md">VERIFY EMAIL</a>
</div>   

    

</body>
</html>