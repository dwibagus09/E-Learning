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
  
  
 
  function index(){
    $this->template->utama('dashboard');
  }


  function data_materi(){
    $data['materi'] = $this->Guru_model->getMateri();
    $this->template->utama('Guru/v_data/v_materi',$data);
  }

  public function tambah_materi(){
    
			$nama_materi = $this->input->post('nama_materi');
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
  

  function download(){

  }
}
?>