<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prosedur extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('prosedur_model');
	}

	public function index()
	{
		$this->check_login->check();
		$prosedur = $this->prosedur_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'prosedur' => $prosedur,
						'breadcrumbHead' => 'Prosedur',
						'breadcrumb'	=>	'Pengumpulan Laporan'
				);
		$this->load->view('admin/prosedur/pengumpulanLaporan', $data, FALSE);
	}

    public function sumbangan_buku()
	{
		$this->check_login->check();
		$prosedur = $this->prosedur_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'prosedur' => $prosedur,
						'breadcrumbHead' => 'Prosedur',
						'breadcrumb'	=>	'Sumbangan Buku'
				);
		$this->load->view('admin/prosedur/sumbanganBuku', $data, FALSE);
	}

    public function sirkulasi()
	{
		$this->check_login->check();
		$prosedur = $this->prosedur_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'prosedur' => $prosedur,
						'breadcrumbHead' => 'Prosedur',
						'breadcrumb'	=>	'Sirkulasi'
				);
		$this->load->view('admin/prosedur/sirkulasi', $data, FALSE);
	}

    public function peminjaman_loker()
	{
		$this->check_login->check();
		$prosedur = $this->prosedur_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'prosedur' => $prosedur,
						'breadcrumbHead' => 'Prosedur',
						'breadcrumb'	=>	'Peminjaman Loker'
				);
		$this->load->view('admin/prosedur/peminjamanLoker', $data, FALSE);
	}

	//simpan function
	public function simpan($id_prosedur)
	{
		$this->check_login->check();
		$prosedur = $this->prosedur_model->listing();
		$i = $this->input;
		//valid
		$valid = $this->form_validation;

		if($i->post('pengumpulan_laporan') != ""){
			$valid->set_rules('pengumpulan_laporan','Pengumpulan Laporan','required',
					array('required'	=>	'%s harus diisi'));
		}
		else if($i->post('sumbangan_buku') != ""){
			$valid->set_rules('sumbangan_buku','Sumbangan Buku','required',
					array('required'	=>	'%s harus diisi'));
		}
		else if($i->post('sirkulasi') != ""){
			$valid->set_rules('sirkulasi','Sirkulasi','required',
					array('required'	=>	'%s harus diisi'));
		}
		else{
			$valid->set_rules('peminjaman_loker','Peminjaman Loker','required',
					array('required'	=>	'%s harus diisi'));
		}
		if($valid->run()) {


			if($i->post('pengumpulan_laporan') != ""){
				$data = array('id_prosedur'	=>	$id_prosedur,
								'pengumpulan_laporan'	=>	$i->post('pengumpulan_laporan'),
							);
			}
			else if($i->post('sumbangan_buku') != ""){
				$data = array('id_prosedur'	=>	$id_prosedur,
				'sumbangan_buku'	=>	$i->post('sumbangan_buku'),
			);
			}
			else if($i->post('sirkulasi') != ""){
				$data = array('id_prosedur'	=>	$id_prosedur,
				'sirkulasi'	=>	$i->post('sirkulasi'),
			);
			}
			else{
				$data = array('id_prosedur'	=>	$id_prosedur,
								'peminjaman_loker' => $i->post('peminjaman_loker'),
							);
			}
			$this->prosedur_model->simpan($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			if($i->post('pengumpulan_laporan') != ""){
				redirect(base_url('index.php/admin/prosedur'),'refresh');
			}
			else if($i->post('sumbangan_buku')){
				redirect(base_url('index.php/admin/prosedur/sumbangan_buku'), 'refresh');
			}
			else if($i->post('sirkulasi')){
				redirect(base_url('index.php/admin/prosedur/sirkulasi'), 'refresh');
			}
			else{
				redirect(base_url('index.php/admin/prosedur/peminjaman_loker'),'refresh');
			}


		}
	}
}
