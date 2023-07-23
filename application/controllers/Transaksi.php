<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
		$this->data['CI'] =& get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		$this->load->library(array('cart'));
		if($this->session->userdata('masuk_sistem_rekam') != TRUE){
			$url=base_url('login');
			redirect($url);
		}
	 }
	 
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function index()
	{	
		$this->data['title_web'] = 'Data Pinjam Ruangan ';
		$this->data['idbo'] = $this->session->userdata('ses_id');
	
		$this->data['pinjam'] = $this->db->query("SELECT DISTINCT `pinjam_id`, `tanggal_pinjam`, 
			`waktu_pinjam`, `waktu_selesai`, `anggota_id`, `deskripsi`, `ruangan_id` 
			FROM tb_pinjam ORDER BY pinjam_id DESC");
		
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/pinjam_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function pinjam()
	{	
		$this->data['nop'] = $this->M_Admin->buat_kode('tb_pinjam','PJ','id_pinjam','ORDER BY id_pinjam DESC LIMIT 1'); 
		$this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['user'] = $this->M_Admin->get_table('tb_anggota');
		$this->data['ruangan'] =  $this->db->query("SELECT * FROM tb_ruangan ORDER BY id_ruangan DESC");

		$this->data['title_web'] = 'Tambah Pinjam Ruangan ';

		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/tambah_view',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function detailpinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');		
		$id = $this->uri->segment('3');

		$count = $this->M_Admin->CountTableId('tb_pinjam','pinjam_id',$id);
			if($count > 0)
			{
				$this->data['pinjam'] = $this->db->query("SELECT DISTINCT`pinjam_id`, `tanggal_pinjam`, 
					`waktu_pinjam`, `waktu_selesai`, `anggota_id`, `deskripsi`, `ruangan_id` 
					FROM tb_pinjam WHERE pinjam_id = '$id'")->row();
			}else{
				echo '<script>alert("DETAIL TIDAK DITEMUKAN");window.location="'.base_url('transaksi').'"</script>';
			}

		$this->data['sidebar'] = 'kembali';
		$this->data['title_web'] = 'Detail Pinjam Buku ';
		$this->load->view('header_view',$this->data);
		$this->load->view('sidebar_view',$this->data);
		$this->load->view('pinjam/detail',$this->data);
		$this->load->view('footer_view',$this->data);
	}

	public function prosespinjam()
	{
		$post = $this->input->post();

		if(!empty($post['tambah']))
		{
			{
				$data[] = array(
					'pinjam_id'=>htmlentities($post['nopinjam']), 
					'tanggal_pinjam'=>htmlentities($post['tanggal_pinjam']), 
					'waktu_pinjam'=>htmlentities($post['waktu_pinjam']), 
					'waktu_selesai'=>htmlentities($post['waktu_selesai']), 
					'anggota_id'=>htmlentities($post['anggota_id']), 
					'deskripsi'=>htmlentities($post['deskripsi']), 
					'ruangan_id'=>htmlentities($post['ruangan_id']),
				);
			}
			$total_array = count($data);
			if($total_array != 0)
			{
				$this->db->insert_batch('tb_pinjam',$data);

				$cart = array_values(unserialize($this->session->userdata('cart')));
				for ($i = 0; $i < count($cart); $i ++){
				  unset($cart[$i]);
				}
			}

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pinjam Ruangan Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 
		}

		if($this->input->get('pinjam_id'))
		{
			$this->M_Admin->delete_table('tb_pinjam','pinjam_id',$this->input->get('pinjam_id'));

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p>  Hapus Pinjam Ruangan Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 
		}

	}

	public function result()
    {	
		
		$user = $this->M_Admin->get_tableid_edit('tb_anggota','anggota_id',$this->input->post('kode_anggota'));
		error_reporting(0);
		if($user->nama_anggota != null)
		{
			echo '<table class="table">
						<tr>
							<td>Nama Anggota</td>
							<td>:</td>
							<td>'.$user->nama_anggota.'</td>
						</tr>
						<tr>
							<td>NIM</td>
							<td>:</td>
							<td>'.$user->NIM.'</td>
						</tr>
						<tr>
							<td>Jenis Kelamin</td>
							<td>:</td>
							<td>'.$user->jenis_kelamin.'</td>
						</tr>
						<tr>
							<td>email</td>
							<td>:</td>
							<td>'.$user->email.'</td>
						</tr>
					</table>';
		}else{
			echo 'Anggota Tidak Ditemukan !';
		}
        
	}

	public function result_ruangan()
    {	
		
		$ruangan = $this->M_Admin->get_tableid_edit('tb_ruangan','ruangan_id',$this->input->post('kode_ruangan'));
		error_reporting(0);
		if($ruangan->nama_ruangan != null)
		{
			echo '<table class="table">
						<tr>
							<td>Gedung</td>
							<td>:</td>
							<td>'.$ruangan->gedung.'</td>
						</tr>
						<tr>
							<td>Jenis Ruangan</td>
							<td>:</td>
							<td>'.$ruangan->jenis_ruangan.'</td>
						</tr>
						<tr>
							<td>Nama Ruangan</td>
							<td>:</td>
							<td>'.$ruangan->nama_ruangan.'</td>
						</tr>
					</table>';
		}else{
			echo 'Ruangan Tidak Ditemukan !';
		}
        
	}

}
