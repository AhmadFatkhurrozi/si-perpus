<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

 		$this->load->library('session');
		$this->load->helper('me');
		$this->load->model('M_data');
		$this->load->helper(array('form', 'url'));

		//	Load library
		$config['first_link']      = 'Pertama';
		$config['last_link']       = 'Terakhir';
		$config['next_link']       = 'Selanjutnya';
		$config['prev_link']       = 'Sebelumnya';
		$config['full_tag_open']   = '<nav><ul class="pagination justify-content-end">';
		$config['full_tag_close']  = '</ul></nav>';
		$config['num_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']   = '</span></li>';
		$config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']   = '</span></li>';
		$config['next_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '</span></li>';
		$config['prev_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']  = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';

		$this->load->library('pagination', $config);
	}

	public function is__login()
	{
		if ($this->session->userdata('__admin_id')=='' and $this->session->userdata('__admin_nama')=='') {

			$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i>Silahkan memasukkan NIS terlebih dahulu</span>
				</p');

			redirect(base_url('siswa'));
		}
	}

	public function kembali()
	{

		return $this->input->server('HTTP_REFERER');
	}

	public function index()
	{
		$this->load->view('admin/login');
	}

	function login()
	{
		$username 	= $this->input->post('username');
		$pass		= $this->input->post('password');

		$cek = $this->M_data->auth_admin($username, $pass);

		if( $cek->num_rows() != 0 ){

			$id = $cek->row()->ID_PETUGAS;
			
			$query_petugas = $this->db->where('ID_PETUGAS', $id)->get('petugas');

			if( $query_petugas->num_rows() != 0 )
			{
				$array = array(
					'__admin_id' 		=> $id,
					'__admin_nama' 		=> $query_petugas->row()->NAMA_PETUGAS,
					'__admin_alamat'	=> $query_petugas->row()->ALAMAT,
				);
				
				$this->session->set_userdata( $array );

				redirect(base_url("admin/dashboard"),'refresh');

			}
		}
		else
		{
			$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i>Upps! username atau password Salah.</span>
				</p');	
			
			redirect( $this->kembali() );
		}
	}

	function dashboard()
	{
		$data['judul'] 	 = "Dashboard";
		$data['konten']  = $this->load->view('admin/dashboard', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}



	// --------------------------------- Manage Data Kelas-----------------------------------------------

	function kelas()
	{
		$data['judul'] 	 	= "Data Kelas";
		$data['query_kls']	= $this->M_data->tampil_data('kelas');
		$data['konten']  	= $this->load->view('admin/kelas/kelas', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	function tambahKelas()
	{
		$data['judul'] 	 = "Tambah Data Kelas";
		$data['konten']  = $this->load->view('admin/kelas/tambah', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	function tambahkanKelas()
	{
		$id = 'KLS'.date('YmdHis');
		$kls = array(
			'ID_KELAS' 		=> $id,
			'KELAS'      	=> $this->input->post('kelas') ,
        );

		$this->M_data->create('kelas', $kls);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil menambah data!</span>
				</div>');

		redirect(base_url('admin/kelas'));
	}

	public function hapusKelas($id)
	{
		$where = array('ID_KELAS' => $id);
		$this->M_data->hapus_data($where,'kelas');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Hapus Data Berhasil!</span>
				</div>');

		redirect( $this->kembali() );
	}

	function editKelas($id)
	{
		$data['judul'] 	 		= "Edit Data Kelas";
		$data['query_kelas']	= $this->db->where('ID_KELAS', $id)->get('kelas');
		$data['konten']  		= $this->load->view('admin/kelas/edit', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	function ubahKelas()
	{
		$id  = $this->input->post('id_kelas');

		$kls = array( 'KELAS' => $this->input->post('kelas'));

        $where = array('ID_KELAS' => $id );

		$this->M_data->ubah_data($where, $kls,'kelas');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil Mengubah data!</span>
				</div>');

		redirect(base_url('admin/kelas'));
	}


	// ----------------------------------------  Manage Data Siswa ------------------------------------------

	function siswa()
	{
		$data['judul'] 	 	= "Data Siswa";
		$data['query_siswa']= $this->db->join('kelas', 'kelas.ID_KELAS = siswa.ID_KELAS')
									   ->get('siswa');
		$data['konten']  	= $this->load->view('admin/siswa/siswa', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}
	
	function tambahSiswa()
	{
		$data['judul'] 	 	= "Tambah Data Siswa";
		$data['query_kelas']= $this->M_data->tampil_data('kelas');
		$data['konten']  	= $this->load->view('admin/siswa/tambah', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	function tambahkanSiswa()
	{
		$siswa = array(
			'NIS' 			=> $this->input->post('nis'),
			'ID_KELAS'  	=> $this->input->post('kelas') ,
			'NAMA' 			=> $this->input->post('nama'),
			'JK' 			=> $this->input->post('jk'),
			'TEMPAT_LAHIR' 	=> $this->input->post('tmp'),
			'TGL_LAHIR' 	=> $this->input->post('tgl'),
			'NO_HP' 		=> $this->input->post('hp'),
			'ALAMAT' 		=> $this->input->post('alamat'),
        );

		$this->M_data->create('siswa', $siswa);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil menambah data!</span>
				</div>');

		redirect(base_url('admin/siswa'));
	}

	function editSiswa($id)
	{
		$data['judul'] 	 		= "Edit Data Siswa";
		$data['query_siswa']	= $this->db->where('NIS', $id)->get('siswa');
		$data['query_kelas']	= $this->db->get('kelas');
		$data['konten']  		= $this->load->view('admin/siswa/edit', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	function ubahSiswa()
	{
		$id  = $this->input->post('nis');

		$siswa = array( 
			'ID_KELAS' 		=> $this->input->post('kelas'),
			'NAMA' 			=> $this->input->post('nama'),
			'JK' 			=> $this->input->post('jk'),
			'TEMPAT_LAHIR' 	=> $this->input->post('tmp'),
			'TGL_LAHIR' 	=> $this->input->post('tgl'),
			'NO_HP' 		=> $this->input->post('hp'),
			'ALAMAT' 		=> $this->input->post('alamat'),
		);

        $where = array('NIS' => $id );

		$this->M_data->ubah_data($where, $siswa,'siswa');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil Mengubah data!</span>
				</div>');

		redirect(base_url('admin/siswa'));
	}

	public function hapusSiswa($id)
	{
		$where = array('NIS' => $id);
		$this->M_data->hapus_data($where,'siswa');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Hapus Data Berhasil!</span>
				</div>');

		redirect( $this->kembali() );
	}

	// ---------------------------- Data RAK ------------------------------------------

	function rak()
	{
		$data['judul'] 	 	= "Data Rak Buku";
		$data['query_rak']	= $this->db->get('rak');
		$data['konten']  	= $this->load->view('admin/rak/rak', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	// ---------------------------- Data Buku ------------------------------------------

	function buku()
	{
		$data['judul'] 	 	= "Data Buku";
		$data['query_buku']	= $this->db->get('buku');
		$data['konten']  	= $this->load->view('admin/buku/buku', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	// ---------------------------- Peminjaman ----------------------------------------

	function peminjaman()
	{
		$data['judul'] 	 		= "Data Peminjaman";
		$data['query_pinjam']	= $this->db->where('STATUS_HISTORY', 'menunggu')
										   ->join('buku', 'buku.ID_BUKU = peminjaman.ID_BUKU')
										   ->join('history', 'history.ID_PEMINJAMAN = peminjaman.ID_PEMINJAMAN')
										   ->get('peminjaman');
		$data['konten']  		= $this->load->view('admin/peminjaman/lihat', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	function validasiPinjam($id)
	{
		$data = array( 
			'TGL_PINJAM' 		=>  date('Ymd') ,
			'TGL_KEMBALI' 		=>  date('Ymd', strtotime('+6 days')),
		);

	 	$log = array( 
        	'TGL_PINJAM'   		=> date('Ymd') ,
        	'STATUS_HISTORY'	=> 'dipinjam'
        );

        $where = array('ID_PEMINJAMAN' => $id );

		$this->M_data->ubah_data($where, $data,'peminjaman');
		$this->M_data->ubah_data($where, $log,'history');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil Mengubah data!</span>
				</div>');

		redirect(base_url('admin/peminjaman'));
	}

	// ------------------------------- KEMBALI ---------------------------------------

	function pengembalian()
	{
		$data['judul'] 	 		= "Data Pengembalian";
		$data['query_pinjam']	= $this->db->where('STATUS_HISTORY', 'dipinjam')
										   ->join('buku', 'buku.ID_BUKU = peminjaman.ID_BUKU')
										   ->join('history', 'history.ID_PEMINJAMAN = peminjaman.ID_PEMINJAMAN')
										   ->get('peminjaman');
		$data['konten']  		= $this->load->view('admin/peminjaman/kembali', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	function kembalikan($id)
	{
		$id_buku = $this->uri->segment(4);
		$where = array('ID_PEMINJAMAN' => $id );

		$log = array( 
        	'STATUS_HISTORY'	=> 'dikembalikan'
        );

		$this->db->query('UPDATE buku SET STOK = STOK+1 WHERE ID_BUKU='."'".$id_buku."'");
        $this->db->where('ID_PEMINJAMAN', $id)->delete('peminjaman');
		$this->M_data->ubah_data($where, $log,'history');

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil Mengubah data!</span>
				</div>');

		redirect(base_url('admin/pengembalian'));
	}

	function tambahDenda($id)
	{
		$terakhir =new DateTime($this->uri->segment(4));
    	$today    =new DateTime();

		$diff	  =	$today->diff($terakhir);
		$hari     = $diff->d;

		$object = array(
			'ID_PEMINJAMAN' => $id,
			'JUMLAH_DENDA'	=> 500*$hari,
		);

		$this->db->insert('denda', $object);

		$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> Berhasil Menambah data!</span>
				</div>');

		redirect(base_url('admin/pengembalian'));
	}

	function history()
	{
		$data['judul'] 	 		= "History Peminjaman";
		$data['query_pinjam']	= $this->db->join('buku', 'buku.ID_BUKU = history.ID_BUKU')
										   ->get('history');
		$data['konten']  		= $this->load->view('admin/peminjaman/history', $data, TRUE);

		$this->load->view('admin/master', $data, FALSE);
	}

	// --------------------------------------------------------------------------------

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

}
