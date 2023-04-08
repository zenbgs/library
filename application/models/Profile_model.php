<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing profile
	public function listing()
	{
		$query = $this->db->get('profile');
		return $query->row();
	}

	public function simpan($data)
	{
      $this->db->where('id_profile', $data['id_profile']);
      $this->db->update('profile', $data);
	}
}
?>