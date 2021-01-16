<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			$this->logout();
		} else {
			$this->load->model('users_model');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}

	public function index()
	{
		$result = $this->users_model->getAllUsers();
		$this->load->view('dashboard', ['result' => $result]);
	}

	public function edit_user($id)
	{
		$result = $this->users_model->dashEditFind($id);
		//print_r($result);
		$this->load->view('dashboardedit', ['data' => $result]);
	}
	public function update_user($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[4]|is_unique[users.name]');
		$this->form_validation->set_rules('pass', 'Password', 'required|min_length[4]|matches[confirmPass]');
		$this->form_validation->set_rules('confirmPass', 'Confirm Password', 'required|min_length[4]|matches[pass]');

		if ($this->form_validation->run() == false) {
			$this->edit_user($id);
		} else {
			$name = $this->input->post('name');
			$pass = $this->input->post('pass');
			$result = $this->users_model->update($id, $name, $pass);
			if ($result) {
				$this->session->set_flashdata('edit', 'Records Updated Successfully');
				$this->session->set_flashdata('feedback_class', 'alert-success');
			} else {
				$this->session->set_flashdata('edit', 'Something is wrong ');
				$this->session->set_flashdata('feedback_class', 'alert-danger');
			}
			return redirect('dashboardedit');
		}
	}
}
