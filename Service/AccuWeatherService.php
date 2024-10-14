<?php

class AccuWeatherService {
    private string $apiKey;

    public function __construct() {
        require 'secrets.php';
        $this->apiKey = $api_key;
    }

    public function getLocationKeyFromPostcode(string $postcode): string {
        $ch = curl_init();
        $url = 'http://dataservice.accuweather.com/locations/v1/postalcodes/search?apikey=' . $this->apiKey . '&q=' . $postcode;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
        $output = curl_exec($ch);
        curl_close($ch);

        try {
            $output = json_decode($output, true);
            return $output[0]['Key'];
        } catch (Throwable $e) {
            echo print_r($e, true);
            return '';
        }
    }
}