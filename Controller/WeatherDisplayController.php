<?php

require_once 'View/WeatherDisplayView.php';

class WeatherDisplayController {

    private WeatherDisplayView $view;

    public function __construct() {
        $this->view = new WeatherDisplayView();
    }

    public function index(): string {
        return $this->view->displayAction("Welcome to the index action!");
    }

    public function test(): string {
        return $this->view->displayAction("Welcome to the test action!");
    }

    public function error(): string {
        return $this->view->displayAction("Welcome to the error action!");
    }
}