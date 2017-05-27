<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        }
    }
	
	public function index()
	{
		$this->template->title = 'Master Data Lapangan';
		$this->load->model('sql_mod');
        $data['lapangans'] = $this->sql_mod->msrwhere('lapangan', array(''), 'lapangan_id', 'desc')->result();
        $data['message'] = '';
        $this->template->content->view('lapangan/list', $data);
        $this->template->publish(); 
	}

	public function add()
	{
		$this->template->title = 'Tambah Lapangan';
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
        $this->template->content->view('lapangan/add');
        $this->template->publish(); 
	}

	public function edit($id)
	{
		$this->template->title = 'Edit Lapangan';
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
		$this->load->model('sql_mod');
        $data['lapangan'] = $this->sql_mod->msrwhere('lapangan', array('lapangan_id' => $id), 'lapangan_id', 'desc')->row();
        $this->template->content->view('lapangan/edit', $data);
        $this->template->publish(); 		
	}

	public function view($id)
	{
		$this->template->title = 'View Lapangan';
		$this->load->model('sql_mod');
        $data['lapangan'] = $this->sql_mod->msrwhere('lapangan', array('lapangan_id' => $id), 'lapangan_id', 'desc')->row();
        $this->template->content->view('lapangan/view', $data);
        $this->template->publish(); 
	}

	public function createLapangan() 
	{
		$set = array(
				'kode_lapangan' => $this->input->post('kode_lapangan'),
				'nama_lapangan' => $this->input->post('nama_lapangan'),
				'creation_date' => date('Y-m-d H:i:s'),
				'created_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
				);
		$this->load->model('sql_mod');
		$this->sql_mod->save('lapangan', $set);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diinput.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('lapangan', 'refresh');
	}

	public function updateLapangan($id)
	{
		$set = array(
				'kode_lapangan' => trim($this->input->post('kode_lapangan')),
				'nama_lapangan' => trim($this->input->post('nama_lapangan')),
				'last_update_date' => date('Y-m-d H:i:s'),
				'last_updated_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
				);
		$this->load->model('sql_mod');
		$this->sql_mod->edit('lapangan', $set, 'lapangan_id', $id);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diupdate.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('lapangan', 'refresh');
	}

	public function delete($id)
	{
		$this->load->model('sql_mod');
		$this->sql_mod->delete('lapangan', 'lapangan_id', $id);
		$alert = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil dihapus</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('lapangan', 'refresh');
	}

}
