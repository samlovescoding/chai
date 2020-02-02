<?php

    namespace Chai_Routables;

    global $_ROUTES;

    function hello(){
        echo "Hello";
    }

    class help{
        public function me(){
            echo "Help Me";
        }
        public function him(){
            $this->name();
            echo " him";
        }
        private function name(){
            echo "Help";
        }
    }

    $_ROUTES = array(
        "/" => to_function("hello"),
        "/help" => to_class("help", "me"),
        "/help/him" => to_object("help", "him"),
        "/sample" => to_text("This is sample data")
    );

    to_application("blog");
    to_application("errors");
