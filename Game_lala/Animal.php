<?php 
    class Animal{

        private $name;
        private $speed;

        public function __construct($name){
            $this->name = $name;
        }

        public function greet(){
            echo "Hello I am ".$this->name;
        }

        public function prepare(){
            $this->speed = rand(1,10);
        }

        public function run(){
            echo($this->name . " is running with speed ".$this->speed . "...");
        }

        public function get_speed(){
            return $this->speed;
        }
        

        public function get_name(){
            return $this->name;
        }
    }
?>