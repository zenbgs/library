<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing layanan
	public function listing()
	{
		$query = $this->db->get('layanan');
		return $query->row();
	}

	public function simpan($data)
	{
      $this->db->where('id_layanan', $data['id_layanan']);
      $this->db->update('layanan', $data);
	}
}
?>