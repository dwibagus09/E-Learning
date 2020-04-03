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
    $this->template->utama('dashboard');
  }
  
 // =========================================== Awal Proses data Pengguna =========================================//
 // note : akses 1 = admin , 2 = guru , 3 = siswa
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
	 
	  $this->template->utama('Admin/v_tambah/v_tambah_user');
  }
 
  public function tambah_proses()
	{
			$username = $this->input->post('Username',TRUE);
            $password = $this->input->post('Password',TRUE);
            $grup = $this->input->post('Akses');
            $data = array(
                'username' => $username,
                'password' => $password,
                'akses' => $grup
            );
            $this->InputUser_model->save($data,"tb_login");
            redirect('page/tambah_guru/'.$username);
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
//================================================ Akhir Proses data Pengguna =====================================================//

//==================================================== AWAL PROSES JURUSAN =========================================================//
	
	function data_jurusan(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll_jurusan();
      $this->template->utama('Admin/v_data/v_data_jurusan', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
  }
  
  public function tambah_jumlah_jurusan(){
	 
	  $this->template->utama('Admin/v_tambah/v_tambah_jumlah_jurusan');
  }
  
  public function tambah_jurusan(){
	 
	  $this->template->utama('Admin/v_tambah/v_tambah_jurusan');
  }
 
  public function tambah_proses_jurusan()
	{
			$jurusan = $this->input->post('jurusan',TRUE);
            $data = array();
            $this->InputUser_model->save_jurusan($data,"tb_jurusan");
            redirect('Page/data_jurusan',$data);
        }

	public function edit_jurusan(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit($id);
		 $this->template->utama('Admin/v_edit/v_edit_user', $data);
	}
	
	public function save_edit_jurusan(){
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
	
	function hapus_jurusan()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data_jurusan($id);
	}
	
	// ========================================== Akhir Proses data Jurusan ===========================================

	// ========================================== Awal controller Input Guru ===========================================
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
	  $id = $this->uri->segment(3);
	  $data['list'] = $this->InputUser_model->getById($id);
	  $this->template->utama('Admin/v_tambah/v_tambah_guru', $data);
  }
 
  public function tambah_proses_guru()
	{
			$niy = $this->input->post('Niy');
            $nama = $this->input->post('Nama');
            $alamat = $this->input->post('Alamat');
			$jenkel = $this->input->post('Jenkel');
			$id = $this->input->post('Id');
			//upload foto
		
            $data = array(
                'nip' => $niy,
                'nama_guru' => $nama,
                'alamat' => $alamat,
				'jenis_kelamin' => $jenkel,
				'id' =>$id,
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
			redirect('data_guru');
		}
		return $this->upload->data('file_name');
	}

	public function edit_guru(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit_guru($id);
		 $this->template->utama('Admin/v_edit/v_edit_guru', $data);
	}
	
	public function save_edit_guru(){
			$niy = $this->input->post('Niy');
            $nama = $this->input->post('Nama');
            $alamat = $this->input->post('Alamat');
			$jenkel = $this->input->post('Jenkel');
			$id = $this->input->post('Id');

            $data = array(
                'nip' => $niy,
                'nama_guru' => $nama,
                'alamat' => $alamat,
				'jenis_kelamin' => $jenkel,
				'id' =>$id,
            );
       
        $this->InputUser_model->save_edit_data_guru($id,$data);
    }
	
	function hapus_guru()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data($id);
	}
	// ================================================== Akhir proses Guru =============================================================//
	
	// ================================================ Awal controller Input Siswa ======================================================//
	function data_siswa(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll_siswa();
      $this->template->utama('Admin/v_data/v_data_siswa', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
  }
  
  public function tambah_siswa(){
	  $id = $this->uri->segment(3);
	  $data['list'] = $this->InputUser_model->getById_siswa($id);
	  $this->template->utama('Admin/v_tambah/v_tambah_siswa', $data);
  }
 
  public function tambah_proses_siswa()
	{
			$niy = $this->input->post('Nis');
            $nama = $this->input->post('Nama');
            $alamat = $this->input->post('Alamat');
			$jenkel = $this->input->post('Jenkel');
			$id = $this->input->post('Id');
			//upload foto
		
            $data = array(
                'nip' => $niy,
                'nama_guru' => $nama,
                'alamat' => $alamat,
				'jenis_kelamin' => $jenkel,
				'id' =>$id,
            );
			if (!empty($_FILES['photo']['name'])) {
			$upload = $this->_do1_upload();
			$data['foto'] = $upload;
		}
            $this->InputUser_model->save_guru($data,"tb_guru");
            
            redirect('Page/data_siswa',$data);
        }
		
			private function _do1_upload()
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

	public function edit_siswa(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit_siswa($id);
		 $this->template->utama('Admin/v_edit/v_edit_siswa', $data);
	}
	
	public function save_edit_siswa(){
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
	
	function hapus_siswa()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data_siswa($id);
	}
 // ========================================= Akhir Proses Siswa =====================================//
}