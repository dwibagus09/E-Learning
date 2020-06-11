<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

// Load the Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';

class Server_API extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Siswa_model');
    }

    public function LoginApi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->Siswa_model->getLogin($username,$password);
    }
    public function ApiMateri(){
            $data = $this->Siswa_model->getAllMateri();
            echo json_encode($data->result_array());
    }
    public function ApiTugas(){
        $data = $this->Siswa_model->getAllTugas();
        echo json_encode($data->result_array());
    }
    public function ApiUjian(){
        $data = $this->Siswa_model->getAllUjian();
        echo json_encode($data->result_array());
    }
}
    