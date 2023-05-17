<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Verify email</title>
    <style>
        .flex { display: flex; }
        .flex-col { flex-direction: column; }
        .justify-center { justify-content: center; }
        .m-auto { margin: auto; }
        .text-center { text-align: center; }
        .font-bold { font-weight: bold; }
        .mt-7 { margin-top: 1.75rem; }
        .text-white { color: #FFFFFF; }
        .uppercase { text-transform: uppercase; }
        .bg-btngreen { background-color: #0FBA68; }
        .pt-2 { padding-top: 0.5rem; }
        .pl-10 { padding-left: 2.5rem; }
        .pr-10 { padding-right: 2.5rem; }
        .pb-2 { padding-bottom: 1.5rem; }
        .rounded-md { border-radius: 1rem; }
        .no-underline {text-decoration: none;}
    </style>
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