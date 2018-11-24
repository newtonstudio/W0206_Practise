<?php
class MY_Model extends CI_Model {

    public $table_name = "table_name";

    public function __construct(){
        $this->load->database();
    }

    public function fetch($limit, $start, $where=array()) {

        //$start = ($page - 1) * $limit;

        //page = 1, start = (1-1)*10 = 0
        //page = 2, start = (2-1)*10 = 10
        //page = 3, start = (3-1)*10 = 20

        $this->db->select("*");
        $this->db->limit($limit, $start);
        $this->db->where($where);
        $query = $this->db->get($this->table_name);

        //$query->row_array() //suits one data
        //$query->result_array() //suits many data
        return $query->result_array();

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

    public function update($where=array(), $update_array=array()){

        $this->db->where($where);
        $this->db->update($this->table_name, $update_array);        

    }

}
?>