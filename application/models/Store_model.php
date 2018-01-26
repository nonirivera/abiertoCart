<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store_model extends MY_Model{

	public $table = 'products';
	public $primary_key = 'product_id';

	public function get_product($id = NULL, $table = NULL, $table2 = NULL, $table3= NULL, $prim1 = NULL, $prim2 = NULL, $prim3 = NULL, $prim4 = NULL){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('product_id', $id);

		$this->db->join($table2, $prim1 .'=' . $prim2);
		$this->db->join($table3, $prim3 . '=' . $prim4);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_search($match){
		$this->db->like('product_name', $match);
		$this->db->or_like('product_code', $match);
		$this->db->or_like('product_description', $match);
		$query = $this->db->get('products');
		if($query->num_rows() > 0):
			return $query->result();
		else:
			return $query->num_rows();
		endif;
	}

	public function getLimited($num){
		$this->db->limit($num);
		$query = $this->db->get('products');
		return $query->result();
	}

}	