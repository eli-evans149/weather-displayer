<?php

class WeatherDisplayView {

    public function displayAction(string $action): string {
        return $this->getHeader() . $action;
    }

    public function getHeader(): string {
        return "<h1>Weather Display</h1>";
    }
}

?>