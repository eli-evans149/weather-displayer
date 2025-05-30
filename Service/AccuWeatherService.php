<?php

require_once 'Model/AccuWeatherLocation.php';
require_once 'MOdel/AccuWeatherCurrentCondition.php';

class AccuWeatherService {
    private string $apiKey;

    public function __construct() {
        require 'secrets.php';
        $this->apiKey = $api_key;
    }

    /**
     * Gets the current weather description for a given location key.
     *
     * @param string $locationKey The location key to search for.
     * @return string The current weather for the given location.
     * @throws Throwable If there is an issue connecting to the AccuWeather API.
     */
    public function getWeatherFromLocationKey(string $locationKey): AccuWeatherCurrentCondition {
        $ch = curl_init();
        $url = 'http://dataservice.accuweather.com/currentconditions/v1/'. $locationKey . '?apikey=' . $this->apiKey;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        try {
            $output = json_decode($output, true);
            return new AccuWeatherCurrentCondition($output[0]['WeatherText'], $output[0]['Temperature'], $output[0]['WeatherIcon']);
        } catch (Throwable $e) {
            echo print_r($e, true);
            return new AccuWeatherCurrentCondition('', []);
        }
    }
    
    
    /**
     * Returns an array of AccuWeatherLocation objects representing the weather for
     * locations that match the given postcode.
     *
     * @param string $postcode The postcode to search for.
     * @return array An array of AccuWeatherLocation objects.
     * @throws Throwable If there is an issue connecting to the AccuWeather API. 
     */
    public function getLocationDataFromPostcode(string $postcode): array {
        $ch = curl_init();
        $url = 'http://dataservice.accuweather.com/locations/v1/postalcodes/search?apikey=' . $this->apiKey . '&q=' . $postcode;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        $results = [];
        try {
            $output = json_decode($output, true);
            foreach ($output as $location) {
                $results[] = new AccuWeatherLocation($location);
            }
        } catch (Throwable $e) {
            echo print_r($e, true);
        }

        return $results;
    }

    
}