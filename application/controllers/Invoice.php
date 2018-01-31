<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('customer_model');
		$this->load->library('cart');
		$this->load->model('store_model');
		$this->load->model('admin_model');
	}

	public function invoice($id){
		$data['title'] = 'Order Invoice';
		$data['header_cat'] = $this->store_model->get_list('categories');
		$data['order_invoice'] = $this->store_model->get_where('orders', 'serialnum', $id);
		$data['main_content'] = 'public_views/invoice_view';
		$this->load->view('public_includes/template', $data);
	}

	public function view($id){
		//$data['orders'] = $this->store_model->get_list('order_detail', 'orderid', $id);
		$data['accountdetails'] = $this->store_model->get_where('customers','c_username', $this->session->userdata('username'));
		$data['order_invoice'] = $this->store_model->get_where('orders', 'serialnum', $id);

		//get products
		$data['prods'] = $this->admin_model->get_order('order_detail', 'products', 'order_detail.productid', 'products.product_id', $id, 'order_detail.orderid');
		$this->load->view('public_views/invoice_view', $data);
		//$this->load->view('welcome_message');
		/* convert to pdf */
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("invoice.pdf");
	}
}