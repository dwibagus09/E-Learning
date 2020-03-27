<?php

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	
	public function index()
	{
		if($this->admin->logged_id())
		{
			$this->load->view("dashboard");
		}else{
			redirect("login");
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('view_login');
	}
}	
?>