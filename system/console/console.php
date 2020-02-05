<?php

    class Chai_Console extends Chai{
        public function params(){
            global $argv;
            return $argv;
        }
        public function clear(){
            echo chr(27).chr(91).'H'.chr(27).chr(91).'J';
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                system("cls");
            }else{
                system("clear");
            }
        }
        public function write(string $data){
            echo $data;
        }
        public function read(string $prompt = NULL){
            if (!function_exists('readline')) {
                function readline($question = NULL)
                {
                    $fh = fopen('php://stdin', 'r');
                    echo $question;
                    $userInput = trim(fgets($fh));
                    fclose($fh);
                    return $userInput;
                }
            }
            return readline($prompt);
        }
        public function dump($data){
            var_dump($data);
        }
        public function info($data){
            print_r($data);
        }
        public function terminate(){
            die();
        }
    }