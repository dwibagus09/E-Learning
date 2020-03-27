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
	// Awal Model Tb_Login untuk Pengguna
	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}
	
	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id" => $id])->row();
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
        redirect('Page/edit/'.$id.'?update=1','refresh');
    }
    else
    {
        redirect('Page/edit/'.$id.'?update=2','refresh');
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
	
	// Akhir Model Untuk Tb_Login
	
//=========================================================================//

// Awal Model Untuk Tb_Guru
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
        redirect('Page/edit/'.$id.'?update=1','refresh');
    }
    else
    {
        redirect('Page/edit/'.$id.'?update=2','refresh');
    }
}
	
	function delete_data_guru($id)
	{
    $this->db->where('id', $id);
    $berhasil = $this->db->delete('tb_guru');
    if($berhasil)
       {
            redirect('Page/data_login/'.$id.'?delete=1','refresh');
       }
    else
       {
            redirect('Page/data_login/'.$id.'?delete=2','refresh');
       }
	}

// Akhir Tb_Guru	
	
}
?>