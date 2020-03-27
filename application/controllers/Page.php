<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
	$this->load->model('InputUser_model');
	$this->load->library('template');
	$this->load->library('form_validation');
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
  }
  
  
 
  function index(){
    $this->load->view('dashboard');
  }
  
 // Awal Proses data Pengguna
  function data_login(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll();
      $this->template->utama('Admin/v_data/v_data_user', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
  }
  
  public function tambah(){
	  $data['list'] = $this->InputUser_model->getAll();
	  $this->template->utama('Admin/v_tambah/v_tambah_user',$data);
  }
 
  public function tambah_proses()
	{
			$username = $this->input->post('Username');
            $password = $this->input->post('Password');
            $grup = $this->input->post('Akses');

            $data = array(
                'username' => $username,
                'password' => $password,
                'akses' => $grup
            );
            $this->InputUser_model->save($data,"tb_login");
            
            redirect('Page/data_login',$data);
        }

	public function edit(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit($id);
		 $this->template->utama('Admin/v_edit/v_edit_user', $data);
	}
	
	public function save_edit(){
			$id     = $this->input->post('id');
			$username = $this->input->post('Username');
            $password = $this->input->post('Password');
            $grup = $this->input->post('Akses');

            $data = array(
                'username' => $username,
                'password' => $password,
                'akses' => $grup
            );
       
        $this->InputUser_model->save_edit_data($id,$data);
    }
	
	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data($id);
	}
	// Akhir Proses data Pengguna
	
//=====================================================================================================//

	// Awal controller Input Guru
	function data_guru(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll_guru();
      $this->template->utama('Admin/v_data/v_data_guru', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
  }
  
  public function tambah_guru(){
	  $this->template->utama('Admin/v_tambah/v_tambah_guru');
  }
 
  public function tambah_proses_guru()
	{
			$niy = $this->input->post('Niy');
            $nama = $this->input->post('Nama');
            $alamat = $this->input->post('Alamat');
			$jenkel = $this->input->post('Jenkel');
			
			//upload foto
		
            $data = array(
                'nip' => $niy,
                'nama_guru' => $nama,
                'alamat' => $alamat,
				'jenis_kelamin' => $jenkel,
            );
			if (!empty($_FILES['photo']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}
            $this->InputUser_model->save_guru($data,"tb_guru");
            
            redirect('Page/data_guru',$data);
        }
		
			private function _do_upload()
	{
		$config['upload_path'] 		= 'upload/guru/';
		$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
		$config['max_size'] 			= 2048;
		$config['max_widht'] 			= 1000;
		$config['max_height']  		= 1000;
		$config['file_name'] 			= round(microtime(true)*1000);
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('photo')) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('',''));
			redirect('welcome');
		}
		return $this->upload->data('file_name');
	}

	public function edit_guru(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit_guru($id);
		 $this->template->utama('Admin/v_edit/v_edit_user', $data);
	}
	
	public function save_edit_guru(){
			$id     = $this->input->post('id');
			$username = $this->input->post('Username');
            $password = $this->input->post('Password');
            $grup = $this->input->post('Akses');

            $data = array(
                'username' => $username,
                'password' => $password,
                'akses' => $grup
            );
       
        $this->InputUser_model->save_edit_data_guru($id,$data);
    }
	
	function hapus_guru()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data($id);
	}
	// Akhir proses Guru

}