<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prosedur_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing prosedur
	public function listing()
	{
		$query = $this->db->get('prosedur');
		return $query->row();
	}

	public function simpan($data)
	{
      $this->db->where('id_prosedur', $data['id_prosedur']);
      $this->db->update('prosedur', $data);
	}
}
?>