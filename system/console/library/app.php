<?php
    class App extends Chai_Console{
        public function call($app, $script){
            require $app . DIRECTORY_SEPARATOR . $script . ".php";
        }
    }