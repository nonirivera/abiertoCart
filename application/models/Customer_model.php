<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends MY_Model{

	public $table = 'customers';

	public function validate_login($username, $password){
		$this->db->where('c_username',$username);
		$this->db->where('c_password',$password);
		$query = $this->db->get($this->table);
		return $query->num_rows();
	}
}