<?php 
class InputUser_model extends CI_Model
{
	
	private $_table = "tb_login";
	private $_guru ="tb_guru";
	public $id;
	public $username;
	public $password;
	public $akses;
	
	public function rules()
{
    return [
	
		
        ['field' => 'username',
        'label' => 'Username',
        'rules' => 'required'],

        ['field' => 'password',
        'label' => 'Password',
        'rules' => 'required'],
			
		['field' => 'akses',
        'label' => 'Akses',
        'rules' => 'required'] 
        
    ];
}
// =========================== Awal Model Tb_Login untuk Pengguna ===================================
	public function getAll()
	{
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('akses', 2);
		return $this->db->get()->result();
	}
	
	public function getById($id)
	{
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('username', $id);
		return $this->db->get()->row_array();
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
		
//================================  Akhir Model Untuk Tb_Login =========================================//

//================================= Awal Model Tb_Kelas ================================================

	public function getAll_kelas()
	{
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->join('tb_jurusan','tb_kelas.id_jurusan = tb_jurusan.id_jurusan');
		return $this->db->get()->result();
	}
	
	
	public function save_kelas($result)
	{
		$total_array = count($result);
 
		if($total_array != 0)
		{
			$this->db->insert_batch('tb_kelas', $result);
		}
	}
	
	
	function edit_kelas($id)
	{
		$this->db->select('*');
		$this->db->from('tb_kelas');
		$this->db->where('id_kelas', $id);
		return $this->db->get()->row_array();
	}

	function save_edit_data_kelas($id, $data)
	{
		$this->db->where('id_kelas', $id);
		$berhasil = $this->db->update('tb_kelas', $data);
		if($berhasil)
		{
			redirect('Page/edit_kelas/'.$id.'?update=1','refresh');
		}
		else
		{
			redirect('Page/edit_kelas/'.$id.'?update=2','refresh');
		}
	}
	
	function delete_data_kelas($id)
	{
		$this->db->where('id_kelas', $id);
		$berhasil = $this->db->delete('tb_kelas');
		if($berhasil)
       {
            redirect('Page/data_kelas/'.$id.'?delete=1','refresh');
       }
		else
       {
            redirect('Page/data_kelas/'.$id.'?delete=2','refresh');
       }
	}

//================================= Akhir Model Tb_Kelas ===============================================

// ============================= Awal Model Untuk Tb_Jurusan ===========================================
	public function getAll_jurusan()
	{
		$this->db->select('*');
		$this->db->from('tb_jurusan');
		return $this->db->get()->result();
	}
	
	
	public function save_jurusan($result)
	{
		$total_array = count($result);
 
		if($total_array != 0)
		{
			$this->db->insert_batch('tb_jurusan', $result);
		}
	}
	
	
	function edit_jurusan($id)
	{
		$this->db->select('*');
		$this->db->from('tb_jurusan');
		$this->db->where('id_jurusan', $id);
		return $this->db->get()->row_array();
	}

	function save_edit_data_jurusan($id, $data)
	{
		$this->db->where('id_jurusan', $id);
		$berhasil = $this->db->update('tb_jurusan', $data);
		if($berhasil)
		{
			redirect('Page/edit_jurusan/'.$id.'?update=1','refresh');
		}
		else
		{
			redirect('Page/edit_jurusan/'.$id.'?update=2','refresh');
		}
	}
	
	function delete_data_jurusan($id)
	{
		$this->db->where('id_jurusan', $id);
		$berhasil = $this->db->delete('tb_jurusan');
		if($berhasil)
       {
            redirect('Page/data_jurusan/'.$id.'?delete=1','refresh');
       }
		else
       {
            redirect('Page/data_jurusan/'.$id.'?delete=2','refresh');
       }
	}

//================================= Akhir Model Untuk Tb_Jurusan ==========================================//

// ================================ Awal Model Untuk Tb_Guru ===============================================
	public function getAll_guru()
	{
		return $this->db->get($this->_guru)->result();
	}
	
	
	public function save_guru($data,$table)
	{
		$this->db->insert($table,$data);
	}
	
	function edit_guru($id)
	{
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}

	function save_edit_data_guru($id, $data)
	{
		$this->db->where('id', $id);
		$berhasil = $this->db->update('tb_guru', $data);
		if($berhasil)
		{
			redirect('Page/edit_guru/'.$id.'?update=1','refresh');
		}
		else
		{
			redirect('Page/edit_guru/'.$id.'?update=2','refresh');
		}
	}
	
	function delete_data_guru($id)
	{
		$this->db->where('id', $id);
		$berhasil = $this->db->delete('tb_guru');
		if($berhasil)
		{
            redirect('Page/data_guru/'.$id.'?delete=1','refresh');
		}
		else
		{
            redirect('Page/data_guru/'.$id.'?delete=2','refresh');
		}
	}

// ======================= Akhir Tb_Guru ========================================	
	
}
?>