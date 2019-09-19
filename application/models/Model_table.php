<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_table extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function Save_Data($table, $data) {
        return $this->db->insert($table, $data);
    }

    public function Check_Data($table, $sel, $rel) {
        if ($rel) {
            $this->db->where($rel);
        }
        return $this->db->get($table, $sel, $rel)->result();
    }

    public function View_Data($table, $oby, $sel) {
        return $this->db->order_by($oby, $sel)->get($table)->result();
    }

    public function getSingleData($table, $where, $limit) {
        return $this->db->order_by("customer_id", "desc")->get_where($table, $where, $limit)->result();
    }

    public function getSingle($table, $where){
        return $this->db->get_where($table, $where, 1)->row_array();
    }

	public function getSingleDate($table, $where){
        return $this->db->get_where($table, $where, 1)->result();
    }
    
    public function getData($table, $oby, $order, $limit){
        return $this->db->order_by($oby, $order)->get($table, $limit)->result();
    }

	public function getNextRow($table, $oby, $order){
        return $this->db->order_by($oby, $order)->get($table)->next_row();
    }

    public function ViewProduct() {
        $this->db->select("p.*, c.category_name c_name, a.name a_name");
        $this->db->from("product p");
        $this->db->join("category c", "p.category_id=c.category_id");
        $this->db->join("admin a", "p.create_by=a.admin_id");
        return $this->db->get()->result();
    }

    public function update_product($id) {
        $this->db->where($id);
        $this->db->select("p.*", "c.category_name c_name");
        $this->db->from("product p");
        $this->db->join("category c", "p.category_id=c.category_id");
        return $this->db->get()->result();
    }

    public function updateData($table, $col, $val, $dtu){
        $this->db->where($col, $val);
        return $this->db->update($table, $dtu);
    }

    public function deleteData($table, $where) {
        return $this->db->delete($table, $where, 1);
    }

}

?>