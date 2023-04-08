<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing Berita
	public function listing()
	{
		$this->db->select('berita.*,user.*');
		$this->db->from('berita');
        $this->db->join('user','user.id_user = berita.id_author','LEFT');
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Tambah Berita
	public function tambah($data)
	{
		$this->db->insert('berita', $data);
	}

	//Edit Berita
	public function edit($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->update('berita',$data);
	}

	//Detail Berita
	public function detail($id_berita)
	{
		$this->db->select('*');
		$this->db->from('berita');
		$this->db->where('id_berita',$id_berita);
		$this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}
	//Delete Berita

	public function delete($data)
	{
		$this->db->where('id_berita',$data['id_berita']);
		$this->db->delete('berita',$data);
	}

	//Home Berita
	public function home()
	{
		$this->db->select(	'berita.*,user.*');
		$this->db->from('berita');
		//join
		$this->db->join('user','user.id_user = berita.id_author','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita' => 1));
		//End where
		$this->db->order_by('id_berita','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result();
	}

	//berita
	public function berita($limit, $start)
	{
		$this->db->select(	'berita.*,user.*');
		$this->db->from('berita');
		//join
		$this->db->join('user','user.id_user = berita.id_author','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita' => 1));
		//End where
		$this->db->order_by('id_berita','DESC');
		$this->db->limit($limit,$start);
		$query = $this->db->get();
		return $query->result();
	}

	//Berita Total
	public function total()
	{
		$this->db->select(	'berita.*,user.*');
		$this->db->from('berita');
		//join
		$this->db->join('user','user.id_user = berita.id_author','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita' => 1));
		//End where
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	//Berita read
	public function read($slug_berita)
	{
		$this->db->select(	'berita.*,user.*');
		$this->db->from('berita');
		//join
		$this->db->join('user','user.id_user = berita.id_author','LEFT');
		//End join
		//Where
		$this->db->where(array(	'status_berita'		 => 1,
								'berita.slug_berita' => $slug_berita));
		//End where
		$this->db->order_by('id_berita','DESC');
		$query = $this->db->get();
		return $query->row();
	}

}
?>