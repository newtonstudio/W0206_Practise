<?php
class Animal {

    private $name;
    private $speed;

    public function __construct($name){
        $this->name = $name;
    }

    public function greet(){
        echo "Hello! I am ".$this->name.'<br/>';
    }

    public function prepare(){
        $this->speed = rand(1,10);
    }

    public function run(){
        echo "(".$this->name." is running with speed: ".$this->speed.".. )";
    }

    public function getSpeed(){
        return $this->speed;
    }

    public function getName(){
        return $this->name;
    }

}
?>