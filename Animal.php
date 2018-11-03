<?php
//Inheritance Practice
class Animal {
    public function move(){
        echo "move....";
    }
}

class Horse extends Animal {

}

$horse = new Horse(); //changing class to object so that you can present it/make it to live.
$horse->move();

?>