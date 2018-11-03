<?php
class Jasontool {
    public function tableGenerator($table){

        $table = '<table border="1" width="100%">';
        $table .= '<tr><th>ID</th><th>Title</th><th>Price</th></tr>';
        foreach($a as $v) {
            $table .= '<tr><td>'.$v['id'].'</td><td>'.$v['title'].'</td><td>'.$v['price'].'</td></tr>';
        }
        $table .= '</table>';
        return $table;

    }   
}
?>