<?php 
    require "Jasontool.php";

    $a = array(
        0 => array("id"=>1,"title"=>"iPhone","price"=>3600),
        1 => array("id"=>2,"title"=>"Samsung","price"=>2500),
        2 => array("id"=>3,"title"=>"HTC","price"=>1566),
    );

    $test = new Jasontool();
    echo $test->tableGenerator($a);
?>