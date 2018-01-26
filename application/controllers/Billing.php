<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billing extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('store_model');
		$this->load->model('billing_model');
	}

	public function index(){
		$data['main_content'] = 'public_views/billing_view';
		$data['header_cat'] = $this->store_model->get_list('categories');
		$username = $this->session->userdata('username');
		$data['query'] = $this->billing_model->get_where('customers','c_username', $username);
		$this->load->view('public_includes/template', $data);
	}

	public function save_order(){
		$customer = array(
				'email' => $this->input->post('emailaddress'),
				'username' => $this->input->post('username'),
				'address' => $this->input->post('address'),
				'mobilenum' => $this->input->post('mobilenum')
			);
		$cust_id = $this->billing_model->insert_customer($customer);

		$order = array(
				'date' => date('Y-m-d'),
				'customerid' => $cust_id,
				'order_customer_username' => $this->session->userdata('username'),
				'total_amount' => $this->input->post('total_amount'),
				'mode_of_payment' => $this->input->post('modeofpayment')
			);
		$order_id = $this->billing_model->insert_order($order);

		if ($cart = $this->cart->contents()):
			foreach ($cart as $item):
				$order_detail = array(
					'orderid' 		=> $order_id,
					'productid' 	=> $item['id'],
					'quantity' 		=> $item['qty'],
					'price' 		=> $item['price']
				);		

				$cust_id = $this->billing_model->insert_order_detail($order_detail);
				$this->billing_model->update_stock($order_detail);
			endforeach;
		endif;
		$this->cart->destroy();
		redirect('billing/success');		
	}

	public function success(){
		$data['title'] = 'Order Success';
		$data['header_cat'] = $this->store_model->get_list('categories');
		$data['main_content'] = 'public_views/order_success_view';
		$this->load->view('public_includes/template', $data);
	}

}