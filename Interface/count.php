<?php

$a = array("a", "b", "c");

//$b = "asdasdd";

Interface IHero {
    public function walk();
    public function showSuperPower();
} 

class specialBall implements Countable {
    private $collection = array();
    public function count(){        
        
        $even = 0;
        for($i=0; $i < count($this->collection); $i++) {
            if($this->collection[$i]%2==0) {
                $even++;
            }
        }
        return $even;

    }
    public function accept($a){
        $this->collection[] = $a;
    }
}

$b = new specialBall();
$b->accept(2);
$b->accept(5);
$b->accept(7);
$b->accept(19);

class ABC extends specialBall implements IHero {
    public function count(){
        return 9;
    }
    public function walk(){
        echo "walk wlk...";
    }

    public function showSuperPower(){
        echo "YEAH.....";
    }
}

$a = new ABC();

echo count($a);

?>