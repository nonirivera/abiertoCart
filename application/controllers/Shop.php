<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller
{
	protected $_p = 'products';
	protected $_ct = 'categories';
	protected $_br = 'brands';

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('cart');
		$this->load->model('store_model');
	}

	public function index(){
		$data['title'] = 'Welcome to abiertocart';
		$data['main_content'] = 'public_views/shop_index';
		$data['header_cat'] = $this->store_model->get_list('categories');
		$data['query'] = $this->store_model->getLimited(4); // display latest 4 products in index page
		$this->load->view('public_includes/template',$data);
	}

	public function product($id){
		$data['title'] = 'View Products';
		$data['header_cat'] = $this->store_model->get_list('categories');
		$data['query'] = $this->store_model->get_product($id,  
			$this->_p, $this->_ct, $this->_br, 
			$this->_p.'.category_id', $this->_ct.'.category_id', 
			$this->_p.'.brand_id', $this->_br.'.brand_id');
		$data['categories'] = $this->store_model->get_list($this->_ct);
		$data['brands'] = $this->store_model->get_list($this->_br);
		$data['reviews'] = $this->store_model->get_where('product_review', 'product_id', $id);

		$data['main_content'] = 'public_views/product_view';
		$this->load->view('public_includes/template',$data);
	}

	public function category($id){
		$data['header_cat'] = $this->store_model->get_list('categories');
		$data['title'] = 'View by Category';
		$data['main_content'] = 'public_views/category_view';
		$data['query'] = $this->store_model->get_where('products','category_id', $id);
		$this->load->view('public_includes/template',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Shop/');
	}

	public function about(){
		$data['header_cat'] = $this->store_model->get_list('categories');
		$this->load->model('settings_model');
		$data['title'] = 'About';
		$data['about'] = $this->settings_model->get_where('information','i_identifier','about');
		$data['main_content'] = 'public_views/about_view';
		$this->load->view('public_includes/template', $data);
	}

	public function privacy(){
		$data['header_cat'] = $this->store_model->get_list('categories');
		$this->load->model('settings_model');
		$data['title'] = 'About';
		$data['about'] = $this->settings_model->get_where('information','i_identifier','policy');
		$data['main_content'] = 'public_views/about_view';
		$this->load->view('public_includes/template', $data);
	}

	public function contact(){
		$data['header_cat'] = $this->store_model->get_list('categories');
		$data['title'] = 'Contact Us';
		$data['main_content'] = 'public_views/contact_view';
		$this->load->view('public_includes/template', $data);
	}

	public function contactsubmit(){
		// load admin model for contact submit
		$this->load->model('admin_model');
		$data = array('success' => false, 'messages' => array());

		// VALIDATION
		$this->form_validation->set_rules('fullname', 'Your Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('emailaddress', 'Email Address', 'trim|required|min_length[6]|valid_email');
		$this->form_validation->set_rules('formmessage', 'Your Message', 'trim|required|min_length[4]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if ($this->form_validation->run()) {
			$items = array(
					'cm_name' => ucfirst($this->input->post('fullname')),
					'cm_email_address' => $this->input->post('emailaddress'),
					'cm_message' => $this->input->post('formmessage')
				);
			$data['query'] = $this->admin_model->save('contact_messages', $items);
			$data['success'] = true;
		}
		else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($data);	
	}

	public function search(){
		$data['header_cat'] = $this->store_model->get_list('categories');
		$match = $this->input->post('search');
		$data['query'] = $this->store_model->get_search($match);
		$data['main_content'] = 'public_views/results_view';
		$this->load->view('public_includes/template',$data);
	}

	public function product_comment_submit(){
		$this->form_validation->set_rules('product_comment', 'Product comment', 'trim|required');

		if($this->form_validation->run() == FALSE){
			echo validation_errors();
		}
		else{
			$items = array(
				'product_id' => $this->input->post('product_id'),
				'pr_content' => $this->input->post('product_comment'),
				'pr_username' => $this->input->post('pr_username')
			);

			$this->store_model->save('product_review',$items);
			echo 'COMMENTSUBMIT';
		}
	}

}