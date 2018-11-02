<?php
class Jasontool {

    private $a = 5;

    protected $b = 6;

    public function __construct(){
        
        $this->a = rand(1000,9999);

    }

    public function __destruct(){
        
        echo "Oh.... I'm dying...";

    }

    public function tableGenerator($a){

        $table = '<table border="1" width="100%">';
        $table .= '<tr><th>ID</th><th>Title</th><th>Price</th></tr>';
        foreach($a as $v) {
            $table .= '<tr><td>'.$v['id'].'</td><td>'.$v['title'].'</td><td>'.$v['price'].'</td></tr>';
        }
        $table .= '</table>'.$this->a;
        return $table;

    }   
}
?>