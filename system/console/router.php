<?php

    /*
     * Chai Console Routing
     * 
     * This file performs basic controller method based routing for 
     * all of the libraries in the library directory. In case router
     * cannot find the correct library and method, it will redirect
     * to error library and call the index.
    */

    $arguments = $argv;
    $argument_count = $argc;

    array_shift($arguments);
    $argument_count--;

    require_once "library" . DIRECTORY_SEPARATOR . "problem.php";
    require_once "library" . DIRECTORY_SEPARATOR . "help.php";

    $controller = DEFAULT_CONTROLLER;
    $method = DEFAULT_METHOD;

    if($argument_count > 0){
        $library_name = strtolower(array_shift($arguments));
        $argument_count--;
        

        
        if(file_exists(CHAI_SYSTEM_DIR . DIRECTORY_SEPARATOR . "console" . DIRECTORY_SEPARATOR . "library" . DIRECTORY_SEPARATOR . $library_name . ".php")){
            require_once "library" . DIRECTORY_SEPARATOR . $library_name . ".php";
            $controller = $library_name;

            if($argument_count > 0){
                $method_name = strtolower(array_shift($arguments));

                if(method_exists($controller, $method_name)){
                    $method = $method_name;
                }else{
                    $controller = ERROR_CONTROLLER;
                    $method = ERROR_COMMAND_NOT_FOUND_METHOD;
                }
            }
        }else{
            $controller = ERROR_CONTROLLER;
            $method = ERROR_COMMAND_NOT_FOUND_METHOD;
        }
    }
    $controller_name = ucfirst($controller);
    $object = new $controller_name;
    call_user_func_array(array($object, $method), $arguments);