<?php
require "Conteohtool.php"; //same as include.php
$a = array(
	0 => array("id"=>1,"title"=>"iPhone","price"=>3600),
	1 => array("id"=>2,"title"=>"Samsung","price"=>2500),
	2 => array("id"=>3,"title"=>"HTC","price"=>1566),
);
$tool = new Conteohtool(); //instantiate Jason tool from class to object
echo $tool->tableGenerator($a);

?>