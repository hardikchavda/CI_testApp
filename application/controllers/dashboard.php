<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	
	public function login()
	{
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
