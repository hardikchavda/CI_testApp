<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}


	public function login()
	{

		$name = $this->input->post('name');
		$pass = $this->input->post('pass');		

		$result = $this->users_model->login([
			'name' => $name,
			'password' => $pass,
			'status'=> 1
		]);
		print_r($result);
		$this->load->view('header');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/dashboard/login');
	}

	public function index()
	{
		$user_id = $this->session->userdata('user_id');
		if (!$user_id) {
			$this->logout();
		} else {
			$this->load->view('header');
			$this->load->view('dashboard');
			$this->load->view('footer');
		}
	}
}
