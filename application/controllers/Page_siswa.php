<?php
class Page_siswa extends CI_Controller{
  function __construct(){
    parent:: __construct();
    $this->load->model('Siswa_model');
    $this->load->library('template2');
    $this->load->library('form_validation');
    $this->load->helper('download');
    // validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
  }
 
  function index(){
    $this->template2->utama('Siswa/home_banner');
  }
 
  function Data_Materi(){
    // function ini hanya boleh diakses oleh siswa
      $id = $this->uri->segment(3);
      $data['materi'] = $this->Siswa_model->getMateriWeb($id);
      $this->template2->utama('Siswa/Data/v_data_materi',$data);
  }

  function Data_Tugas(){
    //Function data Tugas
      $id = $this->uri->segment(3);
      $data['tugas'] = $this->Siswa_model->getTugasWeb($id);
      $this->template2->utama('Siswa/Data/v_data_tugas',$data);
  }

  function input_nilai(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='3'){
      $this->load->view('Siswa/view_input_tugas');
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh Akses Halaman Ini");
	  window.location="index";
	  </script>';
    }
  }
 
  function krs(){
    // function ini hanya boleh diakses oleh admin dan mahasiswa
    if($this->session->userdata('akses')=='3' ){
      $this->load->view('Siswa/v_krs');
    }else{
       echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh Akses Halaman Ini");
	  window.location="index";
	  </script>';
    }
  }
  function lhs(){
    // function ini hanya boleh diakses oleh admin dan mahasiswa
    if( $this->session->userdata('akses')=='3'){
      $this->load->view('Siswa/v_lhs');
    }else{
       echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh Akses Halaman Ini");
	  window.location="index";
	  </script>';
    }
  }
  public function download(){
  	$name = $this->uri->segment(3);
	  $data = file_get_contents(base_url().'upload/Materi/'.$name);
	  force_download($name, $data);
  }
}