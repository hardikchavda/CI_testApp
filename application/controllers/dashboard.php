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

	public function edit_user()
	{
	}
}
