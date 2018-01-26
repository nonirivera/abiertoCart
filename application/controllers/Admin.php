<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

	private $su;

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('settings_model');
		$this->load->model('store_model');
		$this->load->library('form_validation');
		$this->su = $this->session->userdata('super_admin');
		if(!$this->session->userdata('is_logged_in_admin')){
			redirect('admin_login/');
		}
	}

	public function index(){
		$data['title'] = 'abrietoCart Dashboard';
		$data['main_content'] = 'admin_views/index_view';
		$data['customers'] = $this->admin_model->get_num_rows('customers');
		$data['products'] = $this->admin_model->get_num_rows('products');
		$data['su'] = $this->su;
		$this->load->view('admin_includes/template', $data);
	}


	// **************************** CUSTOMERS ROUTES
	public function customers(){
		$data['title'] = 'abrietoCart Customers List';
		$data['header'] = 'List of Customers';
		$data['main_content'] = 'admin_views/customers_view';
		$data['query'] = $this->admin_model->get_list('customers');
		$this->load->view('admin_includes/template', $data);
	}


	// **************************** CATEGORIES ROUTES
	public function categories(){
		$data['su'] = $this->su;
		$data['title'] = 'Categories List';
		$data['query'] = $this->store_model->get_list('categories');
		$data['main_content'] = 'admin_views/categories_view';
		$this->load->view('admin_includes/template', $data);
	}

	public function category($id){
		$data['su'] = $this->su;
		$data['query'] = $this->admin_model->get_where('categories', 'category_id', $id);
		$data['main_content'] = 'admin_views/specific_category_view';
		$data['legend'] = 'View/ Category';
		$this->load->view('admin_includes/template', $data);
	}

	public function add_category(){
		$data['title'] = 'Add New Category';
		$data['main_content'] = 'admin_views/new_category_view';
		$data['legend'] = 'Add New Category';
		$this->load->view('admin_includes/template', $data);
	}

	public function save_category(){
		$data = array('success' => false, 'messages' => array());

		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('category_description', 'Category Description', 'trim');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
			$items = array(
					'category_name' => $this->input->post('category_name'),
					'category_description' => $this->input->post('category_description')
				);
			$data['query'] = $this->store_model->save('categories', $items);
			$data['success'] = true;
		}
		else{
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($data);
	}

	public function update_category(){
		$data = array('success' => false, 'messages' => array());

		$this->form_validation->set_rules('category_name', 'Category Name', 'trim|required|min_length[4]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
			$items = array(
						'category_name' => $this->input->post('category_name'),
						'category_description' => $this->input->post('category_description'),
				);
			$data['query'] = $this->admin_model->update('categories', $items, 'category_id', $this->input->post('category_id'));
			$data['success'] = true;
		}
		else{
			foreach($_POST as $key => $value){
				$data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($data);
	}	

	// NO CATEGORY DELETE YET, TRIGGERS ARE A *****
	// public function delete_category($id){
	// 	$this->admin_model->delete_item('categories','category_id', $id);
	// 	redirect('admin/categories');
	// }


	// **************************** PRODUCTS ROUTES
	// list
	public function products(){
		$data['title'] = 'Products List';
		$data['query'] = $this->store_model->get_list('products', 'categories', 'brands', 
		 	'products.category_id', 'categories.category_id', 
		 	'products.brand_id', 'brands.brand_id');
		$data['crit_level'] = $this->settings_model->get_row('information','i_identifier', 'cl'); // identifier for critical level
		$data['main_content'] = 'admin_views/products_view';
		$data['su'] = $this->su;
		$this->load->view('admin_includes/template', $data);
	}

	// specific
	public function product($id){
		$data['query'] = $this->store_model->get_product($id,  
			'products', 'categories', 'brands', 
			'products.category_id', 'categories.category_id', 
			'products.brand_id', 'brands.brand_id');
		$data['categories'] = $this->store_model->get_list('categories');
		$data['brands'] = $this->store_model->get_list('brands');
		$data['main_content'] = 'admin_views/specific_product_view';
		$data['su'] = $this->su;
		$this->load->view('admin_includes/template', $data);
	}

	// new
	public function add_product(){
		$data['legend'] = 'Add New Product';
		$data['categories'] = $this->store_model->get_list('categories');
		$data['brands'] = $this->store_model->get_list('brands');
		$data['main_content'] = 'admin_views/new_product_view';
		$this->load->view('admin_includes/template', $data);
	}

	public function save_product(){

		$data = array('success' => false, 'messages' => array());

		$this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('product_description', 'Product Description', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('product_price', 'Product Price', 'trim|required|decimal');
		$this->form_validation->set_rules('product_quantity', 'Product Quantity', 'trim|required|numeric');
		$this->form_validation->set_rules('product_code', 'Product Code', 'trim|required|min_length[4]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
		

		if($this->form_validation->run()){
			$url = $this->do_upload();
			

			$items = array(
					'product_name' => $this->input->post('product_name'),
					'product_description' => $this->input->post('product_description'),
					'category_id' => $this->input->post('product_category'),
					'product_price' => $this->input->post('product_price'),
					'product_quantity' => $this->input->post('product_quantity'),
					'product_code' => $this->input->post('product_code'),
					'brand_id' => $this->input->post('product_brand'),
					'product_image' => $url
				);
			$data['query'] = $this->store_model->save('products', $items);
			$data['success'] = true;
		}
		else{
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($data);
	}

	public function delete_product($id){
		$this->admin_model->delete_item('products','product_id', $id);
		redirect('admin/products');
	}

	public function do_upload(){
		$type = explode('.', $_FILES["userfile"]["name"]);
		$type = $type[count($type)-1];
		$url = "./assets/images/products/".uniqid(rand()).'.'.$type;

		if(in_array($type, array("jpg","jpeg","png")))
			if(is_uploaded_file($_FILES["userfile"]["tmp_name"]))
				if(move_uploaded_file($_FILES["userfile"]["tmp_name"], $url))
					return $url;
		return $url;
	}


	// **************************** MESSAGES ROUTES
	public function messages(){
		$data['su'] = $this->su;
		$data['main_content'] = 'admin_views/messages_view';
		$data['header'] = 'Contact Form Messages';
		$data['query'] = $this->admin_model->get_list('contact_messages');
		$this->load->view('admin_includes/template', $data);
	}

	public function view_message($id){
		$data['query'] = $this->admin_model->get_where('contact_messages', 'cm_id', $id);
		$data['main_content'] = 'admin_views/specific_message_view';
		$this->load->view('admin_includes/template', $data);
	}

	public function update_form_message(){
		$items = array('has_read' => $this->input->post('cm_has_read'));
		$data['query'] = $this->admin_model->update('contact_messages', $items, 'cm_id', $this->input->post('cm_id'));
		redirect('admin/messages');
	}

	public function delete_message($id){
		$this->admin_model->delete_item('contact_messages','cm_id', $id);
		redirect('admin/messages');
	}	


	// **************************** ORDERS ROUTES
	public function orders(){
		$data['su'] = $this->su;
		$data['main_content'] = 'admin_views/orders_view';
		$data['header'] = 'List of Orders';
		$data['query'] = $this->admin_model->get_orderby('orders', 'serialnum', 'DESC');
		$this->load->view('admin_includes/template', $data);
	}

	public function order($id){
		$data['su'] = $this->su;
		// custom query for orders
		$data['query'] = $this->admin_model->get_order('orders', 'cust_placeholder', 'orders.customerid', 'cust_placeholder.serial', $id, 'orders.serialnum');
		// get products from orders
		$data['prods'] = $this->admin_model->get_order('order_detail', 'products', 'order_detail.productid', 'products.product_id', $id, 'order_detail.orderid');
		$data['main_content'] = 'admin_views/specific_order_view';
		$this->load->view('admin_includes/template', $data);
	}

}