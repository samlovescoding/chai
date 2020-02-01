<?php
    class Problem extends Chai_Console{
        public function index(){
            echo "This file handles error messages.";
        }
        public function command_not_found(){
            echo "The command you requested was not found.";
        }
    }