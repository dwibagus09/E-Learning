<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Server_API extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Siswa_model');
    }
    public function ApiMateri(){
        $username = $this->input->get('username');
        $data = $this->Siswa_model->getAllMateri($username);
        echo json_encode($data->result_array());
    }
    public function ApiTugas(){
        $username = $this->input->get('username');
        $data = $this->Siswa_model->getAllTugas($username);
        echo json_encode($data->result_array());
    }
}
