<?php

class AccuWeatherCurrentCondition {
    private string $weatherText;
    private array $temperature;
    private string $iconPath;

    function __construct(string $weatherText, array $temperature, string $iconPath = '') {
        $this->weatherText = $weatherText;
        $this->temperature = $temperature;
        $this->iconPath = $iconPath;
    }

    function getWeather(): string {
        return $this->weatherText;
    }

    function getTemperature(): array {
        return $this->temperature;
    }

    function getIconPath(): ?string {
        return $this->iconPath;
    }
}