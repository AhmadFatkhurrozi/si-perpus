<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	function auth($nis)
	{
		$this->db->where("NIS = '$nis'");
		$query = $this->db->get('siswa');
		return $query;
	}

	function auth_admin($username, $pass)
	{
		$this->db->where('USERNAME', $username);
		$this->db->where('PASSWORD',md5($pass));
		$query = $this->db->get('petugas');
		return $query;
	}
	
	function tampil_data($table){
		return $this->db->get($table);
	}

	function hapus_data($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	function create($table,$data)
	{
    
    	$query = $this->db->insert($table, $data);
    	return $query;
	}

	function ubah_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function kategori()
	{
		$query = $this->db->query
		(
			'SELECT buku.ID_KATEGORI, kategori.NAMA_KATEGORI, 
				COUNT(buku.ID_KATEGORI) as total FROM kategori

				JOIN buku ON buku.ID_KATEGORI = kategori.ID_KATEGORI

				GROUP BY kategori.NAMA_KATEGORI 
				ORDER BY kategori.ID_KATEGORI ASC 
              '
		);

		return $query;
	}
}

/* End of file M_data.php */
/* Location: ./application/models/M_data.php */