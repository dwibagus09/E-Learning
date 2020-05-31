<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Server_API extends CI_Controller{
        function __construct(){
            parent::__construct();
            // $this->load->library('table');
            $this->load->model('Siswa_model');
            
        }

        public function index()
        {
        	 $this->load->view('view_login2');
        }

        public function LoginApi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->Siswa_model->LoginApi($username, $password);
        echo json_encode($result);
    }
		
		public function ApiMateri()
	{
		if($this->input->post('username')){
			$username = array('username' => $this->input->post('username'));
			$array = $this->Siswa_model->getMateri($username);
			echo json_encode($array->result_array());
		}
	}
	public function ApiMateri2()
	{
		
			$username = $this->input->post('username');
			$array = $this->Siswa_model->getMateri2();
			echo json_encode($array->result_array());
		
	}
}

?>