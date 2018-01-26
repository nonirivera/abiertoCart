<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends MY_Model{

	protected $_au = 'admin_users';

	public function validate_login($username, $password){
		$this->db->where('au_username', $username);
		$this->db->where('au_password', $password);
		$query = $this->db->get($this->_au);
		return $query->num_rows();
	}

	public function get_role($username){
		$checkRole = $this->db->select('au_superadmin')
								->where('au_username', $username)
								->get($this->_au);
		return $checkRole->row();
	}

	public function get_order($table1, $table2, $one, $two, $id, $whereid){
		$this->db->select('*');
		$this->db->from($table1);
		$this->db->join($table2, $one . '=' . $two);
		$this->db->where($whereid, $id);
		$query = $this->db->get();
		return $query->result();
	}

}