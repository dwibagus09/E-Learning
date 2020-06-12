<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
 
    function index(){
        $this->load->view('view_login2');
    }
 
    function auth(){
        $username= $this->input->post('username',TRUE);
        $password= $this->input->post('password',TRUE);
 
        $cek_login=$this->login_model->auth_login($username,$password);
 
        if($cek_login->num_rows() > 0){ //jika login sebagai dosen
                $data=$cek_login->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['akses']=='1')
                 { //Akses admin
                    $this->session->set_userdata('akses','1');
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nama',$data['username']);
                    redirect('Page');
 
                 }
                 elseif($data['akses']=='2')
                 { //akses Guru
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_id',$data['id']);
                    $this->session->set_userdata('ses_nama',$data['username']);
                    redirect('Page_guru');
					
                 }
                 elseif($data['akses']=='3'){
                     $this->session->set_userdata('akses','3');
                     $this->session->set_userdata('ses_id',$data['id']);
                     $this->session->set_userdata('ses_nama',$data['username']);
                     redirect('Page_Siswa');
                 }
		}else{  // jika username dan password tidak ditemukan atau salah
                            $url=base_url();
                            echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                            redirect($url);
                    }
					
        }
 
    }
 
    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
 
