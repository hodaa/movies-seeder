<?php


namespace Hoda\Movies\Repositories;

use Illuminate\Support\Facades\Http;

class Repository
{

    public function fetch($apiUrl, $page=null)
    {
        $url= config('movie.url').$apiUrl.'?api_key='.config('movie.api_key');
        $url =$page ? $url.'&page='.$page :$url;
        $response= Http::get($url);

        return json_decode($response->getBody());
    }

    public function sync()
    {
    }
}
