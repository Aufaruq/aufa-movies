<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Http;


class MovieController extends Controller
{
    public function index(){
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $MAX_BANNER = 3;
        $MAX_MOVIE_ITEMS = 10;
        $MAX_TV_SHOWS_ITEMS =10;

        // hit api banner
        $bannerResponse = Http::get("{$baseURL}/trending/movie/week", [
            'api_key' => $apiKey,
        ]);

        //prepae variable
        $bannerArray = [];

        // check API response
        if ($bannerResponse->successful()){
            //cek data
            $resultArray = $bannerResponse->object()->results;

            if (isset($resultArray)){
                //looping response
                foreach ($resultArray as $item){
                    //save item variable
                    array_push($bannerArray, $item);

                    //max 3 item
                    if(count($bannerArray) == $MAX_BANNER){
                        break;
                    }
                }
            }
        }

        
        // hit api top 10 movie
        $topMoviesResponse = Http::get("{$baseURL}/movie/top_rated", [
            'api_key' => $apiKey,
        ]);

        //prepare variable
        $topMoviesArray = [];

        //cek api response
        if ($topMoviesResponse->successful()){
            //cek data kosong atau tidak
            $resultArray = $topMoviesResponse->object()->results;
            if (isset($resultArray)){
                 //looping response
                 foreach ($resultArray as $item){
                    //save item variable
                    array_push($topMoviesArray, $item);

                    //max 10 item
                    if(count($topMoviesArray) == $MAX_MOVIE_ITEMS){
                        break;
                    }
                }
            }
        }

        // hit api top 10 tv show
        $topTVShowResponse = Http::get("{$baseURL}/tv/top_rated", [
            'api_key' => $apiKey,
        ]);

        //prepare variable
        $topTVShowsArray = [];

        //cek api response
        if ($topTVShowResponse->successful()){
            //cek data kosong atau tidak
            $resultArray = $topTVShowResponse->object()->results;
            if (isset($resultArray)){
                 //looping response
                 foreach ($resultArray as $item){
                    //save item variable
                    array_push($topTVShowsArray, $item);

                    //max 10 item
                    if(count($topTVShowsArray) == $MAX_TV_SHOWS_ITEMS){
                        break;
                    }
                }
            }
        }



        return view('home' , [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'banner' => $bannerArray,
            'topMovies' => $topMoviesArray,
            'topTVShows' => $topTVShowsArray
        ]);
    }




    public function movies(){
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $sortBy = "popularity.desc";
        $page = 1;
        $minimalVoter = 100;


        $movieResponse = Http::get("{$baseURL}/discover/movie", [
            'api_key' => $apiKey,
            'sort_by' => $sortBy,
            'vote_count.gte' => $minimalVoter,
            'page' => $page
        ]);

        $movieArray = [];


        if ($movieResponse->successful()){
            //cek data kosong atau tidak
            $resultArray = $movieResponse->object()->results;
            if (isset($resultArray)){
                 //looping response
                 foreach ($resultArray as $item){
                    //save item variable
                    array_push($movieArray, $item);
                }
            }
        }
    
        

        return view('movie', [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'movies' => $movieArray,
            'sortBy' => $sortBy,
            'page' => $page,
            'minimalVoter' => $minimalVoter
        ]);
    }

    public function tvShows(){
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');
        $sortBy = "popularity.desc";
        $page = 1;
        $minimalVoter = 100;


        $tvResponse = Http::get("{$baseURL}/discover/tv", [
            'api_key' => $apiKey,
            'sort_by' => $sortBy,
            'vote_count.gte' => $minimalVoter,
            'page' => $page
        ]);

        $tvArray = [];


        if ($tvResponse->successful()){
            //cek data kosong atau tidak
            $resultArray = $tvResponse->object()->results;
            if (isset($resultArray)){
                 //looping response
                 foreach ($resultArray as $item){
                    //save item variable
                    array_push($tvArray, $item);
                }
            }
        }
    
        

        return view('tv', [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'tvShows' => $tvArray,
            'sortBy' => $sortBy,
            'page' => $page,
            'minimalVoter' => $minimalVoter
        ]);
    }




    public function search(){
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');


        return view('search', [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
        ]);
    }
    

    public function movieDetails($id){
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');


        $response = Http::get("{$baseURL}/movie/{$id}", [
            'api_key' => $apiKey,
            'append_to_response' => 'videos'
        ]);


        $movieData = null;

        if ($response->successful()){
            $movieData = $response->object();
        }

        return view('movie_details', [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
            'movieData' => $movieData
        ]);
    }

    public function login(){
        $baseURL = env('MOVIE_DB_BASE_URL');
        $imageBaseURL = env('MOVIE_DB_IMAGE_BASE_URL');
        $apiKey = env('MOVIE_DB_API_KEY');


        return view('login', [
            'baseURL' => $baseURL,
            'imageBaseURL' => $imageBaseURL,
            'apiKey' => $apiKey,
        ]);
    }
}
