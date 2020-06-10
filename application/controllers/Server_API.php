<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Server_API extends CI_Controller {

    public function __construct() { 
        parent::__construct();
        
        // Load the user model
        $this->load->model('Siswa_model');
    }
    
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
    }
}