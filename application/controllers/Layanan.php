<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

    //load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('layanan_model');
	}

	public function index()
	{
        $konfigurasi = $this->konfigurasi_model->listing();
        $layanan = $this->layanan_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Layanan',
                        'breadcrumb' => 'Layanan Sirkulasi',
						'judul' => 'Layanan Sirkulasi',
						'isi' => $layanan->layanan_sirkulasi
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function administrasi()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
        $layanan = $this->layanan_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Layanan',
                        'breadcrumb' => 'Layanan Administrasi',
						'judul' => 'Layanan Administrasi',
						'isi' => $layanan->layanan_administrasi
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function printing()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$layanan = $this->layanan_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Layanan',
                        'breadcrumb' => 'Layanan Print',
						'judul' => 'Layanan Print',
						'isi' => $layanan->layanan_print
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function loker()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$layanan = $this->layanan_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Layanan',
                        'breadcrumb' => 'Layanan Loker',
						'judul' => 'Layanan Loker',
						'isi' => $layanan->layanan_loker
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function jam_layanan()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$layanan = $this->layanan_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Layanan',
                        'breadcrumb' => 'Jam Layanan',
						'judul' => 'Jam Layanan',
						'isi' => $profile->jam_layanan
				);
		$this->load->view('single_page',$data, FALSE);
	}
}
