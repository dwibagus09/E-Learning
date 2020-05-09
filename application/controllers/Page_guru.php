<?php
class Page_guru extends CI_Controller{
  function __construct(){
    parent:: __construct();
	$this->load->model('Guru_model');
	$this->load->library('template');
  $this->load->library('form_validation');
  $this->load->helper('download');
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
  } 
  public function index(){
    $this->template->utama('dashboard');
  }

//==================================== Untuk Proses Upload Materi =======================================//
  
  public function data_materi(){
    $id = $this->uri->segment(3);
    $data['materi'] = $this->Guru_model->getMateri($id);
    $this->template->utama('Guru/v_data/v_materi',$data);
  }

  public function tambah(){
  	$id = $this->uri->segment(3);
  	$data['list1'] = $this->Guru_model->getAll_kelas_dist($id);
	  $data['list'] = $this->Guru_model->getById($id);
    $this->template->utama('Guru/v_tambah/v_tambah_materi',$data);
  }
  
 
  public function tambah_materi(){
    	$kelas = $this->input->post('kelas');
			$nam_materi = $this->input->post('nam_materi');
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
  

  public function download(){
  	$name = $this->uri->segment(3);
	  $data = file_get_contents(base_url().'upload/Materi/'.$name);
	  force_download($name, $data);
  }
  // ======================= Akhir Proses Upload Materi ==============================//

  
  
  
  // ======================= Awal Proses Upload Tugas ===============================//

  public function data_tugas(){
    $id = $this->uri->segment(3);
    $data['tugas'] = $this->Guru_model->getTugas($id);
    $this->template->utama('Guru/v_data/v_tugas',$data);
  }

  public function tambah_tugas(){
    $id = $this->uri->segment(3);
  	$data['kelas_dist'] = $this->Guru_model->getAll_kelas_dist($id);
	  $data['get_id'] = $this->Guru_model->getById($id);
  	$this->template->utama('Guru/v_tambah/v_tambah_tugas',$data);
  }

  public function proses_tambah_tugas(){
      // $kelas = $this->input->post('kelas');
      // $nama_tugas = $this->input->post('nam_materi');
      $id_tugas = $this->input->post('id_tugas');
      $kode_tugas = $this->input->post('kode_tugas');
      $deskripsi = $this->input->post('deskripsi');
      $start = $this->input->post('start');
      $end = $this->input->post('end');
			$id = $this->input->post('Id');
			//upload tugas
		
            $data = array(
                'id_tugas'=>$id_tugas,
                'kd_tugas'=>$kode_tugas,
                'deskripsi'=>$deskripsi,
                'waktu_mulai'=>$start,
                'waktu_selesai'=>$end,
                // 'nama_materi' => $nam_materi,
                // 'id_kelas' => $kelas,
				        'id_mengajar' =>$id,
            );
			if (!empty($_FILES['tugas']['name'])) {
			$upload = $this-> do_upload();
			$data['file_tugas'] = $upload;
		}
            $this->Guru_model->save($data,"tb_tugas");
            
            redirect('Page_guru/data_tugas',$data);
        }
		
			private function do_upload()
	{
		$config['upload_path'] 		= 'upload/Tugas/';
		$config['allowed_types'] 	= 'pdf|xls|doc|ppt';
		$config['max_size'] 			= 2048;
		$config['file_name'] 			= round(microtime(true)*1000);
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('tugas')) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('',''));
			redirect('data_tugas');
		}
		return $this->upload->data('file_name');
  }
  // =============================AKhir Proses Upload Tugas=====================//

  
  
  
  
  // ======================= Awal Proses Upload Ujian ===========================//
  public function data_ujian(){
    $data['ujian'] = $this->Guru_model->getUjian();
    $this->template->utama('Guru/v_data/v_data_ujian',$data);
  }

  public function tambah_ujian()
  {
    $id = $this->uri->segment(3);
    $data['mengajar'] = $this->Guru_model->getById($id);
    $data['kelas'] = $this->Guru_model->getAll_kelas_dist($id);
    $data['mapel'] = $this->Guru_model->getAll_mapel_dist($id);
    $this->template->utama('Guru/v_tambah/v_tambah_data_ujian',$data);
  }

  //
  public function tambah_proses_ujian(){
      $tgl = $this->input->post('tgl');
      $mapel = $this->input->post('mapel');
      $kelas = $this->input->post('kelas');
      $ket = $this->input->post('ket');
      $count_data = $this->input->post('count_data');
      $id = $this->input->post('mengajar');
      //upload foto
    
            $data = array(
                'tgl_ujian'=>$tgl,
                'id_mapel'=>$mapel,
                'keterangan'=>$ket,
                'id_kelas' => $kelas,
                'id_mengajar' =>$id,
            );
    
            $this->Guru_model->save($data,"tb_ujian");
            
            redirect('Page_guru/tambah_soal/'.$count_data); // ini ngedirect ke function di bawahnya
        }
  
        public function tambah_soal()
        {
          // count data ini dilemapr ke v_tambah_soal , count_data itu digunakan untuk membuat jumlah banyak soal
          $this->template->utama('Guru/v_tambah/v_tambah_soal');
        }
        //

    public function proses_tambah_soal(){
      $pertanyaan = $this->input->post('pertanyaan[]');
      $plh1 = $this->input->post('plh1[]');
      $plh2 = $this->input->post('plh2[]');
      $plh3 = $this->input->post('plh3[]');
      $plh4 = $this->input->post('plh4[]');
      $jawaban = $this->input->post('jawaban');

      //get data dari v_tambah_soal
      $data = array(
        'soal'=>$pertanyaan,
        'a'=>$plh1,
        'b'=>$plh2,
        'c'=>$plh3,
        'd'=>$plh4,
        'jawaban'=>$jawaban
      );
      $this->Guru_model->save($data,"tb_pertanyaan");
    }
  
  // ================== berarti fungsi daata ujian sampe sini , kalo mau nambah function baru taruh didalam note ini ================================//

  // =========================================== proses Data nilai ========================= 
  public function data_nilai(){
    $data['nilai'] = $this->Guru_model->getNilai();
    $this->template->utama('Guru/v_data/v_nilai',$data);
  }



}
?>