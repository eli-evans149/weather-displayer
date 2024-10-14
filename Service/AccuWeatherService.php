<?php

require_once 'Model/AccuWeatherLocation.php';

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
    public function getWeatherFromLocationKey(string $locationKey): string {
        $ch = curl_init();
        $url = 'http://dataservice.accuweather.com/locations/v1/postalcodes/search?apikey=' . $this->apiKey . '&q=' . $locationKey;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        try {
            $output = json_decode($output, true);
            return $output[0]['WeatherText'];
        } catch (Throwable $e) {
            echo print_r($e, true);
            return '';
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
        echo "API URL: " . $url;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        $results = [];
        // try {
            $output = json_decode($output, true);
            echo "Output: " . print_r($output, true);
            foreach ($output as $location) {
                echo "Location for array: " . print_r($location, true);
                $results[] = new AccuWeatherLocation($location);
            }
        // } catch (Throwable $e) {
        //     echo print_r($e, true);
        // }

        return $results;
    }
}