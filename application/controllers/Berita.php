<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
        $this->load->model('berita_model');
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();

		//Listing Berita dengan Pagination
		$this->load->library('pagination');

		$config['base_url'] 	= base_url('index.php/berita/index/');
		$config['total_rows'] 	= count($this->berita_model->total());
		$config['per_page'] 	= 3;
		$config['uri_segment']	= 3;
		//Limit dan Start
		$limit					= $config['per_page'];
		$start					= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//End Limit dan Start
		$this->pagination->initialize($config);

		$berita 				= $this->berita_model->berita($limit,$start);
		//End Pagination

		// tambahan zen untuk menampilkan list berita samping + kategori
		$listing = $this->berita_model->home();


		$data = array(	'title'		=>	'Perpustakaan Asia Malang',
						'paginasi'	=> $this->pagination->create_links(),
						'berita'	=> $berita,
						'listing' => $listing,
						'limit'		=> $limit,
                        'breadcrumbHead' => 'Berita',
                        'breadcrumb' => 'Berita',
						'konfigurasi' => $konfigurasi,
						'total'		=> $config['total_rows'],
				);
		$this->load->view('berita', $data, FALSE);
	}

	//Detail Berita
	public function read($slug_berita)
	{
		$berita = $this->berita_model->read($slug_berita);
		$listing = $this->berita_model->home();
		$konfigurasi = $this->konfigurasi_model->listing();

		$data = array(	'title'		=>	$berita->judul_berita,
						'berita'	=>	$berita,
						'listing'	=>	$listing,
						'konfigurasi' => $konfigurasi,
				);
		$this->load->view('read', $data, FALSE);
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
						'breadcrumb' => 'Edit Berita',
						'breadcrumbHead' => 'Berita'
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
							'slug_berita'	=>	url_title($this->input->post('judul_berita'), 'dash', TRUE),
							'judul_berita'	=>	$i->post('judul_berita'),
							'isi_berita'	=>	$i->post('isi_berita'),
							'gambar'		=>	$upload_data['uploads']['file_name'],
							'status_berita'	=>	$i->post('status_berita'),
							'jenis_berita'	=>	$i->post('jenis_berita'),
							'keywords'		=>	$i->post('keywords')			
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('index.php/admin/berita'),'refresh');
		}}else {
			//Update berita tanpa gambar
			$i = $this->input;
			$data = array(	'id_berita'		=>	$id_berita,
							'id_user'		=>	$this->session->userdata('id_user'),
							'id_kategori'	=>	$i->post('id_kategori'),
							'slug_berita'	=>	url_title($this->input->post('judul_berita'), 'dash', TRUE),
							'judul_berita'	=>	$i->post('judul_berita'),
							'isi_berita'	=>	$i->post('isi_berita'),
							//'gambar'		=>	$upload_data['uploads']['file_name'],
							'status_berita'	=>	$i->post('status_berita'),
							'jenis_berita'	=>	$i->post('jenis_berita'),
							'keywords'		=>	$i->post('keywords')			
						);
			$this->berita_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data Telah DiUpdate');
			redirect(base_url('index.php/admin/berita'),'refresh');

		}}
		//End Masuk Database
		$data = array(	'title'			=>	'Edit data berita '.$berita->judul_berita,
						'kategori'		=>	$kategori,
						'berita'		=>	$berita,
						'isi'			=>	'admin/berita/edit'
			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}
