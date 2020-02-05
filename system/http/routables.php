<?php

    class Route{
        public function __construct($function_name, string $class_name = NULL, bool $use_object = true) {
            $this->function_name = $function_name;
            $this->class_name = $class_name;
            $this->is_method = false;
            if($class_name != NULL){
                $this->is_method = true;
            }
            $this->use_object = $use_object;
            $this->exact = false;
        }
        public function render($arguments){
            if($this->is_method == true){
                if($this->use_object == true){
                    $created_object = new $this->class_name;
                    call_user_func_array(array($created_object, $this->function_name), $arguments);
                }else{
                    call_user_func_array(array($this->class_name, $this->function_name), $arguments);

                }
            }else{
                call_user_func_array($this->function_name, $arguments);
            }
        }
        public function exact($is_exact = true){
            $this->exact = $is_exact;
        }
    }

    function to($string){
        if (strpos($string, '@') !== false) {
            $string_parts = explode("@", $string);
            $method_name = array_pop($string_parts);
            $class_name = array_pop($string_parts);
            return to_object_method($class_name, $method_name);
        }else{
            return to_function($string);
        }
    }

    function to_route($to){
        header("Location: " . config("base_path") . $to);
    }

    function to_function($function_name){
        return new Route($function_name);
    }
    function to_class_method($class, $method){
        return new Route($method, $class, true, false);
    }
    function to_object_method($class, $method){
        return new Route($method, $class, true, true);
    }
    function to_text($text){
        return to_function(function ($text){
            echo $text;
        });
    }
    function to_dump($text){
        return to_function(function ($text){
            var_dump($text);
        });
    }

    