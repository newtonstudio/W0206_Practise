<?php

class Person {
    private $name = "Jason";

    public function getName(){
        return $this->name;
    }
}

class Engineer extends Person{

}

$p = new Engineer();


echo $p->getName();

?>