<?php
class Page_guru extends CI_Controller{
  function __construct(){
    parent::__construct();
	$this->load->model('Guru_model');
	$this->load->library('template');
	$this->load->library('form_validation');
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
  } 
  public function index(){
    $this->template->utama('dashboard');
  }


  public function data_materi(){

  //Function Guru Utama
  function index(){
    $this->template->utama('dashboard');
  }

  //Function Guru Sidebar
  function data_materi(){
    $data['materi'] = $this->Guru_model->getMateri();
    $this->template->utama('Guru/v_data/v_materi',$data);
  }

  public function tambah(){
  	$id = $this->uri->segment(3);
	$data['list'] = $this->Guru_model->getById($id);
  	$this->template->utama('Guru/v_tambah/v_tambah_materi',$data);
  }
  
  function data_tugas(){
	  $data['tugas'] = $this->Guru_model->getTugas();
	  $this->template->utama('Guru/v_data/v_tugas',$data);
  }

  function data_nilai(){
	  $data['nilai'] = $this->Guru_model->getNilai();
	  $this->template->utama('Guru/v_data/v_nilai',$data);
  }


  //Function Prosses Guru
  public function tambah_materi(){
    
			$nama_materi = $this->input->post('nama_materi');
			$id = $this->input->post('Id');
			//upload foto
		
            $data = array(
                'nip' => $nama_materi,
				'id' =>$id,
            );
			if (!empty($_FILES['photo']['name'])) {
			$upload = $this->_do_upload();
			$data['foto'] = $upload;
		}
            $this->Guru_model->save($data,"tb_materi");
            
            redirect('Page_guru/data_materi',$data);
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
  

  function download(){

  }
}
?>