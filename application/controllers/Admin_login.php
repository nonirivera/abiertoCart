<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library('form_validation');
	}

	public function index(){
		$data['title'] = 'Login to abrietoCart cPanel';
		$this->load->view('admin_views/login_view', $data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin_login/');
	}

	public function validate_login(){

		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Username', 'trim|required|min_length[4]');


		if($this->form_validation->run() == FALSE){
			echo validation_errors();
		}
		else{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$query = $this->admin_model->validate_login($username, $password);
			$checkRole = $this->admin_model->get_role($username);
			$role =  $checkRole->au_superadmin; 

			if($query == 1){

				if($role == 1){
					$data = array(
							'username' => $this->input->post('username'),
							'is_logged_in_admin' => 1,
							'super_admin' => 1
						);
				}
				else{
					$data = array(
							'username' => $this->input->post('username'),
							'is_logged_in_admin' => 1,
							'super_admin' => 0
						);	
				}
				$this->session->set_userdata($data);
				echo 'YES';
			}
			else{
				echo 'NO';
			}
		}

	}

}