<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\WeatherController;

class WeatherController extends Controller
{
//     public function fetchWeatherData()
// {
//     $client = new Client();
//     $response = $client->get('http://api.openweathermap.org/data/2.5/weather?q=Morocco&appid=bbd612775be8bb8c7047b05ce7fbb572');
//     $data = json_decode($response->getBody(), true);

//     return view('weather.listing', compact('data'));
// }


public function index()
{
    $cities = ['Marrakech', 'Casablanca', 'Youssoufia'];
    $apiKey = 'bbd612775be8bb8c7047b05ce7fbb572';
    $client = new Client(['base_uri' => 'https://api.openweathermap.org']);

    $weatherData = [];
    foreach ($cities as $city) {
        $response = $client->request('GET', '/data/2.5/forecast', [
            'query' => [
                'q' => $city . ',MA',
                'appid' => $apiKey,
                'units' => 'metric'
            ],
            'verify' => false
        ]);

        $weatherData[$city] = json_decode($response->getBody()->getContents());
    }
    
    return view('weather.listing', ['weatherData' => $weatherData]);
}


}
