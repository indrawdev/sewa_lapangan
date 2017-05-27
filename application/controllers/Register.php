<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	public function index()
	{
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
        $this->template->content->view('vregister');
        $this->template->publish(); 
	}

	public function isRegister()
	{
		$set = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'creation_date' => date('Y-m-d H:i:s'),
				);
		$this->load->model('sql_mod');
		$this->sql_mod->save('user', $set);
		$data['response'] = 'success';
		echo json_encode($data);
	}

}