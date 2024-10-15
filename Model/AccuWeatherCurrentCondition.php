<?php

class AccuWeatherCurrentCondition {
    private string $weatherText;
    private array $temperature;

    function __construct(string $weatherText, array $temperature) {
        $this->weatherText = $weatherText;
        $this->temperature = $temperature;
    }

    function getWeather(): string {
        return $this->weatherText;
    }

    function getTemperature(): array {
        return $this->temperature;
    }
}