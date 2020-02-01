<?php

/*
 *  Chai System Wide Constants
 * 
 *  The public root (public_html or www or htdocs) of your website
 *  must contain index.php, .htaccess and media directories only. 
 *  Chai system and Chai based applicaions must not be hosted on 
 *  public root.
*/
if(!defined("CHAI_SYSTEM_DIR")) define("CHAI_SYSTEM_DIR", "system");
if(!defined("CHAI_APPLICATIONS_DIR")) define("CHAI_APPLICATIONS_DIR", "applications");

if(!defined("CHAI_CLI")) define("CHAI_CLI", false);
if(CHAI_CLI){
    require CHAI_SYSTEM_DIR . DIRECTORY_SEPARATOR . "console" . DIRECTORY_SEPARATOR . "chai.php";
}else{
    require CHAI_SYSTEM_DIR . DIRECTORY_SEPARATOR . "chai.php";
}
