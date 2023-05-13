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
            <input class="search-input border-2 rounded-md h-full w-full pl-10 border-gray-200 outline-none" name="query" type="text" placeholder="Search By Country">
            <img class="absolute top-1/2 transform -translate-y-1/2 ml-4" src="{{ asset('images/search.svg') }}">
        </form>
        <div class="statisticbar flex justify-between mt-6 bg-gray-100 p-2 rounded-md">
            <div class="flex items-center w-1/4">
                <h1 class="font-bold">Location</h1>
                <div class="ml-2">
                <img class="w-2 h-2" src="{{ asset('images/arrowup.png') }}">
                <img class="w-2 h-2" src="{{ asset('images/arrowdown.png') }}">
                </div>
            </div>
            <div class="flex items-center w-1/4">
                <h1 class="font-bold">New Cases</h1>
                <div class="ml-2">
                <img class="w-2 h-2" src="{{ asset('images/arrowup.png') }}">
                <img class="w-2 h-2" src="{{ asset('images/arrowdown.png') }}">
                </div>
            </div>
            <div class="flex items-center w-1/4">
                <h1 class="font-bold">Death</h1>
                <div class="ml-2">
                <img class="w-2 h-2" src="{{ asset('images/arrowup.png') }}">
                <img class="w-2 h-2" src="{{ asset('images/arrowdown.png') }}">
                </div>
            </div>
            <div  class="pr-4 flex items-center w-1/4">
                <h1 class="font-bold">Recovered</h1>
                <div class="ml-2">
                <img class="w-2 h-2" src="{{ asset('images/arrowup.png') }}">
                <img class="w-2 h-2" src="{{ asset('images/arrowdown.png') }}">
                </div>
            </div>
        </div>
        <div class="h-countryBox overflow-y-auto mt-10 pr-4">
            <div class="flex justify-between items-center">
            <h1 class="w-1/4">Worldwide</h1>
            <h2 class="w-1/4">9,000,000</h2>
            <h2 class="w-1/4">60,000</h2>
            <h2 class="w-1/4">5,000,00</h2>
            </div>
            <hr class="mt-2">
        @foreach ($countries as $country)
        <div class="flex items-center justify-between mt-6">
        <h1 class="mt-4 w-1/4">{{ json_decode($country->name, true)[app()->getLocale()]}}</h1>
        <h2 class="w-1/4">{{ $country->confirmed }}</h2>
        <h2 class="w-1/4">{{ $country->recovered }}</h2>
        <h2 class="w-1/4">{{ $country->deaths }}</h2>
        </div>
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

        //Search
        const searchInput = document.querySelector('.search-input');
        const countryNames = Array.from(document.querySelectorAll('.h-countryBox h1')).map(h1 => h1.textContent.trim().toLowerCase());
        searchInput.addEventListener('input', function() {
            const query = this.value.trim().toLowerCase();
            const filteredCountryNames = countryNames.filter(name => name.includes(query));
            const countryElements = Array.from(document.querySelectorAll('.h-countryBox h1'));
            countryElements.forEach(element => {
                if (filteredCountryNames.includes(element.textContent.trim().toLowerCase())) {
                    element.parentElement.style.display = '';
                } else {
                    element.parentElement.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>