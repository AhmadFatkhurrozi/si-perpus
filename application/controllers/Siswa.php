<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
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
		if ($this->session->userdata('__siswa_nis')=='' and $this->session->userdata('__siswa_nama')=='') {

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
		$data['judul'] = "SI PERPUS";
		$data['footer']  = $this->load->view('siswa/footer', $data, TRUE);

		$this->load->view('home', $data, FALSE);
	}

	public function cekNis()
	{
		$nis = $this->input->post('nis');

		$cek = $this->M_data->auth($nis);

		if( $cek->num_rows() != 0 ){

			$id = $cek->row()->NIS;
			
			$query_siswa = $this->db->where('NIS', $id)->get('siswa');


			if( $query_siswa->num_rows() != 0 )
			{
				$array = array(
					'__siswa_nis' 		=> $id,
					'__siswa_nama'		=> $query_siswa->row()->NAMA,
					'__siswa_hp' 		=> $query_siswa->row()->NO_HP,
				);
				
				$this->session->set_userdata( $array );

				redirect(base_url("siswa/dashboard"),'refresh');

			}
		}
		else
		{
			$this->session->set_flashdata('msg', 
				'<p class="text-danger" style="margin-top: 10px;">
					<span><i class="fa fa-times"></i>Upps! NIS Salah.</span>
				</p');	
			
			redirect( $this->kembali() );
		}
	}

	public function dashboard()
	{
		$this->is__login();

		$data['judul'] 			= "Data Buku";
		$data['query_kategori'] = $this->M_data->kategori();
		$data['query_buku'] 	= $this->M_data->tampil_data('buku');
		$data['konten'] 		= $this->load->view('siswa/buku', $data, TRUE);		
		$data['header'] 		= $this->load->view('siswa/header', $data, TRUE);
		$data['footer']  		= $this->load->view('siswa/footer', $data, TRUE);

		$this->load->view('siswa/master', $data, FALSE);
	}

	public function bukuKat($id)
	{
		$this->is__login();

		$data['judul'] 			= $this->uri->segment(3);	
		$data['query_kategori'] = $this->M_data->kategori();
		$data['query_buku']		= $this->db->where('ID_KATEGORI', $id)
										   ->get('buku');
		$data['konten'] 		= $this->load->view('siswa/bukuKat', $data, TRUE);		
		$data['header'] 		= $this->load->view('siswa/header', $data, TRUE);
		$data['footer']  		= $this->load->view('siswa/footer', $data, TRUE);

		$this->load->view('siswa/master', $data, FALSE);	
	}

	// ----------------------------- PEMINJAMAN ---------------------------------

	function peminjaman()
	{
		$this->is__login();

		$data['judul'] 			= "Data Peminjaman";
		$data['query_kategori'] = $this->M_data->kategori();
		$data['query_pinjam'] 	= $this->db->where('peminjaman.NIS', $this->session->userdata('__siswa_nis'))
										   ->join('buku', 'buku.ID_BUKU = peminjaman.ID_BUKU')
										   ->join('history', 'history.ID_PEMINJAMAN = peminjaman.ID_PEMINJAMAN')
										   ->join('rak', 'rak.ID_RAK = buku.ID_RAK')
										   ->get('peminjaman');

		$data['konten'] 		= $this->load->view('siswa/peminjaman/lihat', $data, TRUE);
		$data['header'] 		= $this->load->view('siswa/header', $data, TRUE);
		$data['footer']  		= $this->load->view('siswa/footer', $data, TRUE);

		$this->load->view('siswa/master', $data, FALSE);
	}

	function pinjam($id)
	{
		$nis 	  = $this->session->userdata('__siswa_nis');

		$where = $this->db->where('NIS', $nis )
						  ->where('ID_BUKU', $id)
						  ->get('peminjaman');
		
		if ($where->num_rows() == 0 ) {

			$id_pinjam = 'PJ'.date('YmdHis'); 

			$pinjam = array(
				'ID_PEMINJAMAN'    	=> $id_pinjam , 
				'NIS'   			=> $nis ,
				'ID_BUKU'   		=> $id
	        );

	        $log = array(
	        	'NIS'   			=> $nis ,
	        	'ID_PEMINJAMAN'		=> $id_pinjam, 
	        	'ID_BUKU'   		=> $id ,
	        	'STATUS_HISTORY'	=> 'Menunggu'
	        );

	        $this->db->query('UPDATE buku SET STOK = STOK-1 WHERE ID_BUKU='."'".$id."'");
            $this->M_data->create('peminjaman', $pinjam);
            $this->M_data->create('history', $log);

			$this->session->set_flashdata('msg', 
				'<div class="alert alert-success" style="margin-top: 10px;">
					<span><i class="fa fa-check"></i> berhasil meminjam!</span>
				</div>');

			redirect( $this->kembali() );

		}
	}

	function denda()
	{
		$this->is__login();

		$data['judul'] 			= "Denda";
		$data['query_kategori'] = $this->M_data->kategori();
		$data['query_pinjam'] 	= $this->db->where('peminjaman.NIS', $this->session->userdata('__siswa_nis'))
										   ->join('buku', 'buku.ID_BUKU = peminjaman.ID_BUKU')
										   ->join('history', 'history.ID_PEMINJAMAN = peminjaman.ID_PEMINJAMAN')
										   ->join('denda', 'denda.ID_PEMINJAMAN = peminjaman.ID_PEMINJAMAN')
										   ->get('peminjaman');

		$data['konten'] 		= $this->load->view('siswa/peminjaman/denda', $data, TRUE);
		$data['header'] 		= $this->load->view('siswa/header', $data, TRUE);
		$data['footer']  		= $this->load->view('siswa/footer', $data, TRUE);

		$this->load->view('siswa/master', $data, FALSE);
	}


	// -----------------------  HISTORY  ----------------------------


	function history()
	{
		$this->is__login();

		$data['judul'] 			= "Riwayat Peminjaman";
		$data['query_kategori'] = $this->M_data->kategori();
		$data['query_pinjam'] 	= $this->db->where('history.NIS', $this->session->userdata('__siswa_nis'))
										   ->join('buku', 'buku.ID_BUKU = history.ID_BUKU')
										   ->get('history');

		$data['konten'] 		= $this->load->view('siswa/peminjaman/history', $data, TRUE);
		$data['header'] 		= $this->load->view('siswa/header', $data, TRUE);
		$data['footer']  		= $this->load->view('siswa/footer', $data, TRUE);

		$this->load->view('siswa/master', $data, FALSE);
	}


	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

}
