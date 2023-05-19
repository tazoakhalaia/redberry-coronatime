<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>
<body>
    @php
    $totalConfirmed = 0;
    $totalDeaths = 0;
    $totalRecovered = 0;
    @endphp
    @foreach($countries as $country)
    @php
    $totalConfirmed += $country->confirmed;
    $totalDeaths += $country->deaths;
    $totalRecovered += $country->recovered;
    @endphp
    @endforeach
    <header class="w-full h-20">
        <div class="m-auto  w-10/12 h-full flex justify-between items-center">
            <div>
                <img class="sm:w-32" src="{{ asset('images/coronatime.svg') }}">
            </div>
            <div class="userbox flex">
                <form method="GET" action="{{ route('dashboard') }}">
                    <select class="mr-10 bg-transparent outline-none sm:mr-0 sm:w-20" name="lang" onchange="this.form.submit()">
                    <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>{{ trans('dashboard.en') }}</option>
                    <option value="ka" {{ app()->getLocale() == 'ka' ? 'selected' : '' }}>{{ trans('dashboard.ka') }}</option>
                </select>
            </form>
                <div class="mr-10 capitalize">
                    <h1 class="font-bold sm:hidden">{{ $user->username }}</h1>
                </div>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="bg-tranparent capitalize sm:hidden">{{ trans('dashboard.log_out') }}</button>
                </form>
                <div class="hidden sm:flex">
                    <img src="{{ asset('images/menu.svg') }}">
                </div>
            </div>
        </div>
    </header>
    <main class="w-10/12 m-auto">
    <h1 class="font-bold text-md">{{ trans('dashboard.worldwide_statistic') }}</h1>
    <div class="mt-10">
    <button class="worldwidebtn sm:text-xs">{{ trans('dashboard.worldwide') }}</button>
    <button class="countrybtn ml-10 sm:text-xs">{{ trans('dashboard.by_country') }}</button>
    </div>
    <div class="worldwide  w-full mt-10 flex flex-wrap justify-between mb-4">
        <div class="newcases w-96 h-60 bg-newCasesBlue rounded-lg flex justify-center mt-6">
            <div class="flex flex-col">
                <center><img class="mt-10 w-24 h-10" src="{{ asset('images/statisticline.svg') }}"></center>
                <h1 class="text-center mt-6">{{ trans('dashboard.new_cases') }}</h1>
                <h1 class="font-bold text-center mt-6 text-worldwideBlue text-3xl">{{ $totalConfirmed }}</h1>
            </div>
        </div>
        <div class="recovered w-96 h-60 bg-recoverGreen rounded-lg flex justify-center mt-6 sm:w-36 sm:h-52">
            <div class="flex flex-col">
                <center><img class="mt-10 w-24 h-10" src="{{ asset('images/statisticgreen.svg') }}"></center>
                <h1 class="text-center mt-6 sm:text-xs">{{ trans('dashboard.recovered') }}</h1>
                <h1 class="font-bold text-center mt-6 text-recoverGreentxt text-3xl">{{ $totalRecovered }}</h1>
            </div>
        </div>
        <div class="death w-96 h-60 bg-yellow-100 rounded-lg flex justify-center mt-6 sm:w-36 sm:h-52">
            <div class="flex flex-col">
                <center><img class="mt-10 w-24 h-10 " src="{{ asset('images/statisticyellow.svg') }}"></center>
                <h1 class="text-center mt-6 sm:text-xs">{{ trans('dashboard.deaths') }}</h1>
                <h1 class="font-bold text-center mt-6 text-deathsYellow text-3xl">{{ $totalDeaths }}</h1>
            </div>
        </div>
    </div>
    <div class="country hidden  w-full mt-10">
        <form class="h-10 w-64 relative">
            <input class="search-input border-2 rounded-md h-full w-full pl-10 border-gray-200 outline-none" name="query" type="text" placeholder="Search By Country">
            <img class="absolute top-1/2 transform -translate-y-1/2 ml-4" src="{{ asset('images/search.svg') }}">
        </form>
        <div class="statisticbar w-full flex justify-between mt-6 bg-gray-100 p-2 rounded-md">
            <div class="flex items-center w-1/4 sm:w-16">
                <h1 class="font-bold text-sm sm:text-xxs">{{ trans('dashboard.location') }}</h1>
                <div class="ml-2">
                <a href="{{ route('dashboard', ['sort' => 'location']) }}"><img class="w-2 h-2 sm:w-1 sm:h-1 sm:mr-2" src="{{ asset('images/arrowup.png') }}"></a>
                <a href="{{ route('dashboard', ['sort' => 'location']) }}"><img class="w-2 h-2 sm:w-1 sm:h-1 sm:mr-2" src="{{ asset('images/arrowdown.png') }}"></a>
                </div>
            </div>
            <div class="flex items-center w-1/4 sm:w-24 sm:ml-2">
                <h1 class="font-bold text-sm sm:text-xxs">{{ trans('dashboard.new_cases') }}</h1>
                <div class="ml-2">
                <a href="{{ route('dashboard', ['sort' => 'confirmed']) }}"><img class="w-2 h-2 sm:w-1 sm:h-1"  src="{{ asset('images/arrowup.png') }}"></a>
                <a href="{{ route('dashboard', ['sort' => 'confirmed']) }}"><img class="w-2 h-2 sm:w-1 sm:h-1" src="{{ asset('images/arrowdown.png') }}"></a>
                </div>
            </div>
            <div class="flex items-center w-1/4 sm:w-16">
                <h1 class="font-bold text-sm sm:text-xxs">{{ trans('dashboard.deaths') }}</h1>
                <div class="ml-2">
                <a href="{{ route('dashboard', ['sort' => 'deaths']) }}"><img class="w-2 h-2 sm:mr-2 sm:w-1 sm:h-1" src="{{ asset('images/arrowup.png') }}"></a>
                <a href="{{ route('dashboard', ['sort' => 'deaths']) }}"><img class="w-2 h-2 sm:mr-2 sm:w-1 sm:h-1"  src="{{ asset('images/arrowdown.png') }}"></a>
                </div>
            </div>
            <div  class="pr-4 flex items-center w-1/4 sm:w-18">
                <h1 class="font-bold text-sm sm:text-xxs">{{ trans('dashboard.recovered') }}</h1>
                <div class="ml-2">
                <a href="{{ route('dashboard', ['sort' => 'recovered']) }}"><img class="w-2 h-2 sm:mr-2 sm:w-1 sm:h-1" src="{{ asset('images/arrowup.png') }}"></a>
                <a href="{{ route('dashboard', ['sort' => 'recovered']) }}"><img class="w-2 h-2 sm:mr-2 sm:w-1 sm:h-1" src="{{ asset('images/arrowdown.png') }}"></a>
                </div>
            </div>
        </div>
        <div class="h-countryBox w-full overflow-y-auto mt-10 pr-4">
            <div class="flex justify-between items-center">
                <h1 class="w-1/4 sm:w-16 sm:mt-4 sm:text-xxs">Worldwide</h1>
                <div class="w-1/4 ml-6 sm:w-16 sm:mt-4 ">
                <h2 class="sm:text-xxs">{{ $totalConfirmed }}</h2>
                </div>
                <div class="w-1/4 ml-6 sm:w-16 sm:mt-4">
                <h2 class="sm:text-xxs">{{ $totalDeaths }}</h2>
                </div>
                <div class="w-1/4 ml-6 sm:w-16 sm:mt-4">
                <h2 class="sm:text-xxs">{{ $totalRecovered }}</h2>
                </div>
            </div>
            <hr class="mt-2">
        @foreach ($countries as $country)
        <div class="flex items-center justify-between mt-6">
            <h1 class="mt-4 w-1/4 sm:w-16 sm:mt-4 sm:text-xxs">{{ json_decode($country->name, true)[app()->getLocale()]}}</h1>
            <div class="w-1/4 ml-6 sm:mt-4 sm:w-16">
                <h2 class="sm:text-xxs">{{ $country->confirmed }}</h2>
            </div>
            <div class="w-1/4 ml-6 sm:mt-4 sm:w-16">
                <h2 class="sm:text-xxs">{{ $country->deaths }}</h2>
            </div>
            <div class="w-1/4  ml-6 sm:mt-4 sm:w-16">
                <h2 class="sm:text-xxs">{{ $country->recovered }}</h2>
            </div>
        </div>
        <hr class="mt-2 mb-2">
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
            const hrElements = Array.from(document.querySelectorAll('.h-countryBox hr'));
            countryElements.forEach((element, i) => {
                if (filteredCountryNames.includes(element.textContent.trim().toLowerCase())) {
                    element.parentElement.style.display = '';
                    hrElements[i].style.display = '';
                } else {
                    element.parentElement.style.display = 'none';
                    hrElements[i].style.display = 'none';
                }
            });
        });

        ////
        
    </script>
</body>
</html>