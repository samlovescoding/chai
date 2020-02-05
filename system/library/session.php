<?php

    session_start();

    class Chai_Session{
        public function set($key, $value){
            $_SESSION[config("session_prefix") . $key] = $value;
        }
        public function get($key){
            return $_SESSION[config("session_prefix") . $key];
        }
    }