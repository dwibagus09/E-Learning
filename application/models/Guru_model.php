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

		//====================Coba=========================//
		function getAllMateri(){
			$this->db->select('*');
			$this->db->from('tb_materi');
			// $this->db->join('tb_kelas','tb_materi.id_kelas = tb_kelas.id_kelas');
			// $this->db->join('tb_mengajar','tb_materi.id_mengajar = tb_mengajar.id_mengajar');
			$query = $this->db->get();
			return $query;
		}


		//===================Akhir Coba====================//

		public function save($data,$table){
		
			$this->db->insert($table,$data);

		}

	function delete_materi($id){
            $_id = $this->db->get_where('tb_materi',['id_materi' => $id])->row();
            $query = $this->db->delete('tb_materi',['id_materi'=>$id]);
            if($query){
                unlink("upload/Materi/".$_id->file_materi);
            }
            redirect('Page_guru/data_materi/'.$this->session->userdata("ses_nama") );
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

	public function getKelas(){
		$this->db->select('*');
		$this->db->from('tb_kelas');
		return $this->db->get()->result();
	}
	public function getMapel(){
		$this->db->select('*');
		$this->db->from('tb_mapel');
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

	function getFile($id){
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
		$d = $this->db->get()->row('id_tugas');
		$this->db->select('*');
		$this->db->from('tb_filetugas');
		$this->db->where('id_tugas',$d);
		return $this->db->get()->result();
	}

	function edit_tugas($id)
	{
		$this->db->select('*');
		$this->db->from('tb_tugas');
		$this->db->where('id_tugas', $id);
		return $this->db->get()->row_array();
	}

	function save_edit_data_tugas($id, $data)
	{
		$this->db->where('id_tugas', $id);
		$berhasil = $this->db->update('tb_tugas', $data);
		if($berhasil)
		{
			redirect('Page_guru/data_tugas/'.$this->session->userdata("ses_nama").'/'.$id.'/?update=1','refresh');
		}
		else
		{
			redirect('Page_guru/data_tugas/'.$this->session->userdata("ses_nama").'/'.$id.'/?update=2','refresh');
		}
	}

	public function save_tugas($data,$table)
	{
		$this->db->insert($table,$data);
	}

	function delete_tugas($id){
		$this->db->where('id_tugas', $id);
		$berhasil = $this->db->delete('tb_tugas');
		if($berhasil)
		{
            redirect('Page_guru/data_tugas/'.$this->session->userdata("ses_nama").'/'.$id.'/?delete=1','refresh');
		}
		else
		{
            redirect('Page_guru/data_tugas/'.$this->session->userdata("ses_nama").'/'.$id.'/?delete=2','refresh');
		}
	}
// ================================ Akhir Tb_tugas ===============================




// ================================= Tb_Ujian ===================================
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

	function getId($id){
		$this->db->select('*');
		$this->db->from('tb_pertanyaan');
		$this->db->where('id_ujian',$id);
		return $this->db->get()->row_array();
	}

	function edit_ujian($id)
	{
		$this->db->select('*');
		$this->db->from('tb_pertanyaan');
		$this->db->join('tb_ujian','tb_ujian.id_ujian=tb_pertanyaan.id_ujian');
		$this->db->where('tb_ujian.id_ujian', $id);
		return $this->db->get()->row_array();
	}

	function save_edit_data_ujian($id, $data)
	{
		$this->db->where('id_ujian', $id);
		$berhasil = $this->db->update('tb_ujian', $data);
		if($berhasil)
		{
			redirect('Page_guru/data_ujian/'.$this->session->userdata("ses_nama").'/'.$id.'/?update=1','refresh');
		}
		else
		{
			redirect('Page_guru/data_ujian/'.$this->session->userdata("ses_nama").'/'.$id.'/?update=2','refresh');
		}
	}

	public function save_ujian($result)
	{
		$total_array = count($result);
 
		if($total_array != 0)
		{
			$this->db->insert_batch('tb_pertanyaan', $result);
		}
	}
	function delete_ujian($id){
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
// ================================ Akhir Ujian =================================

// ============================== Tb_Result ======================================	
	function getNilai(){
		$this->db->select('*');
		$this->db->from('tb_result');
		return $this->db->get()->result();
	}
// ================================================================================
}
?>