<?php
    
    $current_request_uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

    $current_request_uri = substr($current_request_uri, strlen(config("base_route")));

    $current_route = null;
    $current_params = [];

    //Match routes here

    foreach ($_ROUTES as $route => $to) {
        if($to->exact == true){
            if(trim($current_request_uri, '/') == trim($route, '/')){
                $current_route = $to;
                $current_params = [];
                break;
            }
        }else{
            if (strpos($current_request_uri, $route) === 0) {
                $current_route = $to;
                $current_params_uri = substr($current_request_uri, strlen($route));
                $current_params_uri = trim($current_params_uri, "/");
                $current_params = explode("/", $current_params_uri);
                break;
            }
        }
    }

    if($current_route === null){
        $current_route = config("route_error");
    }

    $current_route->render($current_params);