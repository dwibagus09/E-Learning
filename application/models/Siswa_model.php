<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model {
    /*
     * Get rows from the users table
     */
    /**
     * 
     */
    function getRows($username,$password){
    $query = $this->db->query("SELECT * FROM tb_login WHERE username='$username' AND password='$password'");
    if($query->num_rows() > 0){ //jika login sebagai dosen
        $data=$query->row_array();
        $this->session->set_userdata('masuk',TRUE);
        if($data['akses']=='3')
          { //Akses admin
        $response = new Siswa_model();
        $response->message = "Selamat datang ".$data['username'];
        $response->id = $data['id'];
        $response->username = $data['username'];
        die(json_encode($response));
 
                 } else { 
        $response = new Siswa_model();
        $response->success = 0;
        $response->message = "Username atau password salah";
        die(json_encode($response));
    }
    
    mysqli_close();
    }
}
}