<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        if ($this->session->userdata('login') == TRUE) {
            redirect('lapangan');
        }
    }

	public function index()
	{
		$this->template->title = 'Login Sistem Sewa Lapangan';
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
        $this->template->content->view('vlogin');
        $this->template->publish(); 
	}

	public function isLogin()
	{
		$set = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))
				);
		$this->load->model('sql_mod');
		$count = $this->sql_mod->msrwhere('admin', $set, 'admin_id', 'desc')->num_rows();
		$check = $this->sql_mod->msrwhere('admin', $set, 'admin_id', 'desc')->row();
		if ($count < 1) {
			$data['response'] = 'failed';
			$data['message']  = 'No have account, registration please!';
			echo json_encode($data);
		} else if ($count > 1) {
			$data['response'] = 'failed';
			$data['message']  = 'Multiple account';
			echo json_encode($data);
		} else {
			$this->session->set_userdata('login', TRUE);
			$this->session->set_userdata('admin_id', $this->encrypt->encode($check->admin_id));
			$set_admin = array(
							'ip_address' => $this->input->ip_address(),
							'hostname' => gethostname(),
							'last_login_date' => date('Y-m-d H:i:s')
						);
			$this->sql_mod->edit('admin', $set_admin, 'admin_id', $check->admin_id);
			$data['response'] = 'success';
			$data['message'] = 'Loading, please wait...';
			$data['redirect'] = 'lapangan';
			echo json_encode($data);
		}
	}

}