<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('layanan_model');
	}

	public function index()
	{
		$this->check_login->check();
		$layanan = $this->layanan_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'layanan' => $layanan,
						'breadcrumbHead' => 'Layanan',
						'breadcrumb'	=>	'Layanan Sirkulasi'
				);
		$this->load->view('admin/layanan/sirkulasi', $data, FALSE);
	}

    public function administrasi()
	{
		$this->check_login->check();
		$layanan = $this->layanan_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'layanan' => $layanan,
						'breadcrumbHead' => 'Layanan',
						'breadcrumb'	=>	'Layanan Administrasi'
				);
		$this->load->view('admin/layanan/administrasi', $data, FALSE);
	}

    public function printing()
	{
		$this->check_login->check();
		$layanan = $this->layanan_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'layanan' => $layanan,
						'breadcrumbHead' => 'Layanan',
						'breadcrumb'	=>	'Layanan Print'
				);
		$this->load->view('admin/layanan/printing', $data, FALSE);
	}

    public function loker()
	{
		$this->check_login->check();
		$layanan = $this->layanan_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'layanan' => $layanan,
						'breadcrumbHead' => 'Layanan',
						'breadcrumb'	=>	'Layanan Loker'
				);
		$this->load->view('admin/layanan/loker', $data, FALSE);
	}

	//simpan function
	public function simpan($id_layanan)
	{
		$this->check_login->check();
		$layanan = $this->layanan_model->listing();
		$i = $this->input;
		//valid
		$valid = $this->form_validation;

		if($i->post('sirkulasi') != ""){
			$valid->set_rules('sirkulasi','Layanan Sirkulasi','required',
					array('required'	=>	'%s harus diisi'));
		}
		else if($i->post('administrasi') != ""){
			$valid->set_rules('administrasi','Layanan Administrasi','required',
					array('required'	=>	'%s harus diisi'));
		}
		else if($i->post('print') != ""){
			$valid->set_rules('print','Layanan Print','required',
					array('required'	=>	'%s harus diisi'));
		}
		else{
			$valid->set_rules('loker','Layanan Loker','required',
					array('required'	=>	'%s harus diisi'));
		}
		if($valid->run()) {


			if($i->post('sirkulasi') != ""){
				$data = array('id_layanan'	=>	$id_layanan,
								'layanan_sirkulasi'	=>	$i->post('sirkulasi'),
							);
			}
			else if($i->post('administrasi') != ""){
				$data = array('id_layanan'	=>	$id_layanan,
				'layanan_administrasi'	=>	$i->post('administrasi'),
			);
			}
			else if($i->post('print') != ""){
				$data = array('id_layanan'	=>	$id_layanan,
				'layanan_print'	=>	$i->post('print'),
			);
			}
			else{
				$data = array('id_layanan'	=>	$id_layanan,
								'layanan_loker' => $i->post('loker'),
							);
			}
			$this->layanan_model->simpan($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			if($i->post('sirkulasi') != ""){
				redirect(base_url('index.php/admin/layanan'),'refresh');
			}
			else if($i->post('administrasi')){
				redirect(base_url('index.php/admin/layanan/administrasi'), 'refresh');
			}
			else if($i->post('print')){
				redirect(base_url('index.php/admin/layanan/printing'), 'refresh');
			}
			else{
				redirect(base_url('index.php/admin/layanan/loker'),'refresh');
			}


		}
		//End Masuk Database
		// $data = array(	'title'			=>	'Data Sambutan ',
		// 				'sejarah'		=>	$sejarah,
		// 				'isi'			=>	'admin/profilman/sejarah'
		// 	);
		// $this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
