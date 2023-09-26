<html>
    <head>
        <title>AufaMovies || Nonton movie & Anime gratis</title>
        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="w-full h-auto min-h-screen bg-indigo-900 flex flex-col">
            <!-- Header -->
            <div class="w-full bg-indigo-900 h-[96px] drop-shadow-lg flex flex-row items-center">
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
                            <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:fill-red-600 duration-200" />
                        </svg>
                    </a>
                    <!-- register -->
                    <a href="/login" class="uppercase text-base mx-5 text-white hover:text-red-600 duration-200 font-inter">Register / login</a>
                </div>
            </div>

            <!-- Banner section -->
            <div class="w-full h-[512px] flex flex-col relative bg-black">
            <!-- banner data -->
            @foreach($banner as $bannerItem)
            @php    
            $bannerImage = "{$imageBaseURL}/original{$bannerItem->backdrop_path}";
            @endphp
            <div class="flex flex-row items-center w-full h-full relative slide">
                <!-- image -->
                <img src="{{$bannerImage}}" class="absolute w-full h-full object-cover" />
                <!-- overlay -->
                <div class="w-full h-full absolute bg-black bg-opacity-40"></div>


                <div class="w-10/12 flex flex-col ml-28 z-10">
                    <span class="font-bold text-4xl text-white">{{ $bannerItem->title }}</span>
                    <span class="text-xl text-white w-1/2 line-clamp-2">{{ $bannerItem->overview }}</span>
                    <a href="/movie/{{ $bannerItem->id }}" class="w-fit bg-red-600 text-white pl-2 pr-4 py-2 mt-5 font-inter text-sm flex flex-row rounded-full items-center hover:drop-shadow-lg duration-200">
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
                    <span>Detail</span>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- prev button -->
            <div class="absolute left-8 top-1/2 -translate-y-1/2 flex justify-center" onclick="moveSlide(-1)">
                <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-200 rotate-180">
                <a href=""><svg fill="#000000" width="24" height="24" viewBox="0 0 24 24" id="next" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><path id="primary" d="M18.6,11.2l-12-9A1,1,0,0,0,5,3V21a1,1,0,0,0,.55.89,1,1,0,0,0,1-.09l12-9a1,1,0,0,0,0-1.6Z" style="fill: rgb(0, 0, 0);"></path></svg>
            </a>
                </button>
            </div>

            <!-- next button -->
            <div class="absolute right-8 top-1/2 -translate-y-1/2 flex justify-center" onclick="moveSlide(1)">
                <button class="bg-white p-3 rounded-full opacity-20 hover:opacity-100 duration-200">
                <a href=""><svg fill="#000000" width="24" height="24" viewBox="0 0 24 24" id="next" data-name="Flat Color" xmlns="http://www.w3.org/2000/svg" class="icon flat-color"><path id="primary" d="M18.6,11.2l-12-9A1,1,0,0,0,5,3V21a1,1,0,0,0,.55.89,1,1,0,0,0,1-.09l12-9a1,1,0,0,0,0-1.6Z" style="fill: rgb(0, 0, 0);"></path></svg>
                </a>
             </button>
            </div>

            <!-- indikator -->
            <div class="absolute bottom-0 w-full mb-8">
                <div class="w-full flex flex-row items-center justify-center">
                @for($pos = 1; $pos <= count($banner); $pos++)
                <div class="w-2.5 h-2.5 rounded-full mx-1 cursor-pointer dot" onclick="currentSlide({{$pos}})"></div>
                @endfor
            </div>
            </div>
            </div>





             <!-- top 10 movies -->
             <div class="bg-indigo-900 mt-12">
                <span class="ml-28 font-inter text-white font-bold text-xl">Top 10 Movies</span>

                <div class="w-auto flex flex-row overflow-x-auto pl-28 pt-6 pb-10">
                    @foreach ($topMovies as $movieItem)

                    @php
                    $original_date = $movieItem->release_date;
                    $timestamp = strtotime($original_date);
                    $movieYear = date("Y", $timestamp);

                    $movieID = $movieItem->id;
                    $movieTitle = $movieItem->title;
                    $movieRating = $movieItem->vote_average * 10;
                    $movieImage = "{$imageBaseURL}/w500{$movieItem->poster_path}";


                    @endphp

                    <a href="movie/{{ $movieID }}" class="group">
                        <div class="min-w-[232px] min-h-[428px] text-white bg-indigo-800 drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] group-hover:scale-125 duration-200" src="{{ $movieImage }}">
                            </div>
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{ $movieTitle }}</span>
                        <span  class="font-inter text-sm mt-1">{{ $movieYear }}</span>
                        <div class="flex flex-row mt-1 items-center">
                        <svg width="24" height="24" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M192 938.7H87.9c-48.4 0-87.9-39.5-87.9-88V386.6c0-48.5 39.5-87.9 87.9-87.9h125.4c11.6 0 22.7 4.7 30.8 13.1 8 8.4 12.3 19.6 11.9 31.2l-21.3 554.7c-0.9 22.8-19.8 41-42.7 41zM87.9 384c-1.4 0-2.6 1.2-2.6 2.6v464.1c0 1.4 1.2 2.6 2.6 2.6h63L169 384H87.9z" fill="#5F6379" /><path d="M810.4 938.7H275.7l24.6-640H418l72-201.8C510.7 38.9 566 0 627.5 0c42.4 0 82.6 18.4 110.3 50.4S778 124.8 772 166.7l-18.9 132h142.6c70.7 0 128.2 57.5 128.2 128.2l-1 9.3-84.4 379.4c-2.6 68.3-59.1 123.1-128.1 123.1z m-446.1-85.4h446.1c23.6 0 42.9-19.2 42.9-42.9l1-9.3L938.5 423c-2-21.8-20.4-39-42.7-39h-241l32.8-229.4c2.5-17.7-2.5-34.8-14.2-48.3s-28-20.9-45.9-20.9c-25.6 0-48.5 16.2-57.1 40.3L478.1 384h-95.7l-18.1 469.3z" fill="#3688FF" /></svg>
                        <span class="font-inter text-sm ml-1">{{ $movieRating }}%</span>
                        </div>
                        </div>
                    </a>
                    @endforeach
                </div>


            </div>

            <!-- top 10 tv show -->
            <div class="bg-indigo-900 mt-12">
                <span class="ml-28 font-inter text-white font-bold text-xl">Top 10 TV show</span>

                <div class="w-auto flex flex-row overflow-x-auto pl-28 pt-6 pb-10">
                @foreach($topTVShows as $tvShowItem)

                    @php

                    $original_date = $tvShowItem->first_air_date;
                    $timestamp = strtotime($original_date);
                    $tvShowYear = date("Y", $timestamp);

                    $tvShowID = $tvShowItem->id;
                    $tvShowTitle = $tvShowItem->original_name;
                    $tvShowRating = $tvShowItem->vote_average * 10;
                    $tvShowImage = "{$imageBaseURL}/w500{$tvShowItem->poster_path}";

                    @endphp


                    <a href="tv/id{{$tvShowID}}" class="group">
                        <div class="min-w-[232px] min-h-[428px] text-white bg-indigo-800 drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] group-hover:scale-125 duration-200" src="{{$tvShowImage}}">
                            </div>
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$tvShowTitle}}</span>
                        <span  class="font-inter text-sm mt-1">{{$tvShowYear}}</span>
                        <div class="flex flex-row mt-1 items-center">
                        <svg width="24" height="24" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M192 938.7H87.9c-48.4 0-87.9-39.5-87.9-88V386.6c0-48.5 39.5-87.9 87.9-87.9h125.4c11.6 0 22.7 4.7 30.8 13.1 8 8.4 12.3 19.6 11.9 31.2l-21.3 554.7c-0.9 22.8-19.8 41-42.7 41zM87.9 384c-1.4 0-2.6 1.2-2.6 2.6v464.1c0 1.4 1.2 2.6 2.6 2.6h63L169 384H87.9z" fill="#5F6379" /><path d="M810.4 938.7H275.7l24.6-640H418l72-201.8C510.7 38.9 566 0 627.5 0c42.4 0 82.6 18.4 110.3 50.4S778 124.8 772 166.7l-18.9 132h142.6c70.7 0 128.2 57.5 128.2 128.2l-1 9.3-84.4 379.4c-2.6 68.3-59.1 123.1-128.1 123.1z m-446.1-85.4h446.1c23.6 0 42.9-19.2 42.9-42.9l1-9.3L938.5 423c-2-21.8-20.4-39-42.7-39h-241l32.8-229.4c2.5-17.7-2.5-34.8-14.2-48.3s-28-20.9-45.9-20.9c-25.6 0-48.5 16.2-57.1 40.3L478.1 384h-95.7l-18.1 469.3z" fill="#3688FF" /></svg>
                        <span class="font-inter text-sm ml-1">{{$tvShowRating}}%</span>
                        </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- footer  -->
            @include('footer')
            </div>

            <script>
                //default aktif index
                let slideIndex = 1;
                showSlide(slideIndex)

                function showSlide(position){
                    let index;
                    const slidesArray = document.getElementsByClassName("slide");
                    const dotsArray = document.getElementsByClassName("dot")

                    //lopping efek
                    if (position > slidesArray.length) {
                        slideIndex = 1;
                    }
                    if (position < 1) {
                        slideIndex = slidesArray.length;
                    }
                    
                    //hide all slides
                    for (index = 0; index < slidesArray.length; index++) {
                        slidesArray[index].classList.add('hidden');
                    }
                    
                    //show aktif slides
                    slidesArray[slideIndex - 1].classList.remove('hidden');
                    
                    //remove aktif status
                    for (index = 0; index < dotsArray.length; index++){
                        dotsArray[index].classList.remove('bg-red-600');
                        dotsArray[index].classList.add('bg-white');
                    }
                    //set aktive status
                    dotsArray[slideIndex - 1].classList.remove('bg-white');
                    dotsArray[slideIndex - 1].classList.add('bg-red-600');
                }

                function moveSlide(moveStep) {
                    showSlide(slideIndex += moveStep)
                }
                function currentSlide(position) {
                    showSlide(slideIndex = position);
                }
             </script>
    </body>
</html>