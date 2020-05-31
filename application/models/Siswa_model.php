<?php 
class Siswa_model extends CI_Model
{
	function LoginApi($username, $password)
    {
        $result = $this->db->query("SELECT akses FROM tb_login WHERE username = '$username' AND password = '$password'");
        return $result->result();
    }

    function getMateri($username)
    {
    	$this->db->select('*');
    	$this->db->from('tb_login');
    	$this->db->where('username',$username);
    	$a = $this->db->get()->row('id');
    	// $this->db->select('*');
    	// $this->db->from('tb_siswa');
    	// $this->db->where('id',$a);
    	// $b = $this->db->get()->row('id_kelas');
    	// $this->db->select('*');
    	// $this->db->from('tb_materi');
    	// $this->db->where('id_kelas',$b);
    	// $query = $this->db->get();
    	return $a;
    }

    function getMateri2()
    {
    	$this->db->select('*');
    	$this->db->from('tb_materi');
    	$query = $this->db->get();
    	return $query;
    }

}