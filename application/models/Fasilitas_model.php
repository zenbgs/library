<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fasilitas_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('fasilitas');
		$this->db->order_by('id_fasilitas','DESC');
		$query = $this->db->get();
		return $query->result();
	}

}
?>