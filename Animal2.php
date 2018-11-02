<?php 
    class Animal2{
        public function move(){
            echo "move...";
        }
    }

    class Sheep  extends Animal2{
        public function yell(){
            echo "mie mie....";
        }
    }

    $s = new Sheep();
    $s->move();
    $s->yell();
?>