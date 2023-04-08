<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//Listing data user
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'title'	=>	'Data User Administrator ('.count($user).')',
						'user'	=>	$user,
						'breadcrumb'	=>	'User'
				);
		$this->load->view('admin/user/user', $data, FALSE);
	}

	//Tambah
	public function tambah_user()
	{
		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama User','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('jabatan','Jabatan User','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('username','Username','required|trim|min_length[6]|max_length[32]|is_unique[user.username]',
				array('required'	=>	'%s harus diisi',
					  'min_length'	=>	'%s minimal 6 karakter',
					  'max_length'	=>	'%s maximal 32 karakter',
					  'is_unique'	=>	'%s <strong>'.$this->input->post('username').'</strong> Sudah digunakan. Buat Username baru!'));

		$valid->set_rules('password','Password','required|trim|min_length[6]',
				array('required'	=>	'%s harus diisi',
					  'min_length'	=>	'%s minimal 6 karakter'));
		if($valid->run() === FALSE) {
		//End Validasi

		$data = array(	'title'	=>	'Tambah data user administrator',
						'breadcrumbHead'	=>	'User',
						'breadcrumb' => 'Tambah User'
			);
		$this->load->view('admin/user/tambahUser', $data, FALSE);
		//Masuk database
		}else{
			$config['upload_path']          = './assetsDashboard/img/user/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;
			
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto')) {
				//End Validasi
				$data = array(	'title'			=>	'Perpustakaan Asia Malang',
				'breadcrumbHead' => 'User',
				'breadcrumb'	=>	'Tambah User',
				'error_upload'	=>	 $this->upload->display_errors(),
			);
			$this->load->view('admin/user', $data, FALSE);
				//Masuk database
				}else{
			$i = $this->input;
			$upload_data	= array('uploads'	=> $this->upload->data());
			$data = array(	'nama_user'			=>	$i->post('nama'),
							'jabatan_user'			=>	$i->post('jabatan'),
							'username'		=>	$i->post('username'),
							'password'		=>	sha1($i->post('password')),
							'akses_user'	=>	$i->post('akses'),
							'status_user' => 1,
							'gambar_user' => $upload_data['uploads']['file_name']
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Berhasil menambah user');
			redirect(base_url('index.php/admin/user'),'refresh');
					}
		}
		//End Masuk Database
	}

	//Edit
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

		//valid
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama User','required',
				array('required'	=>	'%s harus diisi'));

		$valid->set_rules('jabatan','Jabatan User','required',
				array('required'	=>	'%s harus diisi'));

		if($valid->run() === FALSE) {
		//End Validasi

		$data = array(	'title'	=>	'Edit data user administrator',
						'breadcrumbHead'	=>	'User',
						'breadcrumb' => 'Edit User',
						'user' => $user,
			);
		$this->load->view('admin/user/edit', $data, FALSE);
		//Masuk database
		}else{
			if(!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './assetsDashboard/img/user/';
	        $config['allowed_types']        = 'gif|jpg|png|jpeg';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 5000;
	        $config['max_height']           = 5000;
			
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto')) {
				//End Validasi
				$data = array(	'title'			=>	'Perpustakaan Asia Malang',
				'breadcrumbHead' => 'User',
				'breadcrumb'	=>	'Tambah User',
				'error_upload'	=>	 $this->upload->display_errors(),
			);
			$this->load->view('admin/user', $data, FALSE);
				//Masuk database
				}else{

			$i = $this->input;
			$upload_data	= array('uploads'	=> $this->upload->data());
			if(!empty($i->post('password'))){
			$data = array(	'nama_user'			=>	$i->post('nama'),
							'jabatan_user'			=>	$i->post('jabatan'),
							'username'		=>	$i->post('username'),
							'password'		=>	sha1($i->post('password')),
							'akses_user'	=>	$i->post('akses'),
							'status_user' => 1,
							'gambar_user' => $upload_data['uploads']['file_name'],
							'id_user' => $id_user
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berhasil mengedit user');
			redirect(base_url('index.php/admin/user'),'refresh');
			}else{
				$data = array(	'nama_user'			=>	$i->post('nama'),
							'jabatan_user'			=>	$i->post('jabatan'),
							'username'		=>	$i->post('username'),
							// 'password'		=>	sha1($i->post('password')),
							'akses_user'	=>	$i->post('akses'),
							'status_user' => 1,
							'gambar_user' => $upload_data['uploads']['file_name'],
							'id_user' => $id_user
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berhasil mengedit user');
			redirect(base_url('index.php/admin/user'),'refresh');
			}
		}}
		else{
			$i = $this->input;
			if(!empty($i->post('password'))){
			$data = array(	'nama_user'			=>	$i->post('nama'),
							'jabatan_user'			=>	$i->post('jabatan'),
							'username'		=>	$i->post('username'),
							'password'		=>	sha1($i->post('password')),
							'akses_user'	=>	$i->post('akses'),
							'status_user' => 1,
							'id_user' => $id_user
							// 'gambar_user' => $upload_data['uploads']['file_name']
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berhasil mengedit user');
			redirect(base_url('index.php/admin/user'),'refresh');
					}else{
						$data = array(	'nama_user'			=>	$i->post('nama'),
							'jabatan_user'			=>	$i->post('jabatan'),
							'username'		=>	$i->post('username'),
							// 'password'		=>	sha1($i->post('password')),
							'akses_user'	=>	$i->post('akses'),
							'status_user' => 1,
							'id_user' => $id_user
							// 'gambar_user' => $upload_data['uploads']['file_name']
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Berhasil mengedit user');
			redirect(base_url('index.php/admin/user'),'refresh');
					}
		}
	}
		//End Masuk Database
	}

	//Non Aktif
	public function nonaktif($id_user)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$user = $this->user_model->detail($id_user);

		$data = array(	'id_user'	=>	$user->id_user, 'status_user' => 0);
		$this->user_model->nonaktif($data);
		$this->session->set_flashdata('sukses', 'Berhasil menonaktifkan user ' . $user->nama_user);
		redirect(base_url('index.php/admin/user'),'refresh');
	}

	//Aktifkan
	public function aktifkan($id_user)
	{
		//Proteksi delete
		$this->check_login->check();
		
		$user = $this->user_model->detail($id_user);

		$data = array(	'id_user'	=>	$user->id_user, 'status_user' => 1);
		$this->user_model->aktifkan($data);
		$this->session->set_flashdata('sukses', 'Berhasil mengaktifkan user ' . $user->nama_user);
		redirect(base_url('index.php/admin/user'),'refresh');
	}

}

?>