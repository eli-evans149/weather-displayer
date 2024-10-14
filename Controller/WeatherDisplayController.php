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

        $locationKey = $this->accuWeatherService->getLocationKeyFromPostcode('73134');

        $output .= $locationKey;
        return $output;
    }

    public function error(): string {
        return $this->view->displayAction("Welcome to the error action!");
    }
}