<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller{


	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('customer_model');
		$this->load->library('cart');
		$this->load->model('store_model');
	}

	public function register(){
		$data['title'] = 'Sign up to abrietoCart';
		$data['main_content'] = 'public_views/register_view';
		$this->load->model('settings_model');
		$data['header_cat'] = $this->store_model->get_list('categories');
		$data['help_info'] = $this->settings_model->get_where('information','i_identifier','help_info');
		$data['policy'] = $this->settings_model->get_where('information','i_identifier','policy');
		$this->load->view('public_includes/template',$data);
	}

	public function save(){
		$data = array('success' => false, 'messages' => array());

		// SET VALIDATION FOR FORM
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('mobilenum', 'Mobile Number', 'trim|required|min_length[11]|max_length[15]');
		$this->form_validation->set_rules('landlinenum', 'Landline Number', 'trim|min_length[7]|max_length[15]');
		$this->form_validation->set_rules('address1', 'Address 1', 'trim|required|min_length[10]|max_length[200]');
		$this->form_validation->set_rules('address2', 'Address 2', 'trim|min_length[10]|max_length[200]');
		$this->form_validation->set_rules('city', 'City', 'trim|required|min_length[4]|max_length[200]');
		$this->form_validation->set_rules('postalcode', 'Postal Code', 'trim|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('emailaddress', 'Email Address', 'trim|required|min_length[4]|max_length[50]|valid_email|is_unique[customers.c_email_address]');
		$this->form_validation->set_rules('c_username', 'Username', 'trim|required|min_length[4]|max_length[50]|is_unique[customers.c_username]');
		$this->form_validation->set_rules('c_password', 'Password', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|min_length[4]|max_length[50]|matches[c_password]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		// SET CUSTOM MESSAGE FOR EXISTING EMAIL AND USERNAME
		$this->form_validation->set_message('is_unique', 'Sorry, %s is already taken.');
			
		if ($this->form_validation->run()) {
			$items = array(
					'c_first_name' => ucfirst($this->input->post('firstname')),
					'c_last_name' => ucfirst($this->input->post('lastname')),
					'c_mobile_num' => $this->input->post('mobilenum'),
					'c_landline_num' => $this->input->post('landlinenum'),
					'c_address1' => ucfirst($this->input->post('address1')),
					'c_address2' => ucfirst($this->input->post('address2')),
					'c_city' => ucfirst($this->input->post('city')),
					'c_postal_code' => $this->input->post('postalcode'),
					'c_email_address' => $this->input->post('emailaddress'),
					'c_username' => $this->input->post('c_username'),
					'c_password' => md5($this->input->post('c_password'))
				);
			$data['query'] = $this->customer_model->save('customers',$items);
			$data['success'] = true;
		}
		else {
			foreach ($_POST as $key => $value) {
				$data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($data);		
	}

	// LOGIN VALIDATION
	public function validate_login(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == FALSE){
			echo validation_errors();
		}
		else{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$query = $this->customer_model->validate_login($username, $password);

			if($query == 1){
				$data = array(
						'username' => $this->input->post('username'),
						'is_logged_in' => 1
					);
				$this->session->set_userdata($data);
				echo 'YES';
			}
			else{
				echo 'Wrong username/password.';
			}
		}
	}

	// account page
	public function account(){
		$data['title'] = 'My Account';
		$data['header_cat'] = $this->store_model->get_list('categories');
		$uname = $this->session->userdata('username');
		$data['orders'] = $this->store_model->get_where('orders', 'order_customer_username', $uname);
		$data['accountdetails'] = $this->store_model->get_where('customers','c_username', $uname);
		$data['main_content'] = 'public_views/account_view';
		$this->load->view('public_includes/template', $data);
	}

}