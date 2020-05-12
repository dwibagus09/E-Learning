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
      $user = $this->input->post('username');
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
			$upload = $this-> _do_upload();
			$data['file_materi'] = $upload;
		}
            $this->Guru_model->save($data,"tb_materi");
            
            redirect('Page_guru/data_materi/',$data);
        }
		
			private function _do_upload()
	{
		$config['upload_path'] 		= 'upload/Materi/';
		$config['allowed_types'] 	= 'pdf|xls|doc|ppt';
		$config['max_size'] 			= 2048;
		$config['file_name'] 			= round(microtime(true)*1000);
 
		$this->load->library('upload', $config);
		if (!$this->upload-> do_upload('materi')) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('',''));
			redirect('Page_guru/data_materi/'.$this->session->userdata("ses_nama"));
		}
		return $this->upload->data('file_name');
	}
  

  public function download(){
  	$name = $this->uri->segment(3);
	  $data = file_get_contents(base_url().'upload/Materi/'.$name);
	  force_download($name, $data);
  }

  public function delete_materi(){
    $id = $this->uri->segment(3);
    $this->Guru_model->delete_materi($id);
    
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
  	$data['get_kelas'] = $this->Guru_model->getAll_kelas_dist($id);
	  $data['get_id'] = $this->Guru_model->getById($id);
  	$this->template->utama('Guru/v_tambah/v_tambah_tugas',$data);
  }

  public function proses_tambah_tugas(){
    $kd_tgs = $this->input->post('kode_tugas');
    $desc = $this->input->post('deskripsi');
    $start = $this->input->post('start');
    $end = $this->input->post('end');
    $id = $this->input->post('mengajar');
    //upload foto
  
          $data = array(
              'kd_tugas'=>$kd_tgs,
              'deskripsi'=>$desc,
              'waktu_mulai'=>$start,
              'waktu_selesai'=>$end,
              'id_mengajar'=>$id
          );
    // if (!empty($_FILES['materi']['name'])) {
    // $upload = $this-> do_upload();
    // $data['file_materi'] = $upload;
    $this->Guru_model->save_tugas($data,"tb_tugas");
    $this->session->set_flashdata('notif', '<p style="color:green;font-weight:bold;">'.$total_post.' data berhasil di simpan!</p>');
    redirect('Page_guru/data_tugas/'.$this->session->userdata("ses_nama"),$data);
  }
  function hapus_tugas(){
      $id = $this->uri->segment(3);
      $this->Guru_model->delete_tugas($id);
    }
// private function do_upload()
// {
//   $config['upload_path'] 		= 'upload/Materi/';
//   $config['allowed_types'] 	= 'pdf|xls|doc|ppt';
//   $config['max_size'] 			= 2048;
//   $config['file_name'] 			= round(microtime(true)*1000);

//   $this->load->library('upload', $config);
//   if (!$this->upload->do_upload('materi')) {
//     $this->session->set_flashdata('msg', $this->upload->display_errors('',''));
//     redirect('data_materi');
//   }
//   return $this->upload->data('file_name');
// }
  
  // =============================AKhir Proses Upload Tugas=====================//





  // ======================= Awal Proses Upload Ujian ===========================//
  public function data_ujian(){
    $id = $this->uri->segment(3);
    $data['ujian'] = $this->Guru_model->getUjian($id);
    $data['get_kelas'] = $this->Guru_model->getAll_kelas_dist($id);
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
                "tgl_ujian"=>$tgl,
                "id_mapel"=>$mapel,
                "keterangan"=>$ket,
                "id_kelas" => $kelas,
                "id_mengajar" =>$id,
            );
    
            $this->Guru_model->save($data,"tb_ujian");
            
            redirect('Page_guru/tambah_soal/'.$count_data.'/'.$ket); // ini ngedirect ke function di bawahnya
        }
  
  public function tambah_soal()
        {
          // count data ini dilemapr ke v_tambah_soal , count_data itu digunakan untuk membuat jumlah banyak soal
          $ket = $this->uri->segment('4');
          $data['id_ujian'] = $this->Guru_model->getIdUjian($ket);
          $this->template->utama('Guru/v_tambah/v_tambah_soal',$data);
        }
        //

  public function proses_tambah_soal() {
    $post = $this->input->post();
    $result = array();
    $total_post = count($post['id_ujian']);
    foreach($post['id_ujian'] AS $key => $val)
    {
      $result[] = array(
      "soal"=>$post['pertanyaan'][$key],
        "a"=>$post['pil1'][$key],
        "b"=>$post['pil2'][$key],
        "c"=>$post['pil3'][$key],
        "d"=>$post['pil4'][$key],
        "jawaban_benar"=>$post['jawaban'][$key],
        "id_ujian" =>$post['id_ujian'][$key]
      
      );
    }
      $this->Guru_model->save_ujian($result);
      redirect('Page_guru/data_ujian');
    }

    function hapus_ujian(){
      $id = $this->uri->segment(3);
      $this->Guru_model->delete_ujian($id);
    }
  // ================== berarti fungsi data ujian sampe sini , kalo mau nambah function baru taruh didalam note ini ================================//

  // =========================================== proses Data nilai ========================= 
  public function data_nilai(){
    $data['nilai'] = $this->Guru_model->getNilai();
    $this->template->utama('Guru/v_data/v_nilai',$data);
  }



}
?>