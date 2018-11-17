<?php
class MY_Model extends CI_Model {

    public $table_name = "table_name";

    public function __construct(){
        $this->load->database();
    }

    public function get_where($where=array()) {

        //SELECT * FROM news [WHERE....]
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        //$query->row_array() //suits one data
        //$query->result_array() //suits many data
        return $query->result_array();

    }

    public function getOne($where=array()) {
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        //$query->row_array() //suits one data
        //$query->result_array() //suits many data
        return $query->row_array();

    }

    public function insert($insert_array=array()){

        $this->db->insert($this->table_name, $insert_array);
        return $this->db->insert_id();

    }

}
?>