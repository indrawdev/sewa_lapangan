<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$this->template->title = 'Master Data Pelanggan';
		$this->load->model('sql_mod');
        $data['pelanggans'] = $this->sql_mod->msrwhere('pelanggan', array(), 'pelanggan_id', 'desc')->result();
        $this->template->content->view('pelanggan/list', $data);
        $this->template->publish(); 
	}

	public function add()
	{
		$this->template->title = 'Tambah Pelanggan';
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
        $this->template->content->view('pelanggan/add');
        $this->template->publish(); 
	}

	public function edit($id)
	{
		$this->template->title = 'Edit Pelanggan';
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
		$this->load->model('sql_mod');
        $data['pelanggan'] = $this->sql_mod->msrwhere('pelanggan', array('pelanggan_id' => $id), 'pelanggan_id', 'desc')->row();
        $this->template->content->view('pelanggan/edit', $data);
        $this->template->publish(); 
	}

	public function view($id)
	{
		$this->template->title = 'View Pelanggan';
		$this->load->model('sql_mod');
        $data['pelanggan'] = $this->sql_mod->msrwhere('pelanggan', array('pelanggan_id' => $id), 'pelanggan_id', 'desc')->row();
        $this->template->content->view('pelanggan/view', $data);
        $this->template->publish(); 
	}

	public function createPelanggan()
	{
		$set = array(
				'kode_pelanggan' => $this->input->post('kode_pelanggan'),
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'creation_date' => date('Y-m-d H:i:s'),
				'created_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
				);
		$this->load->model('sql_mod');
		$this->sql_mod->save('pelanggan', $set);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diinput.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('pelanggan', 'refresh');
	}

	public function updatePelanggan($id)
	{
		$set = array(
				'nama_pelanggan' => $this->input->post('nama_pelanggan'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
				'last_update_date' => date('Y-m-d H:i:s'),
				'last_updated_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
				);
		$this->load->model('sql_mod');
		$this->sql_mod->edit('pelanggan', $set, 'pelanggan_id', $id);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diupdate.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('pelanggan', 'refresh');
	}

	public function delete($id)
	{
		$this->load->model('sql_mod');
		$this->sql_mod->delete('pelanggan', 'pelanggan_id', $id);
		$alert = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil dihapus</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('pelanggan', 'refresh');
	}
}
