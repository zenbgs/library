<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing konfigurasi
	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();
	}

	public function edit($data)
	{
      $this->db->where('id_conf', $data['id_conf']);
      $this->db->update('konfigurasi', $data);
	}
}
?>