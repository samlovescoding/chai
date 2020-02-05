<?php

    global $_APPS;
    global $_ROUTES;
    global $_CONFIG;

    function register_app($app_name){
        global $_APPS;
        $app_base = $app_name . DIRECTORY_SEPARATOR . $app_name . ".php";
        if(file_exists($app_base)){
            $_APPS[] = $app_name;
            require $app_base;
        }else{
            throw new AppNotFound($app_name, $app_base);
        }
    }

    function register_route($route_key, $route_to){
        global $_ROUTES;
        $_ROUTES[$route_key] = $route_to;
        return $_ROUTES[$route_key];
    }

    function register_config($key, $value){
        global $_CONFIG;
        $_CONFIG[$key] = $value;
    }