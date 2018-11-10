<?php
function __autoload($classname) {
    require $classname.".php";
}

$game = new Game();

for($i=0; $i < 10; $i++) {
    $rabbit = new Rabbit("Roger No".$i);
    $game->joinGame($rabbit);
}

$tortoise = new Tortoise("Michael");
$tiger = new Tiger("Tiger");


$game->joinGame($tortoise);
$game->joinGame($tiger);

$game->preparing();
$game->run();
$game->winner();


?>