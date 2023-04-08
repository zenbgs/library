<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prosedur extends CI_Controller {

    //load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('prosedur_model');
	}

	public function index()
	{
        $konfigurasi = $this->konfigurasi_model->listing();
        $prosedur = $this->prosedur_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Prosedur',
                        'breadcrumb' => 'Prosedur pengumpulan laporan',
						'judul' => 'Prosedur Pengumpulan Laporan',
						'isi' => $prosedur->pengumpulan_laporan
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function sumbangan_buku()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
        $prosedur = $this->prosedur_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Prosedur',
                        'breadcrumb' => 'Prosedur sumbangan buku',
						'judul' => 'Prosedur Sumbangan Buku',
						'isi' => $prosedur->sumbangan_buku
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function sirkulasi()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$prosedur = $this->prosedur_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Prosedur',
                        'breadcrumb' => 'Prosedur sirkulasi',
						'judul' => 'Prosedur Sirkulasi',
						'isi' => $prosedur->sirkulasi
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function peminjaman_loker()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$prosedur = $this->prosedur_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Prosedur',
                        'breadcrumb' => 'Prosedur peminjaman loker',
						'judul' => 'Prosedur Peminjaman Loker',
						'isi' => $prosedur->peminjaman_loker
				);
		$this->load->view('single_page',$data, FALSE);
	}

	public function jam_layanan()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$prosedur = $this->prosedur_model->listing();
        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumbHead'	=>	'Prosedur',
                        'breadcrumb' => 'Jam Layanan',
						'judul' => 'Jam Layanan',
						'isi' => $profile->jam_layanan
				);
		$this->load->view('single_page',$data, FALSE);
	}
}
