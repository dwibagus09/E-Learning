<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Server_API extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Siswa_model');
    }
<<<<<<< HEAD
<<<<<<< HEAD
=======
    
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
>>>>>>> parent of eaeb904... updated

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
=======
    
    public function login_post() {
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
>>>>>>> f46b43a2f52bfa675f9a68b2b6c9291b16d3ecae
    }
}