<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarif extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        }
    }
    
	public function index()
	{
		$this->template->title = 'Master Data Tarif';
		$this->load->model('sql_mod');
        $data['tarifs'] = $this->sql_mod->msrwhere('tarif', array(), 'tarif_id', 'desc')->result();
        $this->template->content->view('tarif/list', $data);
        $this->template->publish(); 
	}

	public function add()
	{
		$this->template->title = 'Tambah Tarif';
		$this->template->stylesheet->add('assets/css/jquery-ui.css');
		$this->template->stylesheet->add('assets/css/jquery-ui-timepicker-addon.css');
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
		$this->template->javascript->add('assets/js/jquery-ui.js');
		$this->template->javascript->add('assets/js/jquery-ui-timepicker-addon.js');
        $this->template->content->view('tarif/add');
        $this->template->publish(); 
	}

	public function edit($id)
	{
		$this->template->title = 'Edit Tarif';
		$this->template->stylesheet->add('assets/css/jquery-ui.css');
		$this->template->stylesheet->add('assets/css/jquery-ui-timepicker-addon.css');
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
		$this->template->javascript->add('assets/js/jquery-ui.js');
		$this->template->javascript->add('assets/js/jquery-ui-timepicker-addon.js');
		$this->load->model('sql_mod');
        $data['tarif'] = $this->sql_mod->msrwhere('tarif', array('tarif_id' => $id), 'tarif_id', 'desc')->row();
        $this->template->content->view('tarif/edit', $data);
        $this->template->publish(); 
	}

	public function view($id)
	{
		$this->template->title = 'View Tarif';
		$this->load->model('sql_mod');
        $data['tarif'] = $this->sql_mod->msrwhere('tarif', array('tarif_id' => $id), 'tarif_id', 'desc')->row();
        $this->template->content->view('tarif/view', $data);
        $this->template->publish(); 
	}

	public function createTarif()
	{
		$selesai = $this->input->post('selesai');
		$mulai = $this->input->post('mulai');
		$perjam = $this->input->post('perjam');
		$waktu = $selesai - $mulai;
		$total = $perjam * $waktu;
		$set = array(
				'kode_tarif' => $this->input->post('kode_tarif'),
				'mulai' => $mulai,
				'selesai' => $selesai,
				'perjam' => $perjam,
				'total' => $total,
				'creation_date' => date('Y-m-d H:i:s'),
				'created_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
				);
		$this->load->model('sql_mod');
		$this->sql_mod->save('tarif', $set);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diinput.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('tarif', 'refresh');
	}

	public function updateTarif($id)
	{
		$selesai = $this->input->post('selesai');
		$mulai = $this->input->post('mulai');
		$perjam = $this->input->post('perjam');
		$waktu = $selesai - $mulai;
		$total = $perjam * $waktu;
		$set = array(
				'mulai' => $mulai,
				'selesai' => $selesai,
				'perjam' => $perjam,
				'total' => $total,
				'last_update_date' => date('Y-m-d H:i:s'),
				'last_updated_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
				);
		$this->load->model('sql_mod');
		$this->sql_mod->edit('tarif', $set, 'tarif_id', $id);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diupdate.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('tarif', 'refresh');
	}

	public function delete($id)
	{
		$this->load->model('sql_mod');
		$this->sql_mod->delete('tarif', 'tarif_id', $id);
		$alert = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil dihapus</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('tarif', 'refresh');
	}

}
