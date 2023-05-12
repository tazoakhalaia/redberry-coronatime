<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    <button class="worldwidebtn">worldwide</button>
    <button class="countrybtn">country</button>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button class="bg-blue-600">logout</button>
    </form>
    <div class="worldwide w-full bg-red-500 mt-10">
        asdsad
    </div>
    <div class="country hidden w-full bg-blue-500 mt-10">
        asdsad
    </div>

    
    <!---->
    <script>
        let worldWideBtn = document.querySelector('.worldwidebtn');
        let countrybtn = document.querySelector('.countrybtn')
        let country = document.querySelector('.country')
        let worldWide = document.querySelector('.worldwide');
        worldWideBtn.addEventListener('click', ()=> {
            country.style.display = "none";
            worldWide.style.display = "flex";
        });

        countrybtn.addEventListener('click', ()=> {
            worldWide.style.display = "none";
            country.style.display = "flex";
        });
    </script>
</body>
</html>