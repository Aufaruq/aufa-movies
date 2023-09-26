<html>
    <head>
        <title>AufaMovies || Nonton movie & Anime gratis</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="w-full h-auto min-h-screen bg-indigo-900 flex flex-col">
            @php
            $backdropPath = $movieData ? "{$imageBaseURL}/original{$movieData->backdrop_path}" : "";
            @endphp
            <!-- img bg -->
            <img class="w-full h-screen absolute object-cover lg:object-fill" src="{{$backdropPath}}">
            <div class="w-full h-screen absolute bg-black bg-opacity-60 z-10"></div>

            <!-- Header -->
            <div class="w-full bg-transparent h-[96px] drop-shadow-lg flex flex-row items-center z-10">
            <div class="w-1/3 pl-5">
                <a href="/movies" class="uppercase text-base mx-5 text-white hover:text-red-600 duration-200 font-inter">Movies</a>
                <a href="/tv-shows" class="uppercase text-base mx-5 text-white hover:text-red-600 duration-200 font-inter">Tv Shows</a>
            </div>
            <div class="w-1/3 flex item-center justify-center">
                <a href="/" class="font-bold text-5xl text-white hover:text-red-600 duration-200">AUFAMOVIES</a>
            </div>
            <div class="w-1/3 flex flex-row justify-end pr-10">
                <a href="/search" class="group pr-10">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class= "group-hover:fill-red-600 duration-200"/>
                </svg>
                </a>
            </div>
            </div>

        @php
        $title = "";
        $tagline = "";
        $year = "";
        $duration = "";
        $rating = 0;

        if ($movieData) {
            $original_date = $movieData->release_date;
            $timestamp = strtotime($original_date);
            $year = date("Y", $timestamp);
            $rating = (int)($movieData->vote_average * 10);
            $title = $movieData->title;

            if ($movieData->tagline) {
                $tagline = $movieData->tagline;
            } else {
                $tagline = $movieData->overview;
            }

            if ($movieData->runtime) {
                $hour = (int)($movieData->runtime / 60);
                $minute = $movieData->runtime % 60;
                $duration = "{$hour}h {$minute}m";
            }
        }

        $circumference = 2 * 22/7 * 32;
        $progressRating = $circumference - ($rating/100) * $circumference;

        $trailerID = "";
        if (isset($movieData->videos->results)){
            foreach($movieData->videos->results as $item){
                if (strtolower($item->type) == 'trailer'){
                    $trailerID = $item->key;
                    break;
                }
            }
        }
       @endphp


        <!-- konten -->
        <div class="w-full h-full z-10 flex flex-col justify-center px-20">
            <span class="font-inter font-bold text-6xl mt-4 text-white">{{$title}}</span>
            <span class="font-inter italic text-2xl mt-4 text-white max-w-3xl line-clamp-5">{{$tagline}}</span>

            <div class="flex flex-row mt-4 items-center">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mr-4" style="background: #00304D">
                    <svg class="-rotate-90 w-20 h-20">
                        <circle
                        style="color: #004F80;"
                        stroke-width="8"
                        stroke="currentColor"
                        fill="transparent"
                        r="32"
                        cx="40"
                        cy="40"
                        />

                        <circle
                        style="color: #6FCF97;"
                        stroke-width="8"
                        stroke-dasharray="{{$circumference}}"
                        stroke-dashoffset="{{$progressRating}}"
                        stroke-linecap="round"
                        stroke="currentColor"
                        fill="transparent"
                        r="32"
                        cx="40"
                        cy="40"
                        />
                    </svg>
                    <!-- rating -->
                    <span class="absolute font-inter font-bold text-xl text-white">{{$rating}}%</span>
                </div>

                <span class="font-inter text-xl text-white bg-transparent rounded-md border border-white p-2 mr-4">{{$year}}</span>
                
                @if($duration)
                <span class="font-inter text-xl text-white bg-transparent rounded-md border border-white p-2">{{$duration}}</span>
                @endif
            </div>
            @if($trailerID)
            <button class="w-fit bg-red-600 text-white pl-4 pr-6 py-3 mt-5 font-inter text-xl flex flexx-row rounded-lg items-center hover:drop-shadow-lg" onClick="showTrailer(true)">
            <svg height="24" width="24" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                        viewBox="0 0 512 512" xml:space="preserve">
                    <path style="fill:#F4B2B0;" d="M215.7,116.531v278.937c0,36.816,42.009,57.855,71.49,35.803l194.187-145.254
                        c20.043-14.993,20.043-45.041,0-60.034L287.19,80.73C257.709,58.676,215.7,79.715,215.7,116.531z"/>
                    <path style="fill:#B3404A;" d="M490.717,213.5L296.529,68.246c-10.579-7.913-23.006-12.094-35.939-12.094
                        c-33.349,0-60.48,27.086-60.48,60.379v181.213c-88.289-2.02-160.445-70.536-168.238-157.309h84.259
                        c2.814,15.838,9.879,30.73,20.577,43.024c5.653,6.494,15.497,7.176,21.993,1.525c6.494-5.651,7.177-15.498,1.525-21.993
                        c-9.215-10.588-14.29-24.135-14.29-38.144c0-8.61-6.981-15.589-15.589-15.589H15.589C6.981,109.258,0,116.237,0,124.846
                        c0,111.212,89.404,201.924,200.111,204.07v66.552c0,33.288,27.129,60.376,60.478,60.379c0.003,0,0.003,0,0.006,0
                        c12.929,0,25.355-4.182,35.934-12.094L490.715,298.5C504.243,288.383,512,272.892,512,256S504.243,223.617,490.717,213.5z
                        M472.041,273.534L277.854,418.788c-5.146,3.849-11.112,5.883-17.257,5.883c0,0-0.002,0-0.003,0
                        c-14.092-0.002-29.304-11.166-29.304-29.201V116.531c0-18.038,15.21-29.201,29.302-29.201c6.147,0,12.117,2.034,17.262,5.883
                        l194.189,145.254c5.579,4.173,8.781,10.565,8.781,17.534C480.824,262.971,477.622,269.361,472.041,273.534z"/>
                    </svg>
                    <span>Play Trailer</span>
            </button>
            @endif
            
        </div>

        <!-- trailer -->
        <div id="trailerWrapper" class="absolute z-10 w-full h-screen p-20 bg-black flex flex-col">
            <button class="ml-auto group mb-4" onClick="showTrailer(false)">
            <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 7H15C17.7614 7 20 9.23857 20 12C20 14.7614 17.7614 17 15 17M4 7L7 4M4 7L7 10M8.00001 17H11" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" 
            class="group-hover:stroke-white duration-200"/>
            </svg>
            </button>

            <iframe id="youtubeVideo" class="w-full h-full" src="https://www.youtube.com/embed/{{$trailerID}}?enablejsapi=1" title="{{$movieData->title}}" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share;" 
            allowfullscreen></iframe>
        </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


        <script>
            //hide trailer
            $("#trailerWrapper").hide();


            function showTrailer(isVisible){
                if (isVisible){
                    //show
                    $("#trailerWrapper").show();
                } else {
                    //stop vide0
                    $("#youtubeVideo")[0].contentWindow.postMessage('{"event":"command", "func":"' + 'stopVideo' + '", "args":""}', '*');
                    //hide
                    $("#trailerWrapper").hide();
                }
            }
        </script>
    </body>
</html>