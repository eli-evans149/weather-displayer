<?php

require_once 'Model/AccuWeatherLocation.php';
require_once 'Model/AccuWeatherCurrentCondition.php';

class WeatherDisplayView {

    private string $baseURL = "http://localhost:8000/";
    public function displayAction(string $action): string {
        return $this->getHeader() . $action;
    }

    public function displayLocationsForSelection(array $locations): string {
        $html = '';
        $html .= $this->getHeader();

        if (empty($locations)) {
            $html .= "No locations found, please go back and try again.";
        } else {
            $html .= '<h2>Available Locations</h2>';
            foreach ($locations as $location) {
                $locationName = $location->getLocationName();
                $locationKey = $location->getLocationKey();
                $html .= '<ul><a href="' . $this->baseURL . 'weather/' . $locationKey . '">';
                $html .= 'See the weather for: ' . $locationName . ' (' . $locationKey . ')';
                $html .= '</a></ul>';
            }
        }

        return $html;
    }

    public function displayConditionsForLocation(AccuWeatherCurrentCondition $currentCondition): string {
        $html = '';
        $html .= $this->getHeader();

        if ($currentCondition->getWeather() === '' || $currentCondition->getTemperature() === []) {
            $html .= "Conditions not found, please go back and try again.";
        } else {
            $html .= '<h2>Current Conditions</h2>';
            $html .= '<p>The current condition are: '. $currentCondition->getWeather() . '</p>';
            $html .= '<p>The current temperature is: ';
            $html .= $currentCondition->getTemperature()['Metric']['Value'] . ' ' . $currentCondition->getTemperature()['Metric']['Unit'] . '°';
            $html .= " or ";
            $html .= $currentCondition->getTemperature()['Imperial']['Value'] . ' ' . $currentCondition->getTemperature()['Imperial']['Unit'] . '°';
            $icon = $currentCondition->getIconPath();
            if (isset($icon)) {
                $html .= "<img src='/WeatherIcons/$icon' alt='Icon representing current conditions.'>"; // TODO: Fix this route.
            }
        }

        return $html;
    }

    public function getHeader(): string {
        return "<h1>Weather Display</h1>";
    }
}

?>