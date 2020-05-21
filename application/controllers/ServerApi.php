<?php 
    class ServerApi extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('Guru_model');
        }
        public function index(){
            
        }
        public function Api(){
            $data = $this->Guru_model->getAllMateri();
            echo json_encode($data->result_array());
      }
    }


?>