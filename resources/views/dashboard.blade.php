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
                <form method="GET" action="{{ route('dashboard') }}">
                    @csrf
                    <select class="mr-10 bg-transparent outline-none" name="lang" onchange="this.form.submit()">
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                    <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>Georgian</option>
                </select>
            </form>
                <div class="mr-10 capitalize">
                    <h1>{{ $user->username }}</h1>
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
    <div class="worldwide hidden w-full mt-10 flex flex-wrap justify-between">
        <div class="newcases w-96 h-60 bg-blue-100 rounded-md flex justify-center mt-6">
            <div>
                <img class="mt-10" src="{{ asset('images/statisticline.svg') }}">
                <h1 class="text-center mt-6">New Cases</h1>
                <h1 class="font-bold text-center mt-6 text-worldwideBlue text-3xl">715,222</h1>
            </div>
        </div>
        <div class="recovered w-96 h-60 bg-green-100 rounded-md flex justify-center mt-6">
            <div>
                <img class="mt-10" src="{{ asset('images/statisticgreen.svg') }}">
                <h1 class="text-center mt-6">Recovered</h1>
                <h1 class="font-bold text-center mt-6 text-worldwideBlue text-3xl">71,222</h1>
            </div>
        </div>
        <div class="death w-96 h-60 bg-yellow-100 rounded-md flex justify-center mt-6">
            <div>
                <img class="mt-10" src="{{ asset('images/statisticyellow.svg') }}">
                <h1 class="text-center mt-6">Death</h1>
                <h1 class="font-bold text-center mt-6 text-worldwideBlue text-3xl">711</h1>
            </div>
        </div>
    </div>
    <div class="country w-full mt-10">
        <form class="h-10 w-64 relative">
            <input class="border-2 rounded-md h-full w-full pl-10 border-gray-200 outline-none" name="query" type="text" placeholder="Search By Country">
            <img class="absolute top-1/2 transform -translate-y-1/2 ml-4" src="{{ asset('images/search.svg') }}">
        </form>
        <div class="h-countryBox overflow-y-auto mt-10">
        @foreach ($countries as $country)
        <h1 class="mt-4">{{ json_decode($country->name, true)[app()->getLocale()]}}</h1>
        @endforeach
        </div>
       
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
            country.style.display = "block";
            countrybtn.style.fontWeight = "500"
            worldWideBtn.style.fontWeight = "300"
        });
    </script>
</body>
</html>