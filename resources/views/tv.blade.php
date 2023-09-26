<html>
<head>
    <title>AufaMovies || Nonton movie & Anime gratis</title>
        @vite('resources/css/app.css');
    </head>
    <body>
        <div class="w-full h-auto min-h-screen bg-indigo-900 flex flex-col">
            <!-- header -->
            @include('header')

            <!-- sort  -->
            <div class="ml-28 mt-8 flex flex-row items-center">
                <span class="font-inter text-white font-bold text-xl">Sort</span>

                <div class="relative ml-4">
                    <select class="block appearence-none bg-indigo-900 text-white drop-shadow-[0_0px_4px_rgba(0,0,0,0.25)] font-inter py-3 pl-4 pr-8 rounded-lg leading-light focus:outline-none focus:bg-white"
                    onchange="changeSort(this)">
                    <option value="popularity.desc">Popularity (Descending)</option>
                    <option value="popularity.asc">Popularity (Ascending)</option>
                    <option value="vote_average.desc">Top Rated (Descending)</option>
                    <option value="vote_average.asc">Top Rated (Ascending)</option>
                    </select>
                </div>
            </div>

            <!-- konten -->
                <div class="w-auto pl-28 pr-10 pt-6 pb-10 grid grid-cols-3 lg:grid-cols-5 gap-5" id="dataWrapper">
                @foreach($tvShows as $tvItem)

                @php
                $original_date = $tvItem->first_air_date;
                $timestamp = strtotime($original_date);

                $tvYear = date("Y", $timestamp);
                $tvID = $tvItem->id;
                $tvTitle = $tvItem->original_name;
                $tvRating = $tvItem->vote_average * 10;
                $tvImage = "{$imageBaseURL}/w500{$tvItem->poster_path}";

                @endphp

                    <a href="tv/{{$tvID}}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-indigo-800 text-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] group-hover:scale-125 duration-200" src="{{$tvImage}}">
                            </div>
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">{{$tvTitle}}</span>
                        <span  class="font-inter text-sm mt-1">{{$tvYear}}</span>
                        <div class="flex flex-row mt-1 items-center">
                        <svg width="24" height="24" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M192 938.7H87.9c-48.4 0-87.9-39.5-87.9-88V386.6c0-48.5 39.5-87.9 87.9-87.9h125.4c11.6 0 22.7 4.7 30.8 13.1 8 8.4 12.3 19.6 11.9 31.2l-21.3 554.7c-0.9 22.8-19.8 41-42.7 41zM87.9 384c-1.4 0-2.6 1.2-2.6 2.6v464.1c0 1.4 1.2 2.6 2.6 2.6h63L169 384H87.9z" fill="#5F6379" /><path d="M810.4 938.7H275.7l24.6-640H418l72-201.8C510.7 38.9 566 0 627.5 0c42.4 0 82.6 18.4 110.3 50.4S778 124.8 772 166.7l-18.9 132h142.6c70.7 0 128.2 57.5 128.2 128.2l-1 9.3-84.4 379.4c-2.6 68.3-59.1 123.1-128.1 123.1z m-446.1-85.4h446.1c23.6 0 42.9-19.2 42.9-42.9l1-9.3L938.5 423c-2-21.8-20.4-39-42.7-39h-241l32.8-229.4c2.5-17.7-2.5-34.8-14.2-48.3s-28-20.9-45.9-20.9c-25.6 0-48.5 16.2-57.1 40.3L478.1 384h-95.7l-18.1 469.3z" fill="#3688FF" /></svg>
                        <span class="font-inter text-sm ml-1">{{$tvRating}}%</span>
                        </div>
                        </div>
                    </a>
                    @endforeach
                </div>


                <!-- eror -->
                <div id="notification" class="min-w-[250px] p-4 bg-red-700 text-white text-center rounded-lg fixed z-index-10 top-0 right-0 mr-10 mt-5 drop-shadow-lg">
                    <span id="notificationMessage"></span>
                </div>

                <!-- data loader -->
                <div class="w-full pl-28 pr-10 flex justify-center mb-5" id="autoLoad">
                    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="24" height="24" viewBox="0 0 128 128" xml:space="preserve"><rect x="0" y="0" width="100%" height="100%" fill="#FFFFFF" /><g><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#000000"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#f8f8f8" transform="rotate(30 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#e8e8e8" transform="rotate(60 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#d4d4d4" transform="rotate(90 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#bebebe" transform="rotate(120 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#a6a6a6" transform="rotate(150 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#8e8e8e" transform="rotate(180 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#737373" transform="rotate(210 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#5a5a5a" transform="rotate(240 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#414141" transform="rotate(270 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#2a2a2a" transform="rotate(300 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#151515" transform="rotate(330 64 64)"/><animateTransform attributeName="transform" type="rotate" values="0 64 64;30 64 64;60 64 64;90 64 64;120 64 64;150 64 64;180 64 64;210 64 64;240 64 64;270 64 64;300 64 64;330 64 64" calcMode="discrete" dur="1080ms" repeatCount="indefinite"></animateTransform></g></svg>
                </div>
                <!-- load more -->
                <div class="w-full pl-28 pr-10 flex justify-center mb-5" id="loadMore">
                    <button class="w-full mb-10 bg-red-600 text-white p-4 font-inter font-bold rounded-xl uppercase drop-shadow-lg" onclick="loadMore()">Load More</button>
                </div>
            <!-- footer -->
            @include('footer')
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

         <script>
            let baseURL = "<?php echo $baseURL; ?>";
            let imageBaseURL = "<?php echo $imageBaseURL; ?>";
            let apiKey = "<?php echo $apiKey; ?>";
            let sortBy = "<?php echo $sortBy; ?>";
            let page = "<?php echo $page; ?>";
            let minimalVoter = "<?php echo $minimalVoter; ?>";


            // // hide loader
            $("#autoLoad").hide();

            // //hide notif eror
            $("#notification").hide();

            function loadMore(){
                $.ajax({
                    url: `${baseURL}/discover/tv?page=${++page}&sort_by=${sortBy}&api_key=${apiKey}&vote_count.gte=${minimalVoter}`,
                    type: "get",
                    beforeSend: function(){
                        //show load more
                        $("#autoLoad").show();
                    }
                })
                
                .done(function (response){
                //hide loader
                $("#autoLoad").hide();


                //get data
                if ( response.results){
                    var htmlData = [];


                    response.results.forEach(item => {
                        let original_date = item.first_air_date;
                        let date = new Date(original_date);
                        let tvYear = date.getFullYear();
                        let tvID = item.id;
                        let tvTitle = item.original_name;
                        let tvImage = `${imageBaseURL}/w500${item.poster_path}`;
                        let tvRating = item.vote_average * 10;

                        
                        htmlData.push(`<a href="tv/${tvID}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] group-hover:scale-125 duration-200" src="${tvImage}">
                            </div>
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">${tvTitle}</span>
                        <span  class="font-inter text-sm mt-1">${tvYear}</span>
                        <div class="flex flex-row mt-1 items-center">
                        <svg width="24" height="24" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M192 938.7H87.9c-48.4 0-87.9-39.5-87.9-88V386.6c0-48.5 39.5-87.9 87.9-87.9h125.4c11.6 0 22.7 4.7 30.8 13.1 8 8.4 12.3 19.6 11.9 31.2l-21.3 554.7c-0.9 22.8-19.8 41-42.7 41zM87.9 384c-1.4 0-2.6 1.2-2.6 2.6v464.1c0 1.4 1.2 2.6 2.6 2.6h63L169 384H87.9z" fill="#5F6379" /><path d="M810.4 938.7H275.7l24.6-640H418l72-201.8C510.7 38.9 566 0 627.5 0c42.4 0 82.6 18.4 110.3 50.4S778 124.8 772 166.7l-18.9 132h142.6c70.7 0 128.2 57.5 128.2 128.2l-1 9.3-84.4 379.4c-2.6 68.3-59.1 123.1-128.1 123.1z m-446.1-85.4h446.1c23.6 0 42.9-19.2 42.9-42.9l1-9.3L938.5 423c-2-21.8-20.4-39-42.7-39h-241l32.8-229.4c2.5-17.7-2.5-34.8-14.2-48.3s-28-20.9-45.9-20.9c-25.6 0-48.5 16.2-57.1 40.3L478.1 384h-95.7l-18.1 469.3z" fill="#3688FF" /></svg>
                        <span class="font-inter text-sm ml-1">${tvRating}%</span>
                        </div>
                        </div>
                    </a>`);
                    });

                    $("#dataWrapper").append(htmlData.join(""));

                }
                })

                .fail(function (jqHXR, ajaxOptions, thrownError){
                    //hide loader
                    $("#autoLoad").hide();

                    //show notif
                    $("#notificationMessage").text("terjadi kendala, silahkan coba lagi");
                    $("#notification").show();

                    //set time out
                    setTimeout(function (){
                    $("#notification").hide();
                    }, 3000);
                })
            }
            function changeSort(component){
                console.log('component:', component);
                if (component.value){
                    //set new value
                    sortBy = component.value;

                    //clear data
                    $("#dataWrapper").html("");

                    //reset page value
                    page = 0;
                    
                    //get data
                    loadMore();
                }
            }
         </script>
    </body>
</html>