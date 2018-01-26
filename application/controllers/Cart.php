<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->library('session');
		$this->load->model('store_model');
		$this->load->model('cart_model');
	}

	public function index(){
		$this->load->helper('form');
		$data['header_cat'] = $this->store_model->get_list('categories');
		//$data['query'] = $this->store_model->get_list('products');
		$data['main_content'] = 'public_views/cart_view';
		$this->load->view('public_includes/template', $data);
	}

	public function add(){

		$insert_room = array(
				'id' => $this->input->post('product_id'),
				'qty' => $this->input->post('product_quantity'),
				'price' => $this->input->post('product_price'),
				'name' => $this->input->post('product_name'),
			);


		$this->cart->insert($insert_room);
		redirect($_SERVER['HTTP_REFERER']);
	}

	function update_cart(){
 		foreach($_POST['cart'] as $id => $cart)
		{			
			$price = $cart['price'];
			$amount = $price * $cart['qty'];
			
			$this->cart_model->update_cart($cart['rowid'], $cart['qty'], $price, $amount);
		}
		
		redirect('cart');
	}

	public function remove($rowid){
		if ($rowid=="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);

			$this->cart->update($data);
		}
		
		redirect('cart/');

	}
}