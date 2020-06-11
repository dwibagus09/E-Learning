<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model {
<<<<<<< HEAD
    
    function getLogin($username,$password){
        $this->db->select('*');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->where('akses','3');
        $check = $this->db->get('tb_login')->result_array();
        if($check){
            echo '1';
        }
        else{
            echo 'false';
        }
    }

    function getAllMateri(){
        $this->db->select('*');
		$this->db->from('tb_materi');
		$query = $this->db->get();
		return $query;
    }
    function getAllTugas(){
        $this->db->select('*');
		$this->db->from('tb_tugas');
		$query = $this->db->get();
		return $query;
    }
    function getAllUjian(){
        $this->db->select('*');
        $this->db->from('tb_ujian');
        $this->db->join('tb_mapel','tb_ujian.id_mapel = tb_mapel.id_mapel');
        $this->db->join('tb_kelas','tb_ujian.id_kelas = tb_kelas.id_kelas');
		$query = $this->db->get();
		return $query;
=======
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
>>>>>>> f46b43a2f52bfa675f9a68b2b6c9291b16d3ecae
    }

    //=========================================================================================================//
    public function getById($id){
        $this->db->select('*');
        $this->db->from('tb_login');
        $this->db->where('username', $id);
        $a = $this->db->get()->row('id');
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->where('id', $a);
        $b = $this->db->get()->row('id_kelas');
        $this->db->select('*');
        $this->db->from('tb_kelas');
        $this->db->where('id_kelas', $b);
        $c = $this->db->get()->row('id_kelas');
        $this->db->select('*');
        $this->db->from('tb_mengajar');
        $this->db->where('id_kelas', $c);
        return $this->db->get()->row_array();
    }
    //=========================== End Of Awal Model Siswa =================//
    public function getMateri(){
        $query = "SELECT * from tb_materi Join tb_kelas on tb_materi.id_kelas = tb_kelas.id_kelas Join tb_siswa on tb_kelas.id_kelas = tb_siswa.id_kelas Join tb_login on tb_siswa.id = tb_login.id Where tb_login.id and tb_kelas.id_kelas";
        return $this->db->query($query)->result();
    }

    

    public function getTugas(){
        $query = "SELECT * from tb_tugas Join tb_mengajar on tb_tugas.id_mengajar = tb_mengajar.id_mengajar Join tb_kelas on tb_mengajar.id_kelas = tb_kelas.id_kelas join tb_siswa on tb_kelas.id_kelas = tb_siswa.id_kelas Join tb_login on tb_siswa.id = tb_login.id Where tb_login.id and tb_kelas.id_kelas";
        return $this->db->query($query)->result();
    }

    function Login($username,$password){
        $this->db->select('*');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->where('akses','3');
        $check = $this->db->get('tb_login')->result_array();
        if($check){
            echo '1';
        }
        else{
            echo 'false';
        }
    }
}
}