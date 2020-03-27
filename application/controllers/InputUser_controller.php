<?php 
defined('BASEPATH') OR exit('No direct access allowed');

class InputUser extends CI_Controller
{
	parent::__construct();
	{
	$this->load->model("InputUser_model");
	$this>load->library('form_validation');
	}

public function index()
	{
	$data['list'] = $this->InputUser_model->getAll();
	$this->load->view('Admin/v_data_siswa',$data);
	}

public function tambah()
	{
	$user = $this->InputUser_model;
	$validation = $this->form_validation;
	$validation->set_rules($user->rules());
	
	if ($validation->run())
	{
		$user->save();
		$this->session->set_flashdata('Succes','Berhasil Disimpan');
	}
	$this->load->view("Admin/User/tambah_user");
	}

public function edit($id = null)
	{
	if (!isset($id)) redirect('InputUser_controller');
	
	$user = $this->InputUser_model;
	$validation = $this->form_validation;
	$validation->set_rules($product->rules());
	
	if($validation->run())
	{
		$user->update();
		$this->session->set_flashdata('success', 'Berhasil Merubah Data');
	}
	
	$data["user"] =  $user->getById($id);
	if (!$data["user"]) show_404();
	
	$this->load->view("Admin/User/edit_form", $data);
	}

public function delete($id=null)
	{
	if (!isset($id)) show_404;
	
	if ($this->InputUser_model->delete($id)){
		redirect(site_url('InputUser_controller'))
	}
  }
}
?>