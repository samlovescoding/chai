<?php

    $this->load->library("migrations");

    class create_user_type_table extends Chai_Migrations{
        public function up(){

            $this->forge->add_field("id", array(
                "type" => "INT",
                "constraint" => 6
            ));

            $this->forge->add_field("name", array(
                "type" => "VARCHAR",
                "constraint" => 20
            ));

            $this->forge->add_field("username", array(
                "type" => "VARCHAR",
                "constraint" => 20
            ));
            $this->forge->add_field("password", array(
                "type" => "VARCHAR",
                "constraint" => 256
            ));
            $this->forge->add_field("status", array(
                "type" => "TEXT"
            ));
            $this->forge->add_key("id", true);
            $this->forge->add_key("username");

            $this->forge->add_table("users");
        }
        public function down(){
            $this->forge->remove_table("users");
        }
    }

    register_current_migration("blog/current_migration");

    register_migration("create_user_table");

    migrate(1);