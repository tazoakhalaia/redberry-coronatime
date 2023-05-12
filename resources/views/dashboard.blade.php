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
    <header class="w-full h-20">
        <div class="m-auto w-10/12 h-full flex justify-between items-center">
            <div>
                <img src="{{ asset('images/coronatime.svg') }}">
            </div>
            <div class="userbox flex">
                <select class="mr-10 bg-transparent outline-none">
                    <option value="english">English</option>
                    <option value="georgian">Georgian</option>
                </select>
                <div class="mr-10 capitalize">
                    <h1>username</h1>
                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="bg-tranparent capitalize">log out</button>
                </form>
            </div>
        </div>
    </header>
    <main class="w-10/12 m-auto">
    <h1 class="font-bold text-md">Worldwide Statistics</h1>
    <div class="mt-10">
    <button class="worldwidebtn">Worldwide</button>
    <button class="countrybtn ml-10">By country</button>
    </div>
    <div class="worldwide w-full mt-10">
        <div class="newcases w-96 h-60 bg-blue-300 rounded-md">
            sad
        </div>
    </div>
    <div class="country hidden w-full bg-blue-500 mt-10">
        asdsad
    </div>
    </main>

    <!---->
    <script>
        let worldWideBtn = document.querySelector('.worldwidebtn');
        let countrybtn = document.querySelector('.countrybtn')
        let country = document.querySelector('.country')
        let worldWide = document.querySelector('.worldwide');
        worldWideBtn.addEventListener('click', ()=> {
            country.style.display = "none";
            worldWide.style.display = "flex";
            worldWideBtn.style.fontWeight = "500"
            countrybtn.style.fontWeight = "300"
        });

        countrybtn.addEventListener('click', ()=> {
            worldWide.style.display = "none";
            country.style.display = "flex";
            countrybtn.style.fontWeight = "500"
            worldWideBtn.style.fontWeight = "300"
        });
    </script>
</body>
</html>