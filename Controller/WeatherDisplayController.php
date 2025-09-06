<?php

require_once 'View/WeatherDisplayView.php';
require_once 'Service/AccuWeatherService.php';
require_once 'Model/AccuWeatherLocation.php';

class WeatherDisplayController {

    private WeatherDisplayView $view;
    private AccuWeatherService $accuWeatherService;

    public function __construct() {
        $this->view = new WeatherDisplayView();
        $this->accuWeatherService = new AccuWeatherService();
    }

    public function index(): string {
        return $this->view->displayLocationSearchBox();
    }

    public function test(): string {
        $output = $this->view->displayAction("Welcome to the test action!");
        return $output;
    }

    public function postcodeSearch(string $postcode): string {
        $locationData = $this->accuWeatherService->getLocationDataFromPostcode($postcode);
        return $this->view->displayLocationsForSelection($locationData);
    }

    public function weatherSearch(string $locationKey): string {
        $weatherInfo = $this->accuWeatherService->getWeatherFromLocationKey($locationKey);
        return $this->view->displayConditionsForLocation($weatherInfo);
    }

    public function error(): string {
        return $this->view->displayAction("Welcome to the error action!");
    }
}