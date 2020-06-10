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
    
    // public function login_post() {
    //     // Get the post data
    //     $username = $this->post('username');
    //     $password = $this->post('password');
        
    //     // Validate the post data
    //     if(!empty($email) && !empty($password)){
            
    //         // Check if any user exists with the given credentials
    //         $con['returnType'] = 'single';
    //         $con['conditions'] = array(
    //             'username' => $username,
    //             'password' => $password,
    //             'status' => 1
    //         );
    //         $user = $this->Siswa_model->getRows($con);
            
    //         if($user){
    //             // Set the response and exit
    //             $this->response([
    //                 'status' => TRUE,
    //                 'message' => 'User login successful.',
    //                 'data' => $user
    //             ], REST_Controller::HTTP_OK);
    //         }else{
    //             // Set the response and exit
    //             //BAD_REQUEST (400) being the HTTP response code
    //             $this->response("Wrong email or password.", REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }else{
    //         // Set the response and exit
    //         $this->response("Provide email and password.", REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

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
    