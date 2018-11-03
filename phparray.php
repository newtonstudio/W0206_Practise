<?php
//PHP Indexed array
$cars = array("Honda", "Toyota", "Mazda");

// $cars = array(
//     0 => "Honda",
//     1 => "Toyota",
//     2 => "Mazda",
// );

//get data
echo $cars[0]; //Honda
echo $cars[1]; //Toyota

//set data
$cars[2] = "BMW";
$cars[] = "Proton"; //Honda Toyota BMW Proton

for($i=0; $i < count($cars); $i++) {
    echo $cars[$i];
}

foreach($cars as $k=>$v) {
    echo $k.". ".$v;
}


//PHP Associative Array
$cars = array(
    "0" => "Honda",
    "2" => "Toyota",
    "4" => "Mazda",
    "5" => "BMW",
);
echo $cars["4"]; //Mazda

$cars["4"] = "Jaguar";

foreach($cars as $k=>$v) {
    echo $v;
}


//Multidimensional Array
$cars = array(
    array('a','b','c'),
    array('d','e','f'),
    array('g','h','i'),
);

$cars = array(
    array("id"=>1,"title"=>"Hello"),
    array("id"=>2,"title"=>"Jason"),
    array("id"=>3,"title"=>"Michael"),
);

?>