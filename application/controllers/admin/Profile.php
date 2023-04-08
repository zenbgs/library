<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
	}

	public function index()
	{
		$this->check_login->check();
		$profile = $this->profile_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'profile' => $profile,
						'breadcrumbHead' => 'Profile',
						'breadcrumb'	=>	'Struktur Organisasi'
				);
		$this->load->view('admin/profile/strukturOrganisasi', $data, FALSE);
	}

		//simpan function
		public function simpan($id_profile)
		{
			$this->check_login->check();
			$profile = $this->profile_model->listing();
			$i = $this->input;
			//valid
			$valid = $this->form_validation;
	
			if($i->post('struktur_organisasi') != ""){
				$valid->set_rules('struktur_organisasi','Struktur Organisasi','required',
						array('required'	=>	'%s harus diisi'));
			}
			else if($i->post('tata_tertib') != ""){
				$valid->set_rules('tata_tertib','Tata Tertib','required',
						array('required'	=>	'%s harus diisi'));
			}
			else{
				$valid->set_rules('jam_layanan','Jam Layanan','required',
						array('required'	=>	'%s harus diisi'));
			}
			if($valid->run()) {
	
	
				if($i->post('struktur_organisasi') != ""){
					$data = array('id_profile'	=>	$id_profile,
									'struktur_organisasi'	=>	$i->post('struktur_organisasi'),
								);
				}
				else if($i->post('tata_tertib') != ""){
					$data = array('id_profile'	=>	$id_profile,
					'tata_tertib'	=>	$i->post('tata_tertib'),
				);
				}
				else{
					$data = array('id_profile'	=>	$id_profile,
									'jam_layanan' => $i->post('jam_layanan'),
								);
				}
				$this->profile_model->simpan($data);
				$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
				if($i->post('struktur_organisasi') != ""){
					redirect(base_url('index.php/admin/profile'),'refresh');
				}
				else if($i->post('tata_tertib')){
					redirect(base_url('index.php/admin/profile/tata_tertib'), 'refresh');
				}
				else{
					redirect(base_url('index.php/admin/profile/jam_layanan'),'refresh');
				}
	
	
			}
			//End Masuk Database
			// $data = array(	'title'			=>	'Data Sambutan ',
			// 				'sejarah'		=>	$sejarah,
			// 				'isi'			=>	'admin/profilman/sejarah'
			// 	);
			// $this->load->view('admin/layout/wrapper', $data, FALSE);
		}

    public function tata_tertib()
	{
		$this->check_login->check();
		$profile = $this->profile_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'profile' => $profile,
						'breadcrumbHead' => 'Profile',
						'breadcrumb'	=>	'Tata Tertib'
				);
		$this->load->view('admin/profile/tataTertib', $data, FALSE);
	}

    public function jam_layanan()
	{
		$this->check_login->check();
		$profile = $this->profile_model->listing();
		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'profile' => $profile,
						'breadcrumbHead' => 'Profile',
						'breadcrumb'	=>	'Jam Layanan'
				);
		$this->load->view('admin/profile/jamLayanan', $data, FALSE);
	}
}
