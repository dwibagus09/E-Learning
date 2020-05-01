<?php 
class Guru_model extends CI_Model
{
	

// =========================== Awal Model Tb_Login untuk Pengguna ===================================
	function getById($id){
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}	
function getMateri(){
            $this->db->select('*');
            $this->db->from('tb_materi');
			return $this->db->get()->result();
        }
	
	
	public function save($data,$table)
	{
		$this->db->insert($table,$data);
	}
	
	
	function edit($id)
	{
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}

	function save_edit_data($id, $data)
	{
		$this->db->where('id', $id);
		$berhasil = $this->db->update('tb_login', $data);
		if($berhasil)
		{
			redirect('edit'.$id.'?update=1','refresh');
		}
		else
		{
			redirect('edit'.$id.'?update=2','refresh');
		}
	}
	
	function delete_data($id)
	{
		$this->db->where('id', $id);
		$berhasil = $this->db->delete('tb_login');
		if($berhasil)
		{
            redirect('Page/data_login/'.$id.'?delete=1','refresh');
		}
		else
		{
            redirect('Page/data_login/'.$id.'?delete=2','refresh');
		}
	}
}
?>