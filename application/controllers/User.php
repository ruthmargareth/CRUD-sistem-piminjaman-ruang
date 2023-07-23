<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
        $this->data['user'] = $this->M_Admin->get_table('tb_anggota');

        $this->data['title_web'] = 'Data Anggota ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('user/user_view',$this->data);
        $this->load->view('footer_view',$this->data);
    }

    public function tambah()
    {	
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['user'] = $this->M_Admin->get_table('tb_anggota');
        
        $this->data['title_web'] = 'Tambah Anggota ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('user/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
    }

    public function add()
    {
		$id = $this->M_Admin->buat_kode('tb_anggota','AG','id_anggota','ORDER BY id_anggota DESC LIMIT 1'); 
        $nama_anggota = htmlentities($this->input->post('nama_anggota',TRUE));
        $NIM = htmlentities($this->input->post('NIM',TRUE));
        $jenis_kelamin = htmlentities($this->input->post('jenis_kelamin',TRUE));
        $email = htmlentities($this->input->post('email',TRUE));
		
		$dd = $this->db->query("SELECT * FROM tb_anggota WHERE email = '$email'");
		if($dd->num_rows() > 0)
		{
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Gagal Update User : '.$nama_anggota.' !, Email Anda Sudah Terpakai</p>
			</div></div>');
			redirect(base_url('user/tambah')); 
		}else{
            $data = array(
				'anggota_id' => $id,
                'nama_anggota'=>$nama_anggota,
                'NIM'=>$NIM,
				'jenis_kelamin'=>$jenis_kelamin,
				'email'=>$email
            );
			$this->db->insert('tb_anggota',$data);
			
            $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
            <p> Daftar User telah berhasil !</p>
            </div></div>');
			redirect(base_url('user'));
		}    
      
    }

    public function edit()
    {	
		if($this->uri->segment('3') == '')
		{ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';
		}

		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tb_anggota','id_anggota',$this->uri->segment('3'));

		if($count > 0){			
			$this->data['user'] = $this->M_Admin->get_tableid_edit('tb_anggota','id_anggota',$this->uri->segment('3'));
		}else{
			echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
		}
			
        $this->data['title_web'] = 'Edit Anggota ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('user/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}
	
	public function detail()
    {	
		if($this->uri->segment('3') == '')
		{ 
			echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tb_anggota','id_anggota',$this->uri->segment('3'));

		if($count > 0)
		{			
			$this->data['user'] = $this->M_Admin->get_tableid_edit('tb_anggota','id_anggota',$this->uri->segment('3'));
		}else{
			echo '<script>alert("USER TIDAK DITEMUKAN");window.location="'.base_url('user').'"</script>';
		}		
		
		$this->data['title_web'] = 'Data Anggota Detail';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('user/detail',$this->data);
        $this->load->view('footer_view',$this->data);
    }

    public function upd()
    {
		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
				
			$data = array(
				'nama_anggota' => htmlentities($post['nama_anggota']), 
				'NIM'  => htmlentities($post['NIM']), 
				'jenis_kelamin'=> htmlentities($post['jenis_kelamin']),
				'email'=> htmlentities($post['email'])
			);

			$this->db->where('id_anggota',htmlentities($post['edit']));
			$this->db->update('tb_anggota', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Berhasil Update User !</p>
			</div></div>');
			redirect(base_url('user')); 

		}
	}

    public function del()
    {
        if($this->uri->segment('3') == ''){ echo '<script>alert("halaman tidak ditemukan");window.location="'.base_url('user').'";</script>';}
        
        $user = $this->M_Admin->get_tableid_edit('tb_anggota','id_anggota',$this->uri->segment('3'));
		$this->M_Admin->delete_table('tb_anggota','id_anggota',$this->uri->segment('3'));
		
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
		<p> Berhasil Hapus Angotta !</p>
		</div></div>');
		redirect(base_url('user'));  
    }
}
