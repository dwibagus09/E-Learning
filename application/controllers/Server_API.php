<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Mahasiswa extends CI_Controller{
        function __construct(){
            parent::__construct();
            // $this->load->library('table');
            $this->load->model('Guru_model');
            
        }
		
		public function Api ()
		{
			$data = $this->Mahasiswa_model->getAll();
			echo json_encode($data->result_array());
		}
		
		public function ApiInsert()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama =  $this->input->post('nama');
			$grup = $this->input->post('grup');
			 $data = array(
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'id_grup' => $grup
            );
			 $this->Mahasiswa_model->input_data($data,'tm_user');
			echo json_encode($array);
		}

        public function ApiDelete()
        {
            if($this->input->post('username')){
                $where = array('username' => $this->input->post('username'));
                if ($this->Mahasiswa_model->delete_data($where,'tm_user')){
                    $array = array('success' => true);
                } else {
                    $array = array('error' => true);
                }
                echo json_encode($array);
            }
        }
		
		public function ApiUpdate()
	{
		if($this->input->post('username')){
			$where = array('username' => $this->input->post('username'));
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$nama =  $this->input->post('nama');
			$grup = $this->input->post('grup');
			$data = array(
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'id_grup' => $grup
            );
			if ($this->Mahasiswa_model->save_edit_data($where,$data, 'tm_user')){
				$array = array('success' => true);
			} else {
				$array = array('error' => false);
			}
			echo json_encode($array);
		}
	}
}

?>