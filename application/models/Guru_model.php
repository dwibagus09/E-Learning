<?php 
class Guru_model extends CI_Model
{
	

// =========================== Awal Model untuk Guru ===================================
	public function getById($id){
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('username', $id);
		$a = $this->db->get()->row('id');
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id', $a);
		$b = $this->db->get()->row('nip');
		$this->db->select('*');
		$this->db->from('tb_mengajar');
		$this->db->where('nip', $b);
		return $this->db->get()->row_array();
	}



// ============================= Tb_Materi ===================================

	public function getMateri($id){
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('username', $id);
		$a = $this->db->get()->row('id');
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id', $a);
		$b = $this->db->get()->row('nip');
		$this->db->select('*');
		$this->db->from('tb_mengajar');
		$this->db->where('nip', $b);
		$c = $this->db->get()->row('id_mengajar');
        $this->db->select('*');
        $this->db->from('tb_materi');
        $this->db->where('id_mengajar',$c);
		return $this->db->get()->result();
		}
// ================================ Akhir Tb_materi ===============================




	public function getAll_kelas_dist($id)
	{
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('username', $id);
		$a = $this->db->get()->row('id');
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id', $a);
		$b = $this->db->get()->row('nip');
		$this->db->select('*');
		$this->db->from('tb_mengajar');
		$this->db->where('nip', $b);
		$this->db->join('tb_kelas','tb_kelas.id_kelas = tb_mengajar.id_kelas');
		return $this->db->get()->result();
	}

	public function getAll_mapel_dist($id)
	{
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('username', $id);
		$a = $this->db->get()->row('id');
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id', $a);
		$b = $this->db->get()->row('nip');
		$this->db->select('*');
		$this->db->from('tb_mengajar');
		$this->db->where('nip', $b);
		$this->db->join('tb_mapel','tb_mapel.id_mapel = tb_mengajar.id_mapel');
		return $this->db->get()->result();
	}
	
	public function save($data,$table)
	{
		$this->db->insert($table,$data);
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
// ============================= Tb_Tugas ===================================
	function getTugas($id){
		$this->db->select('*');
		$this->db->from('tb_login');
		$this->db->where('username', $id);
		$a = $this->db->get()->row('id');
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('id', $a);
		$b = $this->db->get()->row('nip');
		$this->db->select('*');
		$this->db->from('tb_mengajar');
		$this->db->where('nip', $b);
		$c = $this->db->get()->row('id_mengajar');
        $this->db->select('*');
        $this->db->from('tb_tugas');
        $this->db->where('id_mengajar',$c);
		return $this->db->get()->result();
	}

	function edit($id)
	{
		$this->db->select('*');
		$this->db->from('tb_tugas');
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

	public function save_tugas($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function delete_tugas($id){
		$this->db->where('id_ujian', $id);
		$berhasil = $this->db->delete('tb_ujian');
		if($berhasil)
		{
            redirect('Page_guru/data_ujian/'.$id.'/?delete=1','refresh');
		}
		else
		{
            redirect('Page_guru/data_ujian/'.$id.'/?delete=2','refresh');
		}
	}
// ================================ Akhir Tb_tugas ===============================




// ================================= Tb_Result ===================================
	function getUjian(){
		$this->db->select('*');
		$this->db->from('tb_ujian');
		$this->db->join('tb_kelas','tb_kelas.id_kelas=tb_ujian.id_kelas');
		$this->db->join('tb_mapel','tb_mapel.id_mapel=tb_ujian.id_mapel');
		return $this->db->get()->result();
	}

	function getIdUjian($ket){
		$this->db->select('*');
		$this->db->from('tb_ujian');
		$this->db->where('keterangan',$ket);
		return $this->db->get()->row_array();
	}

	public function save_ujian($result)
	{
		$total_array = count($result);
 
		if($total_array != 0)
		{
			$this->db->insert_batch('tb_pertanyaan', $result);
		}
	}
// ================================ Akhir Result =================================

// ============================== Tb_Ujian ======================================	
	function getNilai(){
		$this->db->select('*');
		$this->db->from('tb_result');
		return $this->db->get()->result();
	}
// ================================================================================
}
?>