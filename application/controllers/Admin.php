<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        }
    }

    public function index()
    {
    	$this->load->model('sql_mod');
    	$data['admins'] = $this->sql_mod->msrwhere('admin', array(), 'admin_id', 'desc')->result();
        $this->template->content->view('admin/list');
        $this->template->publish(); 
    }

    public function add()
    {
        $this->template->content->view('admin/list');
        $this->template->publish(); 
    }

    public function edit($id)
    {
    	$this->load->model('sql_mod');
    	$data['admin'] = $this->sql_mod->msrwhere('admin', array(), 'admin_id', 'desc')->row();
        $this->template->content->view('admin/edit', $data);
        $this->template->publish(); 
    }

    public function view($id)
    {
    	$this->load->model('sql_mod');
        $data['admin'] = $this->sql_mod->msrwhere('admin', array(), 'admin_id', 'desc')->row();
        $this->template->content->view('admin/view', $data);
        $this->template->publish(); 
    }

    public function createAdmin()
    {
    	$set = array(
    			'email' => $this->input->post('email'),
    			'password' => $this->input->post('password')
    			);
    	$this->load->model('sql_mod');
    	$this->sql_mod->save('admin', $set);
        $alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diinput.</div>';
        $this->session->set_flashdata('message', $alert);
        redirect('admin', 'refresh');
    }

    public function updateAdmin()
    {
        $id = $this->uri->segment(3);
    	$set = array(
    			'email' => $this->input->post('email'),
    			'password' => $this->input->post('password')
    			);
    	$this->load->model('sql_mod');
    	$this->sql_mod->edit('admin', $set, 'admin_id', $id);
        $alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diupdate.</div>';
        $this->session->set_flashdata('message', $alert);
        redirect('admin', 'refresh');
    }

    public function delete($id)
    {
        $this->load->model('sql_mod');
        $this->sql_mod->delete('admin', 'admin_id', $id);
        $alert = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil dihapus</div>';
        $this->session->set_flashdata('message', $alert);
        redirect('admin', 'refresh');
    }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}