<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends MY_Model{

	public $table = 'information';
	public $primary_key = 'i_id';
	public $identifier = 'i_identifier';

	// function get_where($table,$i_id,$identifier){
	// 	$this->db->where($i_id, $identifier);
	// 	$query = $this->db->get($table);
	// 	return $query->result();
	// }

}