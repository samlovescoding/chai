<?php

class AppNotFound extends Exception{
    public function __construct($app_name, $app_location, $code = 0, Exception $previous = null) {
        $message = "App " . $app_name . " not found at location " . $app_location . ".";
        parent::__construct($message, $code, $previous);
    }
}

class RouteAlreadyExists extends Exception{
    public function __construct($route, $points_to, $code = 0, Exception $previous = null) {
        $message = "Route '" . $route . "' already exists and points to " . $points_to . ".";
        parent::__construct($message, $code, $previous);
    }
}