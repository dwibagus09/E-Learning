<?php
class Page_guru extends CI_Controller{
  function __construct(){
    parent:: __construct();
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


  //Function Guru Sidebar
  function data_materi(){
    $data['materi'] = $this->Guru_model->getMateri();
    $this->template->utama('Guru/v_data/v_materi',$data);
  }

  function tambah(){
  	$id = $this->uri->segment(3);
  	$data['list1'] = $this->Guru_model->getAll_kelas_dist($id);
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
  function tambah_materi(){
    		$kelas = $this->input->post('kelas');
			$nam_materi = $this->input->post('nama_materi');
			$id = $this->input->post('Id');
			//upload foto
		
            $data = array(
                'nama_materi' => $nam_materi,
                'id_kelas' => $kelas,
				'id_mengajar' =>$id,
            );
			if (!empty($_FILES['materi']['name'])) {
			$upload = $this->_do_upload();
			$data['file_materi'] = $upload;
		}
            $this->Guru_model->save($data,"tb_materi");
            
            redirect('Page_guru/data_materi',$data);
        }
		
			private function _do_upload()
	{
		$config['upload_path'] 		= 'upload/Materi/';
		$config['allowed_types'] 	= 'pdf|xls|doc|ppt';
		$config['max_size'] 			= 2048;
		$config['file_name'] 			= round(microtime(true)*1000);
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('materi')) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('',''));
			redirect('data_materi');
		}
		return $this->upload->data('file_name');
	}
  

  function download(){
  	$name = $this->uri->segment(3);
	  $data = file_get_contents("upload/Materi".$name);
	  force_download($name, $data);
  }
}
?>