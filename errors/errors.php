<?php

    register_route("/error", to("Errors@server_error"));
    register_route("/file_not_found", to("Errors@file_not_found"));

    class Errors{
        public function file_not_found(){
            echo "404 File Not Found";
        }
        public function route_not_found(){
            echo "404 Route Not Found";
        }
        public function server_error(){
            echo "500 Server Error";
        }
        public function custom($code = 500, $message = ""){
            echo $code . " " . $message;
        }
    }