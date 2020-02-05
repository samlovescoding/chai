<?php
    
if(!defined("CHAI")) die("Direct script access not allowed.");

/*
 * Chai Application Registry
 * 
 * Register all the required applications here. Application ord-
 * er does matter, i.e. one application might depend upon anoth-
 * er application. This is the case if you are going to be using
 * third-party non routable applications.
 * 
 * 1. Creating application from scratch
 *      An application must have the following folder structure:
 *          {app-name}/{app-name}.php
 *      To use the application, it must be registered here:
 *          register_app("{app-name}");
 * 
 * 2. Creating application from Chai CLI
 *      You can use chai cli to generate ready to use application:
 *          php chai register application {app-name}                        //devs please add this feature
 * 
*/
register_app("blog");
register_app("errors");

/*
 * Chai Configuration Registry
 * 
 * All the site wide configurations like database credentials,
 * base paths and other information can be configured here.
*/

// Route Configuration
register_config("base_route",           "/chai");
register_config("route_error",          to("Errors@route_not_found"));

// Path Configuration
register_config("base_path",            "http://localhost/chai/");
register_config("assets_path",          "http://localhost/chai/assets/");

// Database Configuration
register_config("database_driver",      "mysqli");
register_config("database_hostname",    "localhost");
register_config("database_username",    "root");
register_config("database_password",    "");
register_config("database_name",        "chai_sample");

// Session Configuration
register_config("session_driver",        "default");
register_config("session_prefix",        "app_");
