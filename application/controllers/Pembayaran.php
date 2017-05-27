<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        }
    }
    	
	public function index()
	{
		$this->template->title = 'Data Pembayaran';
		$this->load->model('sql_mod');
		$q = "select * from pembayaran a join sewa b on b.sewa_id = a.sewa_id 
				join pelanggan c on c.pelanggan_id = b.pelanggan_id join lapangan d on d.lapangan_id = b.lapangan_id order by pembayaran_id desc";
        $data['pembayarans'] = $this->sql_mod->msrquery($q)->result();
        $this->template->content->view('pembayaran/list', $data);
        $this->template->publish(); 
	}

	public function edit($id)
	{
		$this->template->title = 'Edit Pembayaran Lapangan';
		$this->template->stylesheet->add('assets/css/jquery-ui.css');
		$this->template->stylesheet->add('assets/css/jquery-ui-timepicker-addon.css');
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
		$this->template->javascript->add('assets/js/jquery-ui.js');
		$this->template->javascript->add('assets/js/jquery-ui-timepicker-addon.js');
		$this->load->model('sql_mod');
        $q = "select * from pembayaran a join sewa b on b.sewa_id = a.sewa_id join pelanggan c on c.pelanggan_id = b.pelanggan_id join lapangan d on d.lapangan_id = b.lapangan_id where a.pembayaran_id = '" . $id . "'";
        $data['pembayaran'] = $this->sql_mod->msrquery($q)->row();
        $this->template->content->view('pembayaran/edit', $data);
        $this->template->publish(); 
	}

	public function view($id)
	{
		$this->template->title = 'View Pembayaran Lapangan';
		$this->load->model('sql_mod');
        $q = "select * from pembayaran a join sewa b on b.sewa_id = a.sewa_id join pelanggan c on c.pelanggan_id = b.pelanggan_id join lapangan d on d.lapangan_id = b.lapangan_id where a.pembayaran_id = '" . $id . "'";
        $data['pembayaran'] = $this->sql_mod->msrquery($q)->row();
        $this->template->content->view('pembayaran/view', $data);
        $this->template->publish(); 
	}


	public function updatePembayaran($id)
	{
		$set = array(
				'tanggal_bayar' => date('Y-m-d H:i:s'),
				'jumlah_bayar' => $this->input->post('jumlah_bayar'),
				'status' => $this->input->post('status'),
				'last_update_date' => date('Y-m-d H:i:s'),
				'last_updated_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
				);
		$this->load->model('sql_mod');
		$this->sql_mod->edit('pembayaran', $set, 'pembayaran_id', $id);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diupdate.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('pembayaran', 'refresh');
	}

}