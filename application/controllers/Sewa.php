<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

	public function __construct() 
	{
        parent::__construct();
        if ($this->session->userdata('login') != TRUE) {
            redirect('login');
        }
    }
    	
	public function index()
	{
		$this->template->title = 'Data Sewa Lapangan';
		$this->load->model('sql_mod');
		$q = "select * from sewa a join lapangan b on a.lapangan_id = b.lapangan_id 
				join pelanggan c on c.pelanggan_id = a.pelanggan_id 
				join tarif d on d.tarif_id = a.tarif_id order by a.sewa_id desc";
        $data['sewas'] = $this->sql_mod->msrquery($q)->result();

        $this->template->content->view('sewa/list', $data);
        $this->template->publish(); 
	}

	public function add()
	{
		$this->template->title = 'Tambah Sewa Lapangan';
		$this->template->stylesheet->add('assets/css/jquery-ui.css');
		$this->template->stylesheet->add('assets/css/jquery-ui-timepicker-addon.css');
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
		$this->template->javascript->add('assets/js/jquery-ui.js');
		$this->template->javascript->add('assets/js/jquery-ui-timepicker-addon.js');

		$this->load->model('sql_mod');
		$data['lapangans'] = $this->sql_mod->msrwhere('lapangan', array(), 'lapangan_id', 'desc')->result();
		$data['pelanggans'] = $this->sql_mod->msrwhere('pelanggan', array(), 'pelanggan_id', 'desc')->result();
		$data['tarifs'] = $this->sql_mod->msrwhere('tarif', array(), 'tarif_id', 'desc')->result();
        $this->template->content->view('sewa/add', $data);
        $this->template->publish(); 
	}

	public function edit($id)
	{
		$this->template->title = 'Edit Sewa Lapangan';
		$this->template->stylesheet->add('assets/css/jquery-ui.css');
		$this->template->stylesheet->add('assets/css/jquery-ui-timepicker-addon.css');
		$this->template->javascript->add('assets/js/jquery.validate.min.js');
		$this->template->javascript->add('assets/js/jquery-ui.js');
		$this->template->javascript->add('assets/js/jquery-ui-timepicker-addon.js');

		$this->load->model('sql_mod');
        $data['sewa'] = $this->sql_mod->msrwhere('sewa', array(), 'sewa_id', 'desc')->row();
        $this->template->content->view('sewa/edit', $data);
        $this->template->publish(); 
	}

	public function view($id)
	{
		$this->template->title = 'View Sewa';
		$this->load->model('sql_mod');
		$q = "select * from sewa a join lapangan b on b.lapangan_id = a.lapangan_id join pelanggan c on c.pelanggan_id = a.pelanggan_id join tarif d on d.tarif_id = a.tarif_id where a.sewa_id = '". $id ."'";
        $data['sewa'] = $this->sql_mod->msrquery($q)->row();
        $this->template->content->view('sewa/view', $data);
        $this->template->publish(); 
	}

	public function createSewa()
	{
		$tarif_id = $this->input->post('tarif_id');
		$this->load->model('sql_mod');
		$tarif = $this->sql_mod->msrwhere('tarif', array('tarif_id' => $tarif_id), 'tarif_id', 'desc')->row();
		$set = array(
				'lapangan_id' => $this->input->post('lapangan_id'),
				'pelanggan_id' => $this->input->post('pelanggan_id'),
				'tarif_id' => $this->input->post('tarif_id'),
				'tanggal_booking' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tanggal')))),
				'jam_booking' => $this->input->post('jambooking'),
				'uang_muka' => $this->input->post('uangmuka'),
				'biaya_sewa' => $tarif->total,
				'creation_date' => date('Y-m-d H:i:s'),
				'created_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
			);
		$this->sql_mod->save('sewa', $set);
		
		$sewa = $this->sql_mod->msrwhere('sewa', array('creation_date' => date('Y-m-d H:i:s')), 'sewa_id', 'desc')->row();
		$sisa_bayar = $sewa->biaya_sewa - $sewa->uang_muka;
		$set2 = array(
				'sewa_id' => $sewa->sewa_id,
				'sisa_bayar' => $sisa_bayar,
				'creation_date' => date('Y-m-d H:i:s'),
				'created_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
			);
		$this->sql_mod->save('pembayaran', $set2);

		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diinput.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('sewa', 'refresh');
	}

	public function updateSewa($id)
	{
		$set = array(
				'lapangan_id' => $this->input->post('lapangan_id'),
				'pelanggan_id' => $this->input->post('pelanggan_id'),
				'tarif_id' => $this->input->post('tarif_id'),
				'tanggal_booking' => date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('tanggal')))),
				'jam_booking' => $this->input->post('jam_booking'),
				'uang_muka' => $this->input->post('uang_muka'),
				'biaya_sewa' => $this->input->post('biaya_sewa'),
				'status' => $this->input->post('status'),
				'last_update_date' => date('Y-m-d H:i:s'),
				'last_updated_by' => $this->encrypt->decode($this->session->userdata('admin_id'))
			);
		$this->load->model('sql_mod');
		$this->sql_mod->edit('sewa', $set, 'sewa_id', $id);
		$sewa = $this->sql_mod->msrwhere('sewa', array('sewa_id' => $id), 'sewa_id', 'desc')->row();
		$sisa_bayar = $sewa->biaya_sewa - $sewa->uang_muka;
		$set2 = array(
				'sewa_id' => $sewa->sewa_id,
				'sisa_bayar' => $sisa_bayar
			);
		$pembayaran_id = $this->sql_mod->msrwhere('pembayaran', array(), 'pembayaran_id', 'desc')->row();
		$this->sql_mod->edit('pembayaran', $set2, 'pembayaran_id', $pembayaran_id);
		$alert = '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil diupdate.</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('sewa', 'refresh');
	}

	public function delete($id) 
	{
		$this->load->model('sql_mod');
		$this->sql_mod->delete('sewa', 'sewa_id', $id);
		$pembayaran = $this->sql_mod->msrwhere('pembayaran', array('sewa_id' => $id), 'pembayaran_id', 'desc')->row();
		$this->sql_mod->delete('pembayaran', 'pembayaran_id', $pembayaran->pembayaran_id);
		$alert = '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Sukses!</strong> Data Berhasil dihapus</div>';
		$this->session->set_flashdata('message', $alert);
		redirect('sewa', 'refresh');
	}

}