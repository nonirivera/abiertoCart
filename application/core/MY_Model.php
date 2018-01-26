<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model{

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

// **************************************** SEARCH / LIST / DISPLAY QUERIES *******************************************
	public function get_list($table = NULL, $table2 = NULL, $table3= NULL, $prim1 = NULL, $prim2 = NULL, $prim3 = NULL, $prim4 = NULL){
		$this->db->select('*');
		$this->db->from($table);

		// run if table 2 is specified
		if($table2!=NULL):
			$this->db->join($table2, $prim1 .'=' . $prim2);
			// run if table 3 is specified
			if($table3!=NULL):
				$this->db->join($table3, $prim3 . '=' . $prim4);
			endif;
		endif;
		$query = $this->db->get();
		return $query->result();
	}

	public function get_where($table = NULL, $key, $id){
		$this->db->where($key, $id);
		$query = $this->db->get($table);
		return $query->result();
	}

	public function get_orderby($table = NULL, $field, $orderby){
		$this->db->order_by($field, $orderby);
		$query = $this->db->get($table);
		return $query->result();
	}

	// return specific row
	public function get_row($table, $identifier, $id){
		$this->db->where($identifier, $id);
		$query = $this->db->get($table);
		return $settings_content = $query->row();
	}

	// total number of rows
	public function get_num_rows($table){
		$query = $this->db->get($table);
		return $query->num_rows();
	}	


// **************************************** DATA MANIPULATION *******************************************
	public function save($table, $items){
		$this->db->insert($table, $items);
	}

	public function update($table, $data, $iden, $id){
		$this->db->where($iden, $id);
		$this->db->update($table, $data);
	}

	public function delete_item($table, $iden, $id){
		$this->db->where($iden, $id);
		$query = $this->db->delete($table);
	}
}