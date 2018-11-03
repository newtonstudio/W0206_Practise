<?php
//Inheritance Practise
class Animal {
    public function move(){
        echo "move....";
    }
}

class Horse extends Animal {

}

$horse = new Horse();
$horse->move();

?>