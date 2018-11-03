<?php
$a = array(
	0 => array("id"=>1,"title"=>"iPhone","price"=>3600),
	1 => array("id"=>2,"title"=>"Samsung","price"=>2500),
	2 => array("id"=>3,"title"=>"HTC","price"=>1566),
);

$table = '<table border="1" width="100%">';
$table .= '<tr><th>ID</th><th>Title</th><th>Price</th></tr>';
foreach($a as $v) {
    $table .= '<tr><td>'.$v['id'].'</td><td>'.$v['title'].'</td><td>'.$v['price'].'</td></tr>';
}
$table .= '</table>';

echo $table;
?>