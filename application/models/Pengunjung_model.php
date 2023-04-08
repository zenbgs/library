<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengunjung_model extends CI_Model {

	//Load Database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//Listing pengunjung
	public function listing()
	{
		$query = $this->db->get('data_pengunjung');
		return $query->row();
	}

	public function edit($data)
	{
      $this->db->where('ip', $data['ip']);
      $this->db->update('data_pengunjung', $data);
	}

	public function tambah($data)
	{
		$this->db->insert('data_pengunjung', $data);
	}

    public function total()
    {
        $count = $this->db->count_all_results('data_pengunjung');
        return $count;
    }

    public function totalHariIni()
    {
        $this->db->select('*');
		$this->db->from('data_pengunjung');
		$this->db->where('tanggal',date('Y-m-d'));
		// $this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->num_rows();
    }

	public function cariIp($ip)
	{
		$this->db->select('*');
		$this->db->from('data_pengunjung');
		$this->db->where('ip',$ip);
		// $this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->row();
	}

    public function hitungCariIp($ip){
        $this->db->select('*');
		$this->db->from('data_pengunjung');
		$this->db->where('ip',$ip);
		// $this->db->order_by('id_berita');
		$query = $this->db->get();
		return $query->num_rows();
    }
}
?>