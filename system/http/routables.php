<?php
    namespace Chai_Routables {

        class Route{
            public function __construct($function_name, string $class_name = NULL, bool $use_object = true) {
                $this->function_name = $function_name;
                $this->class_name = $class_name;
                $this->is_method = false;
                if($this->class_name == NULL){
                    $this->is_method = true;
                }
                $this->use_object = $use_object;
            }
            public function render($arguments){
                if($is_method == true){
                    if($use_object == true){
                        $created_object = new $this->class_name;
                        call_user_func_array(array($created_object, $this->function_name), $arguments);
                    }else{
                        call_user_func_array(array($this->class_name, $this->function_name), $arguments);

                    }
                }else{
                    call_user_func_array($this->function_name, $arguments);
                }
            }
        }

        function to_function($function_name){
            return new Route($function_name);
        }
        function to_class($class, $method){
            return new Route($method, $class, true, false);
        }
        function to_object($class, $method){
            return new Route($method, $class, true, true);
        }
        function to_text($text){
            return to_function(function ($text){
                echo $text;
            });
        }
        function to_application($application_name){
            require strtolower($application_name) . DIRECTORY_SEPARATOR . strtolower($application_name) . ".php";
        }
    }

    namespace {
        function add_route($route_key, $route_to){
            $_ROUTES[$route_key] = $route_to;
        }
    }