<?php
Interface IHero {
    public function walk();
    public function showSuperPower();
} 
Interface ILaugh {
    public function laughing();
}


class PeanutMan implements IHero, ILaugh {
    public function walk(){
        echo "(walking...)";
    }

    public function showSuperPower(){
        echo "(peanut everywhere....)";
    }

    public function laughing() {
        echo "(hahaha...)";
    }
}

class IronMan implements IHero {
    public function walk(){
        echo "(dum dum dum...)";
    }

    public function showSuperPower(){
        echo "(show flash power....)";
    }
}

$adam = new PeanutMan();
$adam->walk();
$adam->showSuperPower();

$spark = new IronMan();
$spark->walk();
$spark->showSuperPower();

?>