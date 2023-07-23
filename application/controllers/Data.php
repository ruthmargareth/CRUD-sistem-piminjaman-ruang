<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
     $this->load->model('M_Admin');
		if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				$url=base_url('login');
				redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['ruangan'] =  $this->db->query("SELECT * FROM tb_ruangan ORDER BY id_ruangan DESC");
        $this->data['title_web'] = 'Data Ruangan';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('ruangan/ruangan_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function ruangandetail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tb_ruangan','id_ruangan',$this->uri->segment('3'));
		if($count > 0)
		{
			$this->data['ruangan'] = $this->M_Admin->get_tableid_edit('tb_ruangan','id_ruangan',$this->uri->segment('3'));
		}else{
			echo '<script>alert("RUANGAN TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Data Ruangan Detail';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('ruangan/detail',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function ruanganedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tb_ruangan','id_ruangan',$this->uri->segment('3'));
		if($count > 0)
		{
			$this->data['ruangan'] = $this->M_Admin->get_tableid_edit('tb_ruangan','id_ruangan',$this->uri->segment('3'));
		}else{
			echo '<script>alert("RUANGAN TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Data Ruangan Edit';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('ruangan/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function ruangantambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

        $this->data['title_web'] = 'Tambah Ruangan';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('ruangan/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}


	public function prosesruangan()
	{
		if(!empty($this->input->get('ruangan_id')))
		{

			$ruangan = $this->M_Admin->get_tableid_edit('tb_ruangan','id_ruangan',htmlentities($this->input->get('ruangan_id')));
			
			$this->M_Admin->delete_table('tb_ruangan','id_ruangan',$this->input->get('ruangan_id'));
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Berhasil Hapus Ruangan !</p>
			</div></div>');
			redirect(base_url('data'));  
		}
		
		if(!empty($this->input->post('tambah')))
		{

			$post= $this->input->post();

			$ruangan_id = $this->M_Admin->buat_kode('tb_ruangan','RG','id_ruangan','ORDER BY id_ruangan DESC LIMIT 1'); 
		
			$data = array(
				'ruangan_id'=>$ruangan_id,
				'gedung' => htmlentities($post['gedung']), 
				'jenis_ruangan'  => htmlentities($post['jenis_ruangan']), 
				'nama_ruangan'=> htmlentities($post['nama_ruangan'])
			);

			$this->db->insert('tb_ruangan', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Ruangan Sukses !</p>
			</div></div>');
			redirect(base_url('data')); 
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
				
			$data = array(
				'gedung' => htmlentities($post['gedung']), 
				'jenis_ruangan'  => htmlentities($post['jenis_ruangan']), 
				'nama_ruangan'=> htmlentities($post['nama_ruangan'])
			);

			$this->db->where('id_ruangan',htmlentities($post['edit']));
			$this->db->update('tb_ruangan', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Ruangan Sukses !</p>
			</div></div>');
			redirect(base_url('data')); 
		}
		
	}
}
