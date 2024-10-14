<?php

require_once 'View/WeatherDisplayView.php';
require_once 'Service/AccuWeatherService.php';

class WeatherDisplayController {

    private WeatherDisplayView $view;
    private AccuWeatherService $accuWeatherService;

    public function __construct() {
        $this->view = new WeatherDisplayView();
        $this->accuWeatherService = new AccuWeatherService();
    }

    public function index(): string {
        return $this->view->displayAction("Welcome to the index action!");
    }

    public function test(): string {
        $output = $this->view->displayAction("Welcome to the test action!");
        return $output;
    }

    public function postcodeSearch(string $postcode): string {
        return $this->view->displayAction("Welcome to the postcode search action!");
         // $locationKey = $this->accuWeatherService->getLocationKeyFromPostcode('73134');
    }

    public function weatherSearch(string $locationKey): string {
        return $this->view->displayAction("Welcome to the weather search action!");
    }

    public function error(): string {
        return $this->view->displayAction("Welcome to the error action!");
    }
}