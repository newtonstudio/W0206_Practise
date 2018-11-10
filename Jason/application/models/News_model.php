<?php
class News_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_where($where=array()) {

        //SELECT * FROM news [WHERE....]
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get("news");

        //$query->row_array() //suits one data
        //$query->result_array() //suits many data
        return $query->result_array();

    }

    public function getOne($where=array()) {
        $this->db->select("*");
        $this->db->where($where);
        $query = $this->db->get("news");

        //$query->row_array() //suits one data
        //$query->result_array() //suits many data
        return $query->row_array();

    }


}
?>