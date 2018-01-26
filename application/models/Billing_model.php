<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing_model extends MY_Model{


	public function insert_customer($data){
		$this->db->insert('cust_placeholder', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : false;
	}

	public function insert_order($data){
		$this->db->insert('orders',$data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : false;
	}

	public function insert_order_detail($data){
		$this->db->insert('order_detail', $data);
	}

	public function update_stock($data){
		$qty = $data['quantity'];
		$productid = $data['productid'];
		$query = $this->db->query("UPDATE products SET product_quantity = product_quantity-$qty WHERE product_id = $productid");
	}
}