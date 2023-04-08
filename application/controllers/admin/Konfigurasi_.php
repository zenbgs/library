<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$this->check_login->check();
		$konfigurasi = $this->konfigurasi_model->listing();

		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'breadcrumb'	=>	'Konfigurasi Website'
				);
		$this->load->view('admin/konfigurasi/konfigurasi', $data, FALSE);
	}

	public function edit($id_konfigurasi)
	{
		$this->check_login->check();
		$konfigurasi = $this->konfigurasi_model->listing();
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('visi','Visi','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('misi','Misi','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('sejarah','Sejarah','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			//Kalo ga ganti gambar
			if(!empty($_FILES['logo']['name'])) {

			$config['upload_path']          = './assetsDashboard/img/logos/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('logo')) {
		//End Validasi

		$data = array(	'title'			=>	'Perpustakaan Asia Malang',
						'breadcrumbHead' => 'Konfigurasi Website',
						'breadcrumb'	=>	'Konfigurasi Website',
						'error_upload'	=>	 $this->upload->display_errors(),
			);
		$this->load->view('admin/konfigurasi/konfigurasi', $data, FALSE);
		//Masuk database
		}else{
			//Proses Manipulasi Gambar
			$upload_data	= array('uploads'	=> $this->upload->data());
			//Gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs

			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assetsDashboard/img/logos/'.$upload_data['uploads']['file_name'];
			//Gambar versi kecil dipindahkan
			$config['new_image']		= './assetsDashboard/img/logos/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb']   	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']          	= 200;
			$config['height']         	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$i = $this->input;

			//Hapus gambar lama jika ada upload gambar baru
			if($konfigurasi->logo_conf != "")
			{
				unlink('./assetsDashboard/img/logos/'.$konfigurasi->logo_conf);
				unlink('./assetsDashboard/img/logos/thumbs/'.$konfigurasi->logo_conf);
			}
			//End Hapus gambar

			$data = array(	'id_conf'		=>	$id_konfigurasi,
							'sejarah_conf'		=>	$i->post('sejarah'),
							'visi_conf'	=>	$i->post('visi'),
							'misi_conf'	=>	$i->post('misi'),
							'logo_conf'	=>	$upload_data['uploads']['file_name'],
							'alamat_conf'	=>	$i->post('alamat'),
							'noTelp_conf'	=>	$i->post('noTelp'),
							'email_conf'		=>	$i->post('email')			
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('index.php/admin/konfigurasi'),'refresh');
		}}else {
			//Update berita tanpa gambar
			$i = $this->input;
			$data = array(	'id_conf'		=>	$id_konfigurasi,
							'sejarah_conf'		=>	$i->post('sejarah'),
							'visi_conf'	=>	$i->post('visi'),
							'misi_conf'	=>	$i->post('misi'),
							'alamat_conf'	=>	$i->post('alamat'),
							'noTelp_conf'	=>	$i->post('noTelp'),
							'email_conf'		=>	$i->post('email')			
						);
			$this->konfigurasi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('index.php/admin/konfigurasi'),'refresh');

		}}
		//End Masuk Database
	}
}
