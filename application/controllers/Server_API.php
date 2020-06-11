<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Server_API extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Siswa_model');
    }
    

    public function loginApi() {
        // Get the post data
        $username = $_POST["username"];
        $password = $_POST["password"];
    
        if ((empty($username)) || (empty($password))) { 
        $response = new Siswa_model();
        $response->success = 0;
        $response->message = "Kolom tidak boleh kosong"; 
        die(json_encode($response));
        }
        $this->Siswa_model->getRows($username,$password);
    }
    // public function LoginApi(){
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $this->Siswa_model->getLogin($username,$password);
    // }
    public function ApiMateri(){
            $username = $_GET["username"];
            $data = $this->Siswa_model->getAllMateri($username);
            echo json_encode($data->result_array());
    }
     function ApiTugas(){
        $data = $this->Siswa_model->getAllTugas();
        echo json_encode($data->result_array());
    }
     function ApiUjian(){
        $data = $this->Siswa_model->getAllUjian();
        echo json_encode($data->result_array());

    }
}
