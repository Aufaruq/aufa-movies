<html>
    <head>
        <title>AufaMovies || Nonton movie & Anime gratis</title>
        @vite('resources/css/app.css');
    </head>
    <body>
        <div class="w-full h-auto min-h-screen flex flex-col">
            <!-- header -->
            @include('header')

            <!-- search -->
            <div class="w-full h-auto min-h-screen">
                <!-- search input -->
                <div class="w-full pl-10 lg:pl-20 pr-10 lg:pr-0">
                    <div class="relative w-full lg:w-80 mt-10 mb-5 bg-white drop-shadow-[0_0px_4px_rgba(0,0,0,0.25)]">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-event-none">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <path id="search-a" d="M11.7099609,0.572509766 C9.46940104,1.29012044 7.99951172,3.05419922 7.30029297,5.86474609 C6.25146484,10.0805664 4.95166016,10.6181641 0.719970703,9.11865234 C2.23974609,11.9257813 5.32006836,13.0512695 7.30029297,13.0512695 C9.28051758,13.0512695 14.4091797,10.2941895 13.8215332,5.0534668 C13.3114421,3.52709961 12.6075846,2.03344727 11.7099609,0.572509766 Z"/>
                            <path id="search-c" d="M14.1791377,12.7701494 L19.7100661,18.3101411 C20.0966446,18.6967197 20.0966446,19.3234875 19.7100661,19.7100661 C19.3234875,20.0966446 18.6967197,20.0966446 18.3101411,19.7100661 L12.7803471,14.1712106 C11.4385246,15.2160226 9.75152329,15.8383427 7.91917136,15.8383427 C3.54553379,15.8383427 0,12.2928089 0,7.91917136 C0,3.54553379 3.54553379,0 7.91917136,0 C12.2928089,0 15.8383427,3.54553379 15.8383427,7.91917136 C15.8383427,9.74688445 15.2191696,11.4299819 14.1791377,12.7701494 Z M7.91917136,13.8585499 C11.1993995,13.8585499 13.8585499,11.1993995 13.8585499,7.91917136 C13.8585499,4.63894318 11.1993995,1.97979284 7.91917136,1.97979284 C4.63894318,1.97979284 1.97979284,4.63894318 1.97979284,7.91917136 C1.97979284,11.1993995 4.63894318,13.8585499 7.91917136,13.8585499 Z"/>
                        </defs>
                        <g fill="none" fill-rule="evenodd" transform="translate(2 2)">
                            <g transform="translate(1 2)">
                            <mask id="search-b" fill="#ffffff">
                                <use xlink:href="#search-a"/>
                            </mask>
                            <use fill="#D8D8D8" xlink:href="#search-a"/>
                            <g fill="#FFA0A0" mask="url(#search-b)">
                                <rect width="24" height="24" transform="translate(-3 -4)"/>
                            </g>
                            </g>
                            <mask id="search-d" fill="#ffffff">
                            <use xlink:href="#search-c"/>
                            </mask>
                            <use fill="#000000" fill-rule="nonzero" xlink:href="#search-c"/>
                            <g fill="#7600FF" mask="url(#search-d)">
                            <rect width="24" height="24" transform="translate(-2 -2)"/>
                            </g>
                        </g>
                        </svg>
                        </div>


                        <input id="searchInput" type="search" class="block w-full p-8 lg:p-4 pl-12 lg:pl-10 text-2xl lg:text-sm text-black focus:outline-none" placeholder="Search..." required>
                    </div>
                </div>

                <!-- konten -->
                <div class="w-auto pl-28 pr-10 pt-6 pb-10 grid grid-cols-3 lg:grid-cols-5 gap-5" id="dataWrapper">
                <!-- wait from ajax -->
                </div>
                <!-- eror -->
                <div id="notification" class="min-w-[250px] p-4 bg-red-700 text-white text-center rounded-lg fixed z-index-10 top-0 right-0 mr-10 mt-5 drop-shadow-lg">
                    <span id="notificationMessage"></span>
                </div>

                <!-- data loader -->
                <div class="w-full pl-28 pr-10 flex justify-center mb-5" id="autoLoad">
                    <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="24" height="24" viewBox="0 0 128 128" xml:space="preserve"><rect x="0" y="0" width="100%" height="100%" fill="#FFFFFF" /><g><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#000000"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#f8f8f8" transform="rotate(30 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#e8e8e8" transform="rotate(60 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#d4d4d4" transform="rotate(90 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#bebebe" transform="rotate(120 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#a6a6a6" transform="rotate(150 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#8e8e8e" transform="rotate(180 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#737373" transform="rotate(210 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#5a5a5a" transform="rotate(240 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#414141" transform="rotate(270 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#2a2a2a" transform="rotate(300 64 64)"/><path d="M64 1.5a62.8 62.8 0 0 0-12.4 1.23l-.38-1.45a64.56 64.56 0 0 1 25.57 0l-.4 1.45A62.78 62.78 0 0 0 64 1.5zm0 3a59.78 59.78 0 0 1 11.62 1.14L71.34 21.6a43.43 43.43 0 0 0-14.67.04l-4.3-16A59.78 59.78 0 0 1 64.02 4.5z" fill="#151515" transform="rotate(330 64 64)"/><animateTransform attributeName="transform" type="rotate" values="0 64 64;30 64 64;60 64 64;90 64 64;120 64 64;150 64 64;180 64 64;210 64 64;240 64 64;270 64 64;300 64 64;330 64 64" calcMode="discrete" dur="1080ms" repeatCount="indefinite"></animateTransform></g></svg>
                </div>

            </div>

            <!-- footer -->
            @include('footer')
        </div>


        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

        <script>
            let baseURL = "<?php echo $baseURL; ?>";
            let imageBaseURL = "<?php echo $imageBaseURL; ?>";
            let apiKey = "<?php echo $apiKey; ?>";
            let searchKeywoard = "";

            // hide loader
            $("#autoLoad").hide();

            // hide notif eror
            $("#notification").hide();


            $('#searchInput').keypress(function(event){
                var key = event.which;
                if (key == 13){
                    searchKeywoard = $('#searchInput').val();
                    if (searchKeywoard){
                        search();
                    }
                    return false;
                }
            });

            function search(){
                $.ajax({
                    url: `${baseURL}/search/multi?page=1&api_key=${apiKey}&query=${searchKeywoard}`,
                    type: "get",
                    beforeSend: function(){
                        //show load more
                        $("#autoLoad").show();


                        //clear konten
                        $("#dataWrapper").html("");
                    }
                })
                
                .done(function (response){
                //hide loader
                $("#autoLoad").hide();


                if (response.result){
                    var htmlData = [];
                    response.results.forEach(item => {
                        if (item.media_type == 'movie' || item.media_type == 'tv') {
                            let searchTitle = "";
                            let originalDate = "";
                            let detailsURL = "";
                            
                            if (item.media_type == 'movie') {
                                detailsURL = `/movie/${item.id}`;
                                originalDate = item.release_date;
                                searchTitle = item.title;
                            } else {
                                detailsURL = `/tv/${item.id}`;
                                originalDate = item.first_air_date;
                                searchTitle = item.name;
                            }


                            let date = new Date(originalDate);

                            let searchYear = date.getFullYear();
                            let searchImage = item.poster_path ? `${imageBaseURL}/w500${item.poster_path}` : 'https://via.placeholder.com/300x400';
                            let searchRating = item.vote_average * 10;


                            htmlData.push(`<a href="${detailsURL}" class="group">
                        <div class="min-w-[232px] min-h-[428px] bg-white drop-shadow-[0_0px_8px_rgba(0,0,0,0.25)] group-hover:drop-shadow-[0_0px_8px_rgba(0,0,0,0.5)] rounded-[32px] p-5 flex flex-col mr-8 duration-100">
                            <div class="overflow-hidden rounded-[32px]">
                                <img class="w-full h-[300px] group-hover:scale-125 duration-200" src="${searchImage}">
                            </div>
                            <span class="font-inter font-bold text-xl mt-4 line-clamp-1 group-hover:line-clamp-none">${searchTitle}</span>
                        <span  class="font-inter text-sm mt-1">${searchYear}</span>
                        <div class="flex flex-row mt-1 items-center">
                        <svg width="24" height="24" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M192 938.7H87.9c-48.4 0-87.9-39.5-87.9-88V386.6c0-48.5 39.5-87.9 87.9-87.9h125.4c11.6 0 22.7 4.7 30.8 13.1 8 8.4 12.3 19.6 11.9 31.2l-21.3 554.7c-0.9 22.8-19.8 41-42.7 41zM87.9 384c-1.4 0-2.6 1.2-2.6 2.6v464.1c0 1.4 1.2 2.6 2.6 2.6h63L169 384H87.9z" fill="#5F6379" /><path d="M810.4 938.7H275.7l24.6-640H418l72-201.8C510.7 38.9 566 0 627.5 0c42.4 0 82.6 18.4 110.3 50.4S778 124.8 772 166.7l-18.9 132h142.6c70.7 0 128.2 57.5 128.2 128.2l-1 9.3-84.4 379.4c-2.6 68.3-59.1 123.1-128.1 123.1z m-446.1-85.4h446.1c23.6 0 42.9-19.2 42.9-42.9l1-9.3L938.5 423c-2-21.8-20.4-39-42.7-39h-241l32.8-229.4c2.5-17.7-2.5-34.8-14.2-48.3s-28-20.9-45.9-20.9c-25.6 0-48.5 16.2-57.1 40.3L478.1 384h-95.7l-18.1 469.3z" fill="#3688FF" /></svg>
                        <span class="font-inter text-sm ml-1">${searchRating}%</span>
                        </div>
                        </div>
                    </a>`);
                        }
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


        </script>
    </body>
</html>