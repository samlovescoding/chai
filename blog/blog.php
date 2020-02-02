<?php
    
    
    add_route("/blog", Chai_Routables\to_text("Hi From your mom"));

    class Blog extends Chai{
        public function index(){
            echo "application/index";
        }
        public function write(){
            echo "application/write";
        }
    }