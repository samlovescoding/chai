<?php
    class Errors{
        public function file_not_found(){
            echo "404 File Not Found";
        }
        public function server_error(){
            echo "500 Server Error";
        }
        public function custom($code = 500, $message = ""){
            echo $code . " " . $message;
        }
    }