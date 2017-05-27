<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sql_mod extends CI_Model {

	public function msr($table, $field, $sb) {
        $this->db->order_by($field, $sb);
        return $this->db->get($table);
	}

    public function msrgp($table, $field, $sb, $gb) {
        $this->db->group_by($gb); 
        $this->db->order_by($field, $sb);
        return $this->db->get($table);
    }

    public function msrwhere($table, $com, $field, $sb) {
        $this->db->order_by($field, $sb);
        return $this->db->get_where($table, $com);
    }

    public function msrseek($keyword,$table,$field){
            $this->db->select('*')->from($table);
            $this->db->like($field,strtoupper($keyword),'after');
            $query = $this->db->get();
            return $query;
    }

    public function msrwhereJoin2Table($table1,$table2,$com,$com2,$id,$field,$sb,$select){
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->order_by($field,$sb);
        $this->db->join($table2, $com);
        $this->db->where($com2, $id);
        return $this->db->get();
    }
    
    public function msrwhereJoin3Table($table1,$table2,$table3,$com1,$com2,$field,$field2,$sb,$select,$com3,$id){
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, $com1);
        $this->db->join($table3, $com2);
        $this->db->order_by($field,$sb);
        $this->db->order_by($field2,$sb);
        $this->db->where($com3, $id);
        return $this->db->get();
    }
    

    public function lists($table, $number, $field, $offset){
        $this->db->order_by($field, "desc");
        $query = $this->db->get($table, $number, $offset);
        return $query;    
    }

    public function sum($table) {
        return $this->db->get($table)->num_rows();
    }

    public function save($table, $set) {
        $this->db->insert($table, $set);
        return $this->db->insert_id();
    }
    
    public function edit($table, $set, $field, $id) {
        $this->db->where($field, $id);
        $this->db->update($table, $set);
    }
    
    public function delete($table, $field, $id) {
        $this->db->delete($table, array($field => $id));
    }

    public function msrquery($sql) {
        $query = $this->db->query($sql);
        return $query;
    }

}