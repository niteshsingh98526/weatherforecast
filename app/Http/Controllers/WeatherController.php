<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    /**
     * Display the weather forecast form
     */
    public function index()
    {
        return view('weather.index');
    }

    /**
     * Get weather data from Weatherstack API
     */
    public function getWeather(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        $query = $request->input('query');
        $apiKey = env('WEATHERSTACK_API_KEY');
        $apiUrl = env('WEATHERSTACK_API_URL');

        try {
            $response = Http::get($apiUrl, [
                'access_key' => $apiKey,
                'query' => $query,
            ]);

            $weatherData = $response->json();

            if (isset($weatherData['error'])) {
                return back()->with('error', 'Error: ' . $weatherData['error']['info']);
            }

            return view('weather.result', ['weatherData' => $weatherData]);
        } catch (\Exception $e) {
            return back()->with('error', 'Error connecting to weather service: ' . $e->getMessage());
        }
    }
}
