<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    //load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('profile_model');
	}

	public function index()
	{
        $konfigurasi = $this->konfigurasi_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Profile',
                        'breadcrumb' => 'Sejarah',
						'judul' => 'Sejarah',
						'isi' => $konfigurasi->sejarah_conf
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function visi_misi()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Profile',
                        'breadcrumb' => 'Visi Misi',
						'judul' => 'Visi & Misi Perpustakaan Asia Malang',
						'visi' => $konfigurasi->visi_conf,
						'misi' => $konfigurasi->misi_conf
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function struktur_organisasi()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$profile = $this->profile_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Profile',
                        'breadcrumb' => 'Struktur Organisasi',
						'judul' => 'Struktur Organisasi',
						'isi' => $profile->struktur_organisasi
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function tata_tertib()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$profile = $this->profile_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Profile',
                        'breadcrumb' => 'Tata Tertib',
						'judul' => 'Tata Tertib',
						'isi' => $profile->tata_tertib
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function jam_layanan()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$profile = $this->profile_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Profile',
                        'breadcrumb' => 'Jam Layanan',
						'judul' => 'Jam Layanan',
						'isi' => $profile->jam_layanan
				);
		$this->load->view('single_page',$data, FALSE);
	}
}
