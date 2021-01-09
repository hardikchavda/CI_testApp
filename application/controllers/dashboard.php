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
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}

	public function index()
	{
		$this->load->view('dashboard');
	}
}
