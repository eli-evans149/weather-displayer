<?php

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

    public function getHeader(): string {
        return "<h1>Weather Display</h1>";
    }
}

?>