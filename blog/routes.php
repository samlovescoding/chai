<?php

    register_route("/", to("Blog@index"))->exact();
    register_route("/article", to("Blog@index"));
