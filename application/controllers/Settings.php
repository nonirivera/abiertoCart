<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('settings_model');
		$this->load->library('form_validation');
		if(!$this->session->userdata('is_logged_in_admin')){
			redirect('admin_login/');
		}
	}

	public function about(){
		$data['title'] = 'abrietoCart About Page';
		$data['header'] = 'Edit About Page';
		$data['query'] = $this->settings_model->get_where('information','i_identifier','about');
		$data['main_content'] = 'admin_views/page_cms_view';
		$this->load->view('admin_includes/template', $data);
	}

	public function policy(){
		$data['title'] = 'abrietoCart Privacy Policy';
		$data['header'] = 'Edit Privacy Policy';
		$data['query'] = $this->settings_model->get_where('information','i_identifier','policy');
		$data['main_content'] = 'admin_views/page_cms_view';
		$this->load->view('admin_includes/template', $data);
	}

	public function help_info(){
		$data['title'] = 'abrietoCart Privacy Policy';
		$data['header'] = 'Edit Privacy Policy';
		$data['query'] = $this->settings_model->get_where('information','i_identifier','help_info');
		$data['main_content'] = 'admin_views/page_cms_view';
		$this->load->view('admin_includes/template', $data);
	}


	public function cms_update(){
		$data = array('success' => false, 'messages' => array());

		$this->form_validation->set_rules('i_title', 'Title', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('i_description', 'Description / Content', 'required|min_length[4]');
		$this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

		if($this->form_validation->run()){
			$items = array(
					'i_title' => ucfirst($this->input->post('i_title')),
					'i_description' => $this->input->post('i_description')
				);
			$data['query'] = $this->settings_model->update('information', $items, 'i_id', $this->input->post('i_id'));
			$data['success'] = true;
		}
		else{
			foreach($_POST as $key => $value){
				$data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($data);
	}		
}