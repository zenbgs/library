<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('berita_model');
	}

	public function index()
	{
		$this->check_login->check();
		$berita = $this->berita_model->listing();

		$data = array(	'title'	=>	'Data Berita ('.count($berita).')',
						'berita'	=>	$berita,
						'breadcrumb'	=>	'Berita'
				);
		$this->load->view('admin/berita/berita', $data, FALSE);
	}

	public function tambah_berita()
	{
		$this->check_login->check();
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('judul_berita','Judul Berita','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('isi_berita','Isi Berita','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			$config['upload_path']          = './assetsDashboard/upload/image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;
			
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('gambar')) {
				//End Validasi
				$data = array(	'title'			=>	'Perpustakaan Asia Malang',
				'breadcrumbHead' => 'Berita',
				'breadcrumb'	=>	'Tambah Berita',
				'error_upload'	=>	 $this->upload->display_errors(),
			);
			$this->load->view('admin/berita/tambahBerita', $data, FALSE);
				//Masuk database
				}else{

			//Proses Manipulasi Gambar
			$upload_data	= array('uploads'	=> $this->upload->data());
			//Gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs

			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assetsDashboard/upload/image/'.$upload_data['uploads']['file_name'];
			//Gambar versi kecil dipindahkan
			$config['new_image']		= './assetsDashboard/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb']   	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']          	= 200;
			$config['height']         	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$i = $this->input;
			$data = array(	
							'judul_berita'	=>	$i->post('judul_berita'),
							'isi_berita'	=>	$i->post('isi_berita'),
							
							'tanggal_berita' => date('Y-m-d H:i:s'),
							'id_author'		=>	$this->session->userdata('id_user'),
							'status_berita'	=>	$i->post('status_berita'),
							'slug_berita'	=>	url_title($this->input->post('judul_berita'), 'dash', TRUE),
							'gambar_berita'		=>	$upload_data['uploads']['file_name'],
						);
			$this->berita_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Berhasil menambah berita baru!');
			redirect(base_url('index.php/admin/berita'),'refresh');
		}}else{
			//End Masuk Database

		$data = array(	'title'	=>	'Perpustakaan Asia Malang',
		'breadcrumbHead' => 'Berita',
		'breadcrumb'	=>	'Tambah Berita'
);
$this->load->view('admin/berita/tambahBerita', $data, FALSE);
		}
		
	}

	//Edit
	public function edit($id_berita)
	{
		$berita = $this->berita_model->detail($id_berita);

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('judul','Judul Berita','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('isi','Isi Berita','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run()) {
			//Kalo ga ganti gambar
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path']          = './assetsDashboard/upload/image/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;

	        $this->load->library('upload', $config);
	        if ( ! $this->upload->do_upload('gambar')) {
		//End Validasi

		$data = array(	'title'			=>	'Perpustakaan Asia Malang',
						'berita'		=>	$berita,
						'error_upload'	=>	 $this->upload->display_errors(),
						'breadcrumbHead' => 'Berita',
						'breadcrumb' => 'Edit Berita'
			);
		$this->load->view('admin/berita/edit', $data, FALSE);
		//Masuk database
		}else{
			//Proses Manipulasi Gambar
			$upload_data	= array('uploads'	=> $this->upload->data());
			//Gambar asli disimpan di folder assets/upload/image
			//lalu gambar asli itu dicopy untuk versi mini size ke folder assets/upload/image/thumbs

			$config['image_library']  	= 'gd2';
			$config['source_image']   	= './assetsDashboard/upload/image/'.$upload_data['uploads']['file_name'];
			//Gambar versi kecil dipindahkan
			$config['new_image']		= './assetsDashboard/upload/image/thumbs/'.$upload_data['uploads']['file_name'];
			$config['create_thumb']   	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']          	= 200;
			$config['height']         	= 200;
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$i = $this->input;

			//Hapus gambar lama jika ada upload gambar baru
			if($berita->gambar_berita != "")
			{
				unlink('./assetsDashboard/upload/image/'.$berita->gambar_berita);
				unlink('./assetsDashboard/upload/image/thumbs/'.$berita->gambar_berita);
			}
			//End Hapus gambar

			$data = array(	'id_berita'		=>	$id_berita,
							'id_author'		=>	$this->session->userdata('id_user'),
							'slug_berita'	=>	url_title($this->input->post('judul'), 'dash', TRUE),
							'judul_berita'	=>	$i->post('judul'),
							'isi_berita'	=>	$i->post('isi'),
							'gambar_berita'		=>	$upload_data['uploads']['file_name'],
							'status_berita'	=>	$i->post('status'),			
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berhasil mengedit berita!');
			redirect(base_url('index.php/admin/berita'),'refresh');
		}}else {
			//Update berita tanpa gambar
			$i = $this->input;
			$data = array(	'id_berita'		=>	$id_berita,
							'id_author'		=>	$this->session->userdata('id_user'),
							'slug_berita'	=>	url_title($this->input->post('judul'), 'dash', TRUE),
							'judul_berita'	=>	$i->post('judul'),
							'isi_berita'	=>	$i->post('isi'),
							// 'gambar_berita'		=>	$upload_data['uploads']['file_name'],
							'status_berita'	=>	$i->post('status'),			
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berhasil mengedit berita!');
			redirect(base_url('index.php/admin/berita'),'refresh');

		}}else{
			//End Masuk Database
		$data = array(	'title'			=>	'Perpustakaan Asia Malang',
		'berita'		=>	$berita,
		'breadcrumbHead' => 'Berita',
		'breadcrumb' => 'Edit Berita'
);
$this->load->view('admin/berita/edit', $data, FALSE);
		}
		
	}

	//Delete
	public function delete($id_berita)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$berita = $this->berita_model->detail($id_berita);

		//Hapus Gambar
		if($berita->gambar_berita != "") {
			unlink('./assetsDashboard/upload/image/'.$berita->gambar_berita);
			unlink('./assetsDashboard/upload/image/thumbs/'.$berita->gambar_berita);
		}
		//End Hapus Gambar

		$data = array(	'id_berita'	=>	$berita->id_berita);
		$this->berita_model->delete($data);
		$this->session->set_flashdata('sukses', 'Berhasil menghapus berita!');
		redirect(base_url('index.php/admin/berita'),'refresh');
	}
}