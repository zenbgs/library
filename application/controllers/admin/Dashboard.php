<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('user_model');
	}

	public function index()
	{
		$berita = $this->berita_model->listing();
		$user = $this->user_model->listing();
		$this->check_login->check();

		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'berita'	=>	$berita,
						'user'	=>	$user,
						'breadcrumb'	=>	'Beranda'
				);
		$this->load->view('admin/dashboard/dashboard', $data, FALSE);
	}
}
