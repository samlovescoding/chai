<?php
    
    require "routes.php";

    class Blog extends Chai{
        public function index($data = ""){
            echo "application/index";
            $this->load->library("session");
            if(!empty($data)){
                echo '/' , $data;
            }
        }
        public function write(){
            echo "application/write";
        }
    }