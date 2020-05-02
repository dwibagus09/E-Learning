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
  	$data['list'] = $this->InputUser_model->getAll();
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

   public function tambah2(){
	 
	  $this->template->utama('Admin/v_tambah/v_tambah_user2');
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

	public function tambah_proses2()
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
			
            redirect('page/tambah_siswa/'.$username);
       
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


//=================================================== AWAL DATA KELAS ===============================================================//
	function data_kelas()
	{
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll_kelas();
      $this->template->utama('Admin/v_data/v_data_kelas', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
	}	
  
  public function tambah_jumlah_kelas(){
	 $data['list'] = $this->InputUser_model->getAll_jurusan_distinct();
	  $this->template->utama('Admin/v_tambah/v_tambah_jumlah_kelas',$data);
  }
  
  public function tambah_kelas(){
	 
	  $this->template->utama('Admin/v_tambah/v_tambah_kelas');
  }
 
  public function tambah_proses_kelas()
	{
		$post = $this->input->post();
		$result = array();
		$total_post = count($post['kelas']);
		foreach($post['kelas'] AS $key => $val)
		{
			$result[] = array(
			"kelas" => $post['kelas'][$key],
			"nama_kelas" => $post['nama_kelas'][$key],
			"id_jurusan" => $post['jurusan'][$key]
			
		);
	}
	$this->InputUser_model->save_kelas($result);
	$this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di simpan!</p>');
	redirect('data_kelas');
	}

	public function edit_kelas(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit_kelas($id);
		 $this->template->utama('Admin/v_edit/v_edit_kelas', $data);
	}
	
	public function save_edit_kelas(){
			$id     = $this->input->post('id');
			$kelas = $this->input->post('Kelas');
            

            $data = array(
                'nama_kelas' => $kelas,
            );
       
        $this->InputUser_model->save_edit_data_kelas($id,$data);
    }
	
	function hapus_kelas()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data_kelas($id);
	}
//==================================================== AKHIR DATA KELAS =============================================================//


//==================================================== AWAL PROSES JURUSAN =========================================================//
	
	function data_jurusan(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll_jurusan_distinct();
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
		$post = $this->input->post();
		$result = array();
		$total_post = count($post['jurusan']);
 
		foreach($post['jurusan'] AS $key => $val)
		{
			$result[] = array(
			"nama_jurusan" => $post['jurusan'][$key],
			
		);
	}
	$this->InputUser_model->save_jurusan($result);
	$this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di simpan!</p>');
	redirect('data_jurusan');
	}

	public function edit_jurusan(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit_jurusan($id);
		 $this->template->utama('Admin/v_edit/v_edit_jurusan', $data);
	}
	
	public function save_edit_jurusan(){
			$id     = $this->input->post('id');
			$jurusan = $this->input->post('Jurusan');
            

            $data = array(
                'nama_jurusan' => $jurusan,
            );
       
        $this->InputUser_model->save_edit_data_jurusan($id,$data);
    }
	
	function hapus_jurusan()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data_jurusan($id);
	}
	
	// ========================================== Akhir Proses data Jurusan =========================================== //

	// ========================================= Awal Proses Mengajar =================================//

	function data_mengajar()
	{
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll_mengajar();
      $this->template->utama('Admin/v_data/v_data_mengajar', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
	}	
  
  public function tambah_jumlah_mengajar(){
	  $this->template->utama('Admin/v_tambah/v_tambah_jumlah_mengajar');
  }
  
  public function tambah_mengajar(){
	  $data['list'] = $this->InputUser_model->getAll_guru();
	  $data['kelas'] = $this->InputUser_model->getAll_kelas_dist();
	  $data['list3'] = $this->InputUser_model->getAll_mapel();
	  $this->template->utama('Admin/v_tambah/v_tambah_mengajar',$data);
  }
 
  public function tambah_proses_mengajar()
	{
		$post = $this->input->post();
		$result = array();
		$total_post = count($post['kelas']);
		foreach($post['kelas'] AS $key => $val)
		{
			$result[] = array(
			"id_kelas" => $post['kelas'][$key],
			"id_mapel" => $post['mapel'][$key],
			"nip" => $post['guru'][$key]
			
		);
	}
	$this->InputUser_model->save_mengajar($result);
	$this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di simpan!</p>');
	redirect('data_mengajar');
	}

	public function edit_mengajar(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit_mengajar($id);
		$data['list1'] = $this->InputUser_model->getAll_guru();
	  	$data['kelas'] = $this->InputUser_model->getAll_kelas_dist();
	 	$data['list3'] = $this->InputUser_model->getAll_mapel();
		 $this->template->utama('Admin/v_edit/v_edit_mengajar', $data);
	}
	
	public function save_edit_mengajar(){
			$id = $this->input->post('id');
			$guru     = $this->input->post('guru');
			$kelas = $this->input->post('kelas');
			$mapel = $this->input->post('mapel');
            

            $data = array(
                'nip' => $guru,
                'id_kelas' => $kelas,
                'id_mapel' => $mapel
            );
       
        $this->InputUser_model->save_edit_data_mengajar($id,$data);
    }
	
	function hapus_mengajar()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data_mengajar($id);
	}

	// ========================================= Akhir Proses Mengajar ===============================//

	// ========================================= Awal Proses Mapel ===================================================//

	function data_mapel()
	{
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
		$data['list'] = $this->InputUser_model->getAll_mapel();
      $this->template->utama('Admin/v_data/v_data_mapel', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
	}	
  
  public function tambah_jumlah_mapel(){
	  $this->template->utama('Admin/v_tambah/v_tambah_jumlah_mapel');
  }
  
  public function tambah_mapel(){
	 
	  $this->template->utama('Admin/v_tambah/v_tambah_mapel');
  }
 
  public function tambah_proses_mapel()
	{
		$post = $this->input->post();
		$result = array();
		$total_post = count($post['nama_mapel']);
		foreach($post['nama_mapel'] AS $key => $val)
		{
			$result[] = array(
			"nama" => $post['nama_mapel'][$key],
			
		);
	}
	$this->InputUser_model->save_mapel($result);
	$this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di simpan!</p>');
	redirect('data_mapel');
	}

	public function edit_mapel(){
		$id = $this->uri->segment(3);
		$data['list'] = $this->InputUser_model->edit_mapel($id);
		$this->template->utama('Admin/v_edit/v_edit_mapel', $data);
	}
	
	public function save_edit_mapel(){
			$id     = $this->input->post('id');
			$mapel = $this->input->post('Mapel');
            

            $data = array(
                'nama' => $mapel,
            );
       
        $this->InputUser_model->save_edit_data_mapel($id,$data);
    }
	
	function hapus_mapel()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data_mapel($id);
	}

	// ========================================= Akhir Proses Mapel =================================================//

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
		$this->InputUser_model->delete_data_guru($id);
	}
	// ================================================== Akhir proses Guru =============================================================//
	
	// ================================================ Awal controller Input Siswa ======================================================//
	function data_siswa(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='1'){
    	$data['list1'] = $this->InputUser_model->getkelas();
		
      $this->template->utama('Admin/v_data/v_data_siswa', $data);
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh");
	  window.location="index";
	  </script>';
    }
 
  }
  
  public function tambah_siswa(){
	  $id = $this->uri->segment(3);
	  $data['list'] = $this->InputUser_model->getById($id);
	  $data['list1'] = $this->InputUser_model->getAll_kelas_dist($id);
	  $this->template->utama('Admin/v_tambah/v_tambah_siswa', $data);
  }
 
  public function tambah_proses_siswa()
	{
			$nis = $this->input->post('Nis');
            $nama = $this->input->post('Nama');
            $alamat = $this->input->post('Alamat');
			$jenkel = $this->input->post('Jenkel');
			$kelas = $this->input->post('kelas');
			$no = $this->input->post('no');
			$id = $this->input->post('Id');
			//upload foto
		
            $data = array(
                'nis' => $nis,
                'nama_siswa' => $nama,
                'alamat' => $alamat,
				'jenis_kelamin' => $jenkel,
				'No_Telepon' => $no,
				'id_kelas' => $kelas,
				'id' =>$id
            );
			if (!empty($_FILES['photo']['name'])) {
			$upload = $this->_do1_upload();
			$data['foto'] = $upload;
		}
            $this->InputUser_model->save_guru($data,"tb_siswa");
            
            redirect('Page/data_siswa',$data);
        }
		
			private function _do1_upload()
	{
		$config['upload_path'] 		= 'upload/siswa/';
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
		$data['list1'] = $this->InputUser_model->getAll_kelas_dist();
		$data['list'] = $this->InputUser_model->edit_siswa($id);
		 $this->template->utama('Admin/v_edit/v_edit_siswa', $data);
	}
	
	public function save_edit_siswa(){
			$nis = $this->input->post('Nis');
            $nama = $this->input->post('Nama');
            $alamat = $this->input->post('Alamat');
			$jenkel = $this->input->post('Jenkel');
			$kelas = $this->input->post('kelas');
			$no = $this->input->post('no');
			$id = $this->input->post('Id');
			//upload foto
		
            $data = array(
                'nis' => $nis,
                'nama_siswa' => $nama,
                'alamat' => $alamat,
				'jenis_kelamin' => $jenkel,
				'No_Telepon' => $no,
				'id_kelas' => $kelas,
				'id' =>$id
            );
        $this->InputUser_model->save_edit_data_siswa($id,$data);
    }
	
	function hapus_siswa()
	{
		$id = $this->uri->segment(3);
		$this->InputUser_model->delete_data_siswa($id);
	}
 // ========================================= Akhir Proses Siswa =====================================//
}