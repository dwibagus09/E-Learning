<?php
class Page_siswa extends CI_Controller{
  function __construct(){
    parent::__construct();
    //validasi jika user belum login
    if($this->session->userdata('masuk') != TRUE){
            $url=base_url();
            redirect($url);
        }
  }
 
  function index(){
    $this->load->view('Siswa/dashboard_siswa');
  }
 
  function data_siswa(){
    // function ini hanya boleh diakses oleh admin dan dosen
    if($this->session->userdata('akses')=='3'){
      $this->load->view('Siswa/v_data_siswa');
    }else{
      echo '<script type="text/javascript">alert("Maaf Akses Tidak Boleh Akses Halaman Ini");
	  window.location="index";
	  </script>';
    }
 
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
}