<?php 
class Siswa_model extends CI_Model
{
	function LoginApi($username, $password)
    {
        $this->db->select("*");
        $this->db->where('username',$username AND 'password',$password);
        $check = $this->db->get('tb_login')->result_array();
        if ($check) {
            echo "Success";
        }else{
            echo "failure";
        }
    }

    function getMateri($username)
    {
    	$this->db->select('*');
    	$this->db->from('tb_login');
    	$this->db->where('username',$username);
    	$a = $this->db->get()->row('id');
    	$this->db->select('*');
    	$this->db->from('tb_siswa');
    	$this->db->where('id',$a);
    	$b = $this->db->get()->row('id_kelas');
    	$this->db->select('*');
    	$this->db->from('tb_materi');
    	$this->db->where('id_kelas',$b);
    	$query = $this->db->get();
    	return $query;
    }

    function getMateri2()
    {
    	$this->db->select('*');
    	$this->db->from('tb_materi');
    	$query = $this->db->get();
    	return $query;
    }

}