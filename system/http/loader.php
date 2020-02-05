<?php

    class Chai_Loader{
        public function __construct($refer) {
            $this->refer = $refer;
        }
        public function library($library_name, $refer_by = null){
            $library_path = CHAI_SYSTEM_DIR . DIRECTORY_SEPARATOR . "library" . DIRECTORY_SEPARATOR . $library_name . ".php";
            if(file_exists($library_path)){
                require $library_path;
                $library_class = "Chai_" . ucfirst(strtolower($library_name));
                $library = new $library_class;
                if($refer_by != null){
                    $this->refer->{$refer_by} = $library;
                }else{
                    $this->refer->{strtolower($library_name)} = $library;
                }
            }else{
                throw new Exception("Library " . $library_name . " does not exist.");
            }
        }
    }