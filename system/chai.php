<?php

    // Load Chai Library
    require "http/index.php";

    // Load Application Level Files
    require "config.php";

    if(CHAI_CLI == false){
        // Perform Routing
        require "router.php";
    }
    