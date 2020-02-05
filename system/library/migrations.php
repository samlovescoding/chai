<?php

    global $_MIGRATIONS;
    global $_CURRENT_MIGRATION;

    if(!class_exists("Chai_Forge")) require "forge.php";

    class Chai_Migrations{
        public function __construct() {
            $this->forge = new Chai_Forge();
        }
    }

    function register_current_migration($migration){
        global $_CURRENT_MIGRATION;
        $_CURRENT_MIGRATION = $migration;
    }

    function register_migration($migration){
        global $_MIGRATIONS;
        $_MIGRATIONS[] = $migration;
    }

    function migrate($to_version = null){
        global $_MIGRATIONS;
        global $_CURRENT_MIGRATION;
        if($to_version === null){
            $to_version = count($_MIGRATIONS);
        }
        if(file_exists($_CURRENT_MIGRATION)){
            $current_migration = intval(file_get_contents($_CURRENT_MIGRATION));
        }else{
            $current_migration = 0;
        }
        if($current_migration < $to_version){
            for ($i = $current_migration; $i < $to_version; $i++) { 
                $migration = new $_MIGRATIONS[$i];
                $migration->up();
                $migration->forge->apply();
            }
        }
        if($current_migration > $to_version){
            for ($i=$current_migration; $i > $to_version; $i--) { 
                $migration = new $_MIGRATIONS[$i - 1];
                $migration->down();
                $migration->forge->apply();
            }
        }
        file_put_contents($_CURRENT_MIGRATION, $to_version);
    }