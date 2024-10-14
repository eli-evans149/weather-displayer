<?php

class AccuWeatherLocation {
    private $locationKey;
    private $locationName;

    /**
     * AccuWeaterLocation constructor.  
     * @param array $data should be an array created from the JSON response of looking up a location in AccuWeather
     */
    public function __construct(array $data) {
        $this->locationKey = $data['Key'];
        $this->locationName = $data['EnglishName'];
    }

    public function getLocationKey() {
        return $this->locationKey;
    }

    public function getLocationName() { 
        return $this->locationName;
    }

}