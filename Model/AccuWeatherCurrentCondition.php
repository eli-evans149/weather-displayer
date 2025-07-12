<?php

require_once 'View/WeatherDisplayView.php';

class AccuWeatherCurrentCondition {
    private string $weatherText;
    private array $temperature;
    private string $iconNmber;

    function __construct(string $weatherText, array $temperature, string $iconNumber = '') {
        $this->weatherText = $weatherText;
        $this->temperature = $temperature;
        $this->iconNumber = $iconNumber;
    }

    function getWeather(): string {
        return $this->weatherText;
    }

    function getTemperature(): array {
        return $this->temperature;
    }

    function getIconNumber(): ?string {
        return $this->iconNumber;
    }

    function getIconPath(): string { // TODO: FIX THIS FUNCTION.
        $iconDirectory = WeatherDisplayView::WEATHER_ICON_FOLDER;
        $directory = (dirname(__FILE__) .'\..' . $iconDirectory);
        $files = scandir($directory);
        $iconNumber = $this->getIconNumber();
        $fileStart = str_pad($iconNumber ?? '', 2, '0', STR_PAD_LEFT);
        foreach ($files as $file) {
            $stringPos = strpos($file, $fileStart);
            $stringPosString = print_r($stringPos, true);
            if ($stringPos === 0) {
                echo "File found: $file";
                return '..' . $iconDirectory . $file; // TODO: FIX HERE.
            }
        }
        echo "File not found.";
        return 'imgNotFound';
    }
}