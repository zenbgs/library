<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing User
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function listing_home()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('status_user', '1');
		$this->db->order_by('id_user','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$id_user);
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}

	//Login User
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'	=> $username,
							   'password'	=> sha1($password)));
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}

	//Count User
	public function hitung($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array('username'	=> $username,
							   'password'	=> sha1($password)));
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->num_rows();
	}

	//Tambah User
	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}

	//Edit User
	public function edit($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}

	//Non Aktif User

	public function nonaktif($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}

	//Aktif User

	public function aktifkan($data)
	{
		$this->db->where('id_user',$data['id_user']);
		$this->db->update('user',$data);
	}
}
?>